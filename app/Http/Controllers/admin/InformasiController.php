<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::with('user')
            ->withCount('komentar')
            ->latest()
            ->paginate(10);
        return view('admin.informasi.index', compact('informasi'));
    }

    public function create()
    {
        return view('admin.informasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'status' => 'required|in:draft,published',
            'gambar_sampul' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Proses file gambar sampul jika ada
        if ($files = $request->file('gambar_sampul')) {
            $extension = $files->getClientOriginalExtension();
            $name = hash('sha256', time()) . '.' . $extension;
            $path = $files->storeAs('informasi/gambar_sampul', $name, 'public');
            $name = $path; // menyimpan path relatif ke storage
        } else {
            $name = null;
        }

        // Proses gambar dari konten editor jika ada
        $konten = $request->konten;
        if (preg_match_all('/<img[^>]+src="([^">]+)"/', $konten, $matches)) {
            foreach ($matches[1] as $src) {
                if (strpos($src, ';base64,') !== false) {
                    // Proses gambar base64 dari editor
                    $image_parts = explode(";", $src);
                    $image_type_aux = explode("image/", $image_parts[0]);
                    $image_type = $image_type_aux[1];
                    $image_base64 = base64_decode(explode(",", $image_parts[1])[1]);
                    $image_name = hash('sha256', time() . rand()) . '.' . $image_type;

                    // Simpan gambar di folder konten
                    file_put_contents(public_path('informasi/konten/' . $image_name), $image_base64);

                    // Ganti URL gambar di konten
                    $konten = str_replace($src, asset('informasi/konten/' . $image_name), $konten);
                }
            }
        }

        Informasi::create([
            'judul' => $request->judul,
            'gambar_sampul' => $name,
            'status' => $request->status,
            'konten' => $konten,
            'slug' => Str::slug($request->judul),
            'ringkasan' => Str::limit(strip_tags($konten), 200),
            'user_id' => auth()->id(),
            'created_at' => now(),
            'updated_at' => null
        ]);

        return redirect()->route('informasi.index')
            ->with('success', 'Informasi berhasil ditambahkan');
    }

    public function show(Informasi $informasi)
    {
        // Ambil komentar parent beserta replies
        $komentar = $informasi->komentar()
            ->parentComments()
            ->with(['user', 'replies.user']) // Pastikan relasi user dimuat
            ->latest()
            ->get();

        return view('admin.informasi.show', [
            'informasi' => $informasi,
            'komentar' => $komentar
        ]);
    }

    public function edit($id)
    {
        $informasi = Informasi::findOrFail($id);
        return view('admin.informasi.edit', compact('informasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'gambar_sampul.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'konten' => 'required',
        ]);

        $informasi = Informasi::findOrFail($id);
        $img = $informasi->gambar_sampul;
        $oldKonten = $informasi->konten;

        // Proses gambar sampul jika ada
        if ($files = $request->file('gambar_sampul')) {
            $extension = $files->getClientOriginalExtension();
            $name = hash('sha256', time()) . '.' . $extension;

            // Hapus file gambar sampul lama jika ada
            if ($img && Storage::disk('public')->exists($img)) {
                Storage::disk('public')->delete($img);
            }

            // Simpan file baru ke storage
            $path = $files->storeAs('informasi/gambar_sampul', $name, 'public');
            $name = $path;
        } else {
            $name = $img;
        }

        // Proses gambar dalam konten
        $konten = $request->konten;

        // Ambil semua URL gambar dari konten lama
        preg_match_all('/<img[^>]+src="([^">]+)"/', $oldKonten, $oldMatches);
        $oldImages = $oldMatches[1] ?? [];

        // Ambil semua URL gambar dari konten baru
        preg_match_all('/<img[^>]+src="([^">]+)"/', $konten, $newMatches);
        $newImages = $newMatches[1] ?? [];

        // Hapus gambar yang tidak digunakan lagi
        foreach ($oldImages as $oldImage) {
            if (!in_array($oldImage, $newImages)) {
                $path = str_replace(asset('storage/'), '', $oldImage);
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
            }
        }

        // Proses gambar baru dari konten editor jika ada
        if (preg_match_all('/<img[^>]+src="([^">]+)"/', $konten, $matches)) {
            foreach ($matches[1] as $src) {
                if (strpos($src, ';base64,') !== false) {
                    // Proses gambar base64 dari editor
                    $image_parts = explode(";", $src);
                    $image_type_aux = explode("image/", $image_parts[0]);
                    $image_type = $image_type_aux[1];
                    $image_base64 = base64_decode(explode(",", $image_parts[1])[1]);
                    $image_name = hash('sha256', time() . rand()) . '.' . $image_type;

                    // Simpan gambar di storage
                    Storage::disk('public')->put('informasi/konten/' . $image_name, $image_base64);

                    // Ganti URL gambar di konten
                    $konten = str_replace($src, Storage::url('informasi/konten/' . $image_name), $konten);
                }
            }
        }

        $informasi->update([
            'judul' => $request->judul,
            'gambar_sampul' => $name,
            'status' => $request->status,
            'konten' => $konten,
            'slug' => Str::slug($request->judul),
            'ringkasan' => Str::limit(strip_tags($konten), 200),
            'user_id' => auth()->id()
        ]);

        return redirect()->route('informasi.index')
            ->with('success', 'Informasi berhasil diperbarui');
    }


    public function destroy(Informasi $informasi, $id)
    {
        $informasi = Informasi::findOrFail($id);

        // Hapus gambar sampul jika ada
        if ($informasi->gambar_sampul) {
            if (Storage::disk('public')->exists($informasi->gambar_sampul)) {
                Storage::disk('public')->delete($informasi->gambar_sampul);
            }
        }

        // Hapus gambar dari konten
        $konten = $informasi->konten;
        if (preg_match_all('/<img[^>]+src="([^">]+)"/', $konten, $matches)) {
            foreach ($matches[1] as $src) {
                $path = str_replace(Storage::url(''), '', parse_url($src, PHP_URL_PATH));
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
            }
        }

        // Update data sebelum dihapus
        $informasi->update([
            'user_deleted' => auth()->id(),
            'deleted' => 1
        ]);

        // Soft delete data
        $informasi->delete();

        return redirect()->route('informasi.index')
            ->with('success', 'Informasi berhasil dihapus');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('informasi/konten', 'public');

            return response()->json([
                'link' => Storage::url($path)
            ]);
        }

        return response()->json([
            'error' => 'No file uploaded'
        ], 400);
    }

    // Metode untuk mengelola komentar
    public function storeKomentar(Request $request, $informasi_id)
    {
        $request->validate([
            'isi_komentar' => 'required|string|max:500',
            'parent_id' => 'nullable|exists:komentar,komentar_id'
        ]);

        // Pastikan informasi ada
        $informasi = Informasi::where('informasi_id', $informasi_id)
            ->firstOrFail();

        // Buat komentar baru
        $komentar = Komentar::create([
            'user_id' => Auth::id(),
            'informasi_id' => $informasi_id,
            'parent_id' => $request->parent_id,
            'isi_komentar' => $request->isi_komentar,
        ]);

        $message = $request->parent_id ? 'Balasan berhasil ditambahkan' : 'Komentar berhasil ditambahkan';
        return redirect()->back()->with('success', $message);
    }

    public function updateKomentar(Request $request, Komentar $komentar)
    {
        $validatedData = $request->validate([
            'isi_komentar' => 'required|string|max:500'
        ]);

        // Cek apakah user adalah pemilik komentar atau admin
        if (Auth::id() == $komentar->user_id || (Auth::check() && Auth::user()->role == 'admin')) {
            $komentar->update([
                'isi_komentar' => $validatedData['isi_komentar']
            ]);
            return back()->with('success', 'Komentar berhasil diperbarui');
        }

        return back()->with('error', 'Anda tidak memiliki izin untuk memperbarui komentar ini');
    }

    public function destroyKomentar($komentar_id)
    {
        $komentar = Komentar::findOrFail($komentar_id);

        // Cek apakah user adalah pemilik komentar atau admin
        if (Auth::id() == $komentar->user_id || (Auth::check() && Auth::user()->role == 'admin')) {
            $komentar->delete();
            return redirect()->back()->with('success', 'Komentar berhasil dihapus');
        }

        return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus komentar ini');
    }

    public function showArticle($slug)
    {
        $informasi = Informasi::where('slug', $slug)
            ->firstOrFail();

        // Ambil komentar parent beserta replies
        $komentar = $informasi->komentar()
            ->parentComments()
            ->with(['user', 'replies.user']) // Pastikan relasi user dimuat
            ->latest()
            ->get();

        return view('frontend.pengumuman.artikel', [
            'title' => $informasi->judul,
            'informasi' => $informasi,
            'komentar' => $komentar
        ]);
    }
}

