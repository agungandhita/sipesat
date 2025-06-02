<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformasiController extends Controller
{
    /**
     * Menampilkan daftar berita/informasi
     */
    public function index()
    {
        $informasi = Informasi::where('status', 'published')
            ->latest()
            ->paginate(6);

        return view('frontend.pengumuman.index', [
            'title' => 'Berita dan Informasi',
            'informasi' => $informasi
        ]);
    }

    /**
     * Menampilkan detail berita/informasi beserta komentarnya
     */
    public function show($slug)
    {
        $informasi = Informasi::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Ambil komentar parent beserta replies
        // Ambil komentar yang terkait dengan informasi ini
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

    /**
     * Menyimpan komentar baru atau reply
     */
    public function storeKomentar(Request $request, $informasi_id)
    {
        $request->validate([
            'isi_komentar' => 'required|string|max:500',
            'parent_id' => 'nullable|exists:komentar,komentar_id'
        ]);

        // Pastikan informasi ada dan dipublikasikan
        $informasi = Informasi::where('informasi_id', $informasi_id)
            ->where('status', 'published')
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

    /**
     * Menghapus komentar (hanya pemilik komentar atau admin)
     */
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

    /**
     * Mencari berita berdasarkan kata kunci
     */
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $informasi = Informasi::where('status', 'published')
            ->where(function ($query) use ($keyword) {
                $query->where('judul', 'like', "%{$keyword}%")
                    ->orWhere('ringkasan', 'like', "%{$keyword}%")
                    ->orWhere('konten', 'like', "%{$keyword}%");
            })
            ->latest()
            ->paginate(6);

        return view('frontend.informasi.search', [
            'title' => 'Hasil Pencarian: ' . $keyword,
            'informasi' => $informasi,
            'keyword' => $keyword
        ]);
    }
}
