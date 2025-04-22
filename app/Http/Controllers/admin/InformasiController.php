<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'kategori' => 'required|in:pengumuman,berita,agenda',
            'status' => 'required|in:draft,published',
            'gambar_sampul' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'excerpt' => 'nullable|string|max:500'  // Tambahkan validasi excerpt
        ]);

        if ($request->hasFile('gambar_sampul')) {
            $gambar = $request->file('gambar_sampul');
            $path = $gambar->store('informasi', 'public');
            $validatedData['gambar_sampul'] = $path;
        }

        $validatedData['slug'] = Str::slug($request->judul);
        $validatedData['excerpt'] = Str::limit(strip_tags($request->konten), 200);
        $validatedData['user_id'] = auth()->id();

        Informasi::create($validatedData);

        return redirect()->route('informasi.index')
            ->with('success', 'Informasi berhasil ditambahkan');
    }

    public function show(Informasi $informasi)
    {
        return view('admin.informasi.show', compact('informasi'));
    }

    public function edit(Informasi $informasi)
    {
        return view('admin.informasi.edit', compact('informasi'));
    }

    public function update(Request $request, Informasi $informasi)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'kategori' => 'required|in:pengumuman,berita,agenda',
            'status' => 'required|in:draft,published',
            'gambar_sampul' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('gambar_sampul')) {
            if ($informasi->gambar_sampul) {
                Storage::disk('public')->delete($informasi->gambar_sampul);
            }
            $gambar = $request->file('gambar_sampul');
            $path = $gambar->store('informasi', 'public');
            $validatedData['gambar_sampul'] = $path;
        }

        $validatedData['slug'] = Str::slug($request->judul);
        $validatedData['excerpt'] = Str::limit(strip_tags($request->konten), 200);

        $informasi->update($validatedData);

        return redirect()->route('informasi.index')
            ->with('success', 'Informasi berhasil diperbarui');
    }

    public function destroy(Informasi $informasi)
    {
        if ($informasi->gambar_sampul) {
            Storage::disk('public')->delete($informasi->gambar_sampul);
        }
        
        $informasi->delete();

        return redirect()->route('informasi.index')
            ->with('success', 'Informasi berhasil dihapus');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $path = $file->store('informasi/konten', 'public');
            
            return response()->json([
                'url' => Storage::url($path)
            ]);
        }
    }

    // Metode untuk mengelola komentar
    public function storeKomentar(Request $request, Informasi $informasi)
    {
        $validatedData = $request->validate([
            'konten' => 'required'
        ]);

        $komentar = $informasi->komentar()->create([
            'user_id' => auth()->id(),
            'konten' => $validatedData['konten']
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan');
    }

    public function updateKomentar(Request $request, Komentar $komentar)
    {
        $this->authorize('update', $komentar);

        $validatedData = $request->validate([
            'konten' => 'required'
        ]);

        $komentar->update($validatedData);

        return back()->with('success', 'Komentar berhasil diperbarui');
    }

    public function destroyKomentar(Komentar $komentar)
    {
        $this->authorize('delete', $komentar);
        
        $komentar->delete();

        return back()->with('success', 'Komentar berhasil dihapus');
    }
}
