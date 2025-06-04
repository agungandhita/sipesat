<?php

namespace App\Http\Controllers\admin;

use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreArsipRequest;
use Illuminate\Support\Facades\Validator;

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

        // Ambil data dengan kolom file_surat
        $surats = $query->get();

        // Calculate counts
        $totalSuratMasuk = Arsip::where('jenis_surat', 'masuk')->count();
        $totalSuratKeluar = Arsip::where('jenis_surat', 'keluar')->count();
        $totalArsip = $surats->count();

        return view('admin.arsip.index', [
            'title' => 'Arsip Surat',
            'surat' => $surats,
            'totalSuratMasuk' => $totalSuratMasuk,
            'totalSuratKeluar' => $totalSuratKeluar,
            'totalArsip' => $totalArsip
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
     */ public function store(StoreArsipRequest $request)
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
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nomor_surat' => 'nullable|string|max:255',
            'perihal' => 'required|string|max:255',
            'asal_surat' => 'required|string|max:255',
            'jenis_surat' => 'required|in:masuk,keluar',
            'tanggal_surat' => 'required|date',
            'keterangan' => 'nullable|string',
            'file_surat' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $arsip = Arsip::where('arsip_id', $id)->first();
            
            if (!$arsip) {
                return redirect()->route('arsip')->with('error', 'Data tidak ditemukan');
            }

            $updateData = [
                'nomor_surat' => $request->nomor_surat,
                'perihal' => $request->perihal,
                'asal_surat' => $request->asal_surat,
                'jenis_surat' => $request->jenis_surat,
                'tanggal_surat' => $request->tanggal_surat,
                'keterangan' => $request->keterangan,
                'user_updated' => auth()->user()->user_id ?? null
            ];

            // Handle file upload if new file is provided
            if ($request->hasFile('file_surat')) {
                // Delete old file
                if ($arsip->file_surat) {
                    $oldFilePath = public_path('storage/' . $arsip->file_surat);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                // Upload new file
                $file = $request->file('file_surat');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('surat', $filename, 'public');
                $updateData['file_surat'] = $path;
            }

            $arsip->update($updateData);

            return redirect()->route('arsip')->with('success', 'Data arsip berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */ public function destroy($id)
    {
        try {
            // Cari arsip berdasarkan ID
            $arsip = Arsip::where('arsip_id', $id)->first();

            if (!$arsip) {
                return redirect('/arsip')->with('error', 'Data tidak ditemukan');
            }

            $file_path = public_path('surat/' . $arsip->file_surat);

            $arsip->update([
                'user_deleted' => auth()->user()->user_id,
                'deleted' => true
            ]);

            // Hapus file fisik jika ada
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            // Hapus record dari database
            $arsip->delete();

            return redirect('/arsip')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/arsip')->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
