<?php

namespace App\Http\Controllers\Page;

use App\Models\Domisili;
use App\Models\Arsip;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class DomisiliController extends Controller
{
    public function index()
    {
        return view('frontend.pengajuan.domisili', [
            'title' => 'Domisili'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:16',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'keterangan' => 'required|string',
            'keperluan' => 'required|string',
        ]);

        // Buat pengajuan terlebih dahulu dengan status pending
        $pengajuan = Pengajuan::create([
            'user_id' => Auth::id(),
            'jenis_surat' => 'domisili',
            'status' => 'pending',  // Status otomatis pending saat dibuat
        ]);

        // Buat record Domisili
        $domisili = Domisili::create([
            'pengajuan_id' => $pengajuan->pengajuan_id,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
            'keperluan' => $request->keperluan,
        ]);

        return redirect()->route('riwayat.pengajuan')
            ->with('success', 'Pengajuan Domisili berhasil dikirim dan sedang menunggu persetujuan.');
    }

    public function download($id)
    {
        $pengajuan = Pengajuan::with('domisili')->findOrFail($id);

        // Cek apakah pengajuan sudah disetujui
        if ($pengajuan->status !== 'approved') {
            return redirect()->back()
                ->with('error', 'Surat belum dapat diunduh karena belum disetujui.');
        }

        $arsip = Arsip::where('pengajuan_id', $pengajuan->pengajuan_id)->first();

        if (!$arsip) {
            return redirect()->back()
                ->with('error', 'File surat tidak ditemukan.');
        }

        $filePath = storage_path('app/public/surat_keluar/' . $arsip->file_surat);

        if (!file_exists($filePath)) {
            return redirect()->back()
                ->with('error', 'File surat tidak ditemukan di sistem.');
        }

        return response()->download($filePath);
    }

    public function generatePDF($id)
    {
        $pengajuan = Pengajuan::with('domisili')->findOrFail($id);

        // Cek apakah pengajuan sudah disetujui
        if ($pengajuan->status !== 'approved') {
            return redirect()->back()
                ->with('error', 'Surat belum dapat diunduh karena belum disetujui.');
        }

        $arsip = Arsip::where('pengajuan_id', $pengajuan->pengajuan_id)->first();

        if (!$arsip) {
            return redirect()->back()
                ->with('error', 'Data arsip tidak ditemukan.');
        }

        $data = [
            'domisili' => $pengajuan->domisili,
            'nomor_surat' => $arsip->nomor_surat,
            'tanggal_surat' => $arsip->tanggal_surat
        ];

        $pdf = PDF::loadView('frontend.pdf.domisili', $data);

        return $pdf->download('domisili_' . $pengajuan->pengajuan_id . '.pdf');
    }

    public function preview($id)
    {
        $pengajuan = Pengajuan::with('domisili')->findOrFail($id);

        // Cek apakah pengajuan sudah disetujui
        if ($pengajuan->status !== 'approved') {
            return redirect()->back()
                ->with('error', 'Surat belum dapat dipreview karena belum disetujui.');
        }

        $arsip = Arsip::where('pengajuan_id', $pengajuan->pengajuan_id)->first();

        if (!$arsip) {
            return redirect()->back()
                ->with('error', 'Data arsip tidak ditemukan.');
        }

        $data = [
            'domisili' => $pengajuan->domisili,
            'nomor_surat' => $arsip->nomor_surat,
            'tanggal_surat' => $arsip->tanggal_surat
        ];

        $pdf = PDF::loadView('frontend.pdf.domisili', $data);

        return $pdf->stream('domisili_' . $pengajuan->pengajuan_id . '.pdf');
    }
}
