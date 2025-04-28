<?php

namespace App\Http\Controllers\Page;

use App\Models\Meninggal;
use App\Models\Arsip;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class MeninggalController extends Controller
{
    public function index()
    {
        return view('frontend.pengajuan.meninggal', [
            'title' => 'Surat Keterangan Meninggal'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pejabat' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nik_almarhum' => 'required|string|max:16',
            'nama_almarhum' => 'required|string|max:255',
            'tempat_lahir_almarhum' => 'required|string|max:255',
            'tanggal_lahir_almarhum' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'agama' => 'required|string',
            'pekerjaan_almarhum' => 'required|string|max:255',
            'alamat_almarhum' => 'required|string',
            'tanggal_meninggal' => 'required|date',
            'tempat_meninggal' => 'required|string|max:255',
            'sebab_meninggal' => 'required|string',
            'nik_pelapor' => 'required|string|max:16',
            'nama_pelapor' => 'required|string|max:255',
            'tempat_lahir_pelapor' => 'required|string|max:255',
            'tanggal_lahir_pelapor' => 'required|date',
            'jenis_kelamin_pelapor' => 'required|string',
            'alamat_pelapor' => 'required|string',
        ]);

        // Buat pengajuan terlebih dahulu dengan status pending
        $pengajuan = Pengajuan::create([
            'user_id' => Auth::id(),
            'jenis_surat' => 'meninggal',
            'status' => 'pending',  // Status otomatis pending saat dibuat
        ]);

        // Buat record Meninggal
        $meninggal = Meninggal::create([
            'pengajuan_id' => $pengajuan->pengajuan_id,
            'nama_pejabat' => $request->nama_pejabat,
            'jabatan' => $request->jabatan,
            'nik_almarhum' => $request->nik_almarhum,
            'nama_almarhum' => $request->nama_almarhum,
            'tempat_lahir_almarhum' => $request->tempat_lahir_almarhum,
            'tanggal_lahir_almarhum' => $request->tanggal_lahir_almarhum,
            'jenis_kelamin' => $request->jenis_kelamin,
            "warga_negara" => $request->warga_negara,
            'agama' => $request->agama,
            'pekerjaan_almarhum' => $request->pekerjaan_almarhum,
            'alamat_almarhum' => $request->alamat_almarhum,
            'tanggal_meninggal' => $request->tanggal_meninggal,
            'tempat_meninggal' => $request->tempat_meninggal,
            'sebab_meninggal' => $request->sebab_meninggal,
            'nik_pelapor' => $request->nik_pelapor,
            'nama_pelapor' => $request->nama_pelapor,
            'tempat_lahir_pelapor' => $request->tempat_lahir_pelapor,
            'tanggal_lahir_pelapor' => $request->tanggal_lahir_pelapor,
            'jenis_kelamin_pelapor' => $request->jenis_kelamin_pelapor,
            'alamat_pelapor' => $request->alamat_pelapor,
        ]);

        return redirect()->route('riwayat.pengajuan')
            ->with('success', 'Pengajuan Surat Keterangan Meninggal berhasil dikirim dan sedang menunggu persetujuan.');
    }

    public function download($id)
    {
        $pengajuan = Pengajuan::with('meninggal')->findOrFail($id);

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
        $pengajuan = Pengajuan::with('meninggal')->findOrFail($id);

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
            'meninggal' => $pengajuan->meninggal,
            'nomor_surat' => $arsip->nomor_surat,
            'tanggal_surat' => $arsip->tanggal_surat
        ];

        $pdf = PDF::loadView('frontend.pdf.meninggal', $data);

        return $pdf->download('meninggal_' . $pengajuan->pengajuan_id . '.pdf');
    }

    public function preview($id)
    {
        $pengajuan = Pengajuan::with('meninggal')->findOrFail($id);

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
            'meninggal' => $pengajuan->meninggal,
            'nomor_surat' => $arsip->nomor_surat,
            'tanggal_surat' => $arsip->tanggal_surat
        ];

        $pdf = PDF::loadView('frontend.pdf.meninggal', $data);

        return $pdf->stream('meninggal_' . $pengajuan->pengajuan_id . '.pdf');
    }
}
