<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArsipRequest;
use App\Models\Arsip;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Arsip::query();

        // Filter berdasarkan jenis surat
        if ($request->jenis_surat && $request->jenis_surat !== 'Semua') {
            $query->where('jenis_surat', $request->jenis_surat);
        }

        // Filter berdasarkan perihal
        if ($request->perihal) {
            $query->where('perihal', 'like', '%' . $request->perihal . '%');
        }

        // Ambil data dan urutkan berdasarkan tanggal terbaru
        $surats = $query->orderBy('created_at', 'desc')->get();

        return view('admin.arsip.index', [
            'title' => 'Arsip Surat',
            'surat' => $surats
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */public function store(StoreArsipRequest $request)
{
    $request->validated();

    // Handle file upload
    if ($request->hasFile('file_surat')) {
        $file = $request->file('file_surat');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('surat', $filename, 'public');

        // Create new record
        Arsip::create([
            'perihal' => $request->perihal,
            'asal_surat' => $request->asal_surat,
            'jenis_surat' => $request->jenis_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'keterangan' => $request->keterangan,
            'file_surat' => $path
        ]);

        return redirect()->route('arsip')->with('success', 'Surat berhasil ditambahkan');
    }

    return back()->with('error', 'Terjadi kesalahan saat mengunggah file');
}

    /**
     * Display the specified resource.
     */
    public function show(Arsip $arsip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Arsip $arsip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Arsip $arsip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Arsip $arsip)
    {
        //
    }
}
