<?php

namespace App\Http\Controllers\Page;

use App\Models\Sktm;
use App\Models\Arsip;
use App\Models\Penduduk;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class SktmController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $penduduk = null;
        
        if ($user && $user->nik) {
            $penduduk = Penduduk::where('nik', $user->nik)->first();
        }

        return view('frontend.pengajuan.sktm', [
            'title' => 'Surat Keterangan Tidak Mampu',
            'penduduk' => $penduduk
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
            'file_ktp' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'file_kk' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $fileKtpPath = null;
        if ($request->hasFile('file_ktp')) {
            $fileKtpPath = $request->file('file_ktp')->store('dokumen_pendukung', 'public');
        }

        $fileKkPath = null;
        if ($request->hasFile('file_kk')) {
            $fileKkPath = $request->file('file_kk')->store('dokumen_pendukung', 'public');
        }

        // Buat pengajuan terlebih dahulu dengan status pending
        $pengajuan = Pengajuan::create([
            'user_id' => Auth::id(),
            'jenis_surat' => 'sktm',
            'status' => 'pending',
            'file_ktp' => $fileKtpPath,
            'file_kk' => $fileKkPath,
        ]);

        // Buat record SKTM
        $sktm = Sktm::create([
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
            ->with('success', 'Pengajuan SKTM berhasil dikirim dan sedang menunggu persetujuan.');
    }

    public function download($id)
    {
        $pengajuan = Pengajuan::with('sktm')->findOrFail($id);

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
        $pengajuan = Pengajuan::with('sktm')->findOrFail($id);

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
            'sktm' => $pengajuan->sktm,
            'nomor_surat' => $arsip->nomor_surat,
            'tanggal_surat' => $arsip->tanggal_surat
        ];

        $pdf = PDF::loadView('frontend.pdf.sktm', $data);

        return $pdf->download('sktm_' . $pengajuan->pengajuan_id . '.pdf');
    }

    public function preview($id)
    {
        $pengajuan = Pengajuan::with('sktm')->findOrFail($id);

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
            'sktm' => $pengajuan->sktm,
            'nomor_surat' => $arsip->nomor_surat,
            'tanggal_surat' => $arsip->tanggal_surat
        ];

        $pdf = PDF::loadView('frontend.pdf.sktm', $data);

        return $pdf->stream('sktm_' . $pengajuan->pengajuan_id . '.pdf');
    }
}
