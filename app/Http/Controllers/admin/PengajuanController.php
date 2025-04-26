<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Arsip;
use App\Models\Domisili;
use App\Models\Pengajuan;
use App\Models\Sktm;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    public function index()
    {
        // Get all pengajuan data
        $pengajuans = Pengajuan::with('user')
            ->latest()
            ->get();

        return view('admin.approve.index', compact('pengajuans'));
    }

    public function create($jenis)
    {
        // Validate jenis surat
        if (!in_array($jenis, ['domisili', 'tidak_mampu'])) {
            return redirect()->back()->with('error', 'Jenis surat tidak valid.');
        }

        return view('user.pengajuan.form', compact('jenis'));
    }



    public function show($id)
    {
        $pengajuan = Pengajuan::with(['user', 'domisili', 'sktm'])
            ->findOrFail($id);

        // Load data berdasarkan jenis surat
        if ($pengajuan->jenis_surat == 'domisili') {
            $data = $pengajuan->domisili;
            $view = 'admin.approve.show.domisili';
        } else if ($pengajuan->jenis_surat == 'tidak_mampu') {
            $data = $pengajuan->sktm;
            $view = 'admin.approve.show.sktm';
        } else {
            return redirect()->back()->with('error', 'Jenis surat tidak valid');
        }

        return view($view, [
            'title' => 'Detail Pengajuan',
            'pengajuan' => $pengajuan,
            'data' => $data
        ]);
    }



    // Admin methods for approval
    public function listPending()
    {
        // Get all pending pengajuan
        $pengajuans = Pengajuan::where('status', 'pending')
            ->latest()
            ->paginate(10);

        return view('admin.pengajuan.pending', compact('pengajuans'));
    }

    public function approve($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        // Only approve pending pengajuan
        if ($pengajuan->status != 'pending') {
            return redirect()->back()->with('error', 'Pengajuan sudah diproses sebelumnya.');
        }

        // Update pengajuan status
        $pengajuan->update([
            'status' => 'approved',
            'approved_at' => now(),
            'approved_by' => Auth::id(),
        ]);

        // Generate nomor surat based on jenis_surat
        $prefix = ($pengajuan->jenis_surat == 'domisili') ? 'SKD' : 'SKTM';
        $nomorSurat = $this->generateNomorSurat($prefix);

        // Create arsip entry
        if ($pengajuan->jenis_surat == 'domisili') {
            $pengajuan->load('domisili');
            $data = $pengajuan->domisili;
            $perihal = 'Surat Keterangan Domisili - ' . $data->nama;
            $filename = 'domisili_' . $pengajuan->pengajuan_id . '.pdf';
        } else { // tidak_mampu
            $pengajuan->load('tidakMampu');
            $data = $pengajuan->tidakMampu;
            $perihal = 'Surat Keterangan Tidak Mampu - ' . $data->nama;
            $filename = 'tidak_mampu_' . $pengajuan->pengajuan_id . '.pdf';
        }

        $arsip = Arsip::create([
            'pengajuan_id' => $pengajuan->pengajuan_id,
            'nomor_surat' => $nomorSurat,
            'jenis_surat' => 'keluar',
            'perihal' => $perihal,
            'tanggal_surat' => now(),
            'asal_surat' => 'Desa Gedungboyountung',
            'keterangan' => $data->keterangan,
            'file_surat' => $filename,
            'user_created' => Auth::id(),
        ]);

        // Generate PDF
        $this->generatePDF($pengajuan, $nomorSurat);

        return redirect()->route('admin.pengajuan.pending')
            ->with('success', 'Pengajuan berhasil disetujui dan surat telah dibuat.');
    }

    public function reject($id, Request $request)
    {
        $request->validate([
            'alasan_penolakan' => 'required|string',
        ]);

        $pengajuan = Pengajuan::findOrFail($id);

        // Only reject pending pengajuan
        if ($pengajuan->status != 'pending') {
            return redirect()->back()->with('error', 'Pengajuan sudah diproses sebelumnya.');
        }

        // Update pengajuan status
        $pengajuan->update([
            'status' => 'rejected',
            'rejected_at' => now(),
            'rejected_by' => Auth::id(),
            'alasan_penolakan' => $request->alasan_penolakan,
        ]);

        return redirect()->route('admin.pengajuan.pending')
            ->with('success', 'Pengajuan berhasil ditolak.');
    }

    private function generateNomorSurat($prefix)
    {
        // Get the highest number used this year for this type of letter
        $latestArsip = Arsip::whereYear('created_at', date('Y'))
            ->where('nomor_surat', 'like', $prefix . '/%/' . date('m') . '/' . date('Y'))
            ->orderBy('created_at', 'desc')
            ->first();

        if ($latestArsip && $latestArsip->nomor_surat) {
            // Extract the number part from the latest nomor_surat
            $parts = explode('/', $latestArsip->nomor_surat);
            if (count($parts) >= 2 && is_numeric($parts[1])) {
                $count = (int)$parts[1] + 1;
            } else {
                $count = 1;
            }
        } else {
            $count = 1;
        }

        return $prefix . '/' . str_pad($count, 3, '0', STR_PAD_LEFT) . '/' . date('m') . '/' . date('Y');
    }

    private function generatePDF($pengajuan, $nomorSurat)
    {
        if ($pengajuan->jenis_surat == 'domisili') {
            $pengajuan->load('domisili');
            $data = [
                'pengajuan' => $pengajuan,
                'domisili' => $pengajuan->domisili,
                'nomor_surat' => $nomorSurat,
                'tanggal' => now()->format('d F Y')
            ];
            $view = 'admin.surat.pdf.domisili';
            $filename = 'domisili_' . $pengajuan->pengajuan_id . '.pdf';
        } else { // tidak_mampu
            $pengajuan->load('tidakMampu');
            $data = [
                'pengajuan' => $pengajuan,
                'tidakMampu' => $pengajuan->tidakMampu,
                'nomor_surat' => $nomorSurat,
                'tanggal' => now()->format('d F Y')
            ];
            $view = 'admin.surat.pdf.tidak_mampu';
            $filename = 'tidak_mampu_' . $pengajuan->pengajuan_id . '.pdf';
        }

        $pdf = app('dompdf.wrapper')->loadView($view, $data);

        // Make sure directory exists
        $storagePath = storage_path('app/public/surat_keluar');
        if (!file_exists($storagePath)) {
            mkdir($storagePath, 0755, true);
        }

        $pdf->save($storagePath . '/' . $filename);

        return $filename;
    }
}
