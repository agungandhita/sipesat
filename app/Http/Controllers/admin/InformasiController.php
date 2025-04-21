<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::withCount('komentar')
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
            'status' => 'required|in:draft,published'
        ]);

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
            'status' => 'required|in:draft,published'
        ]);

        $informasi->update($validatedData);

        return redirect()->route('informasi.index')
            ->with('success', 'Informasi berhasil diperbarui');
    }

    public function destroy(Informasi $informasi)
    {
        $informasi->delete();

        return redirect()->route('informasi.index')
            ->with('success', 'Informasi berhasil dihapus');
    }
}