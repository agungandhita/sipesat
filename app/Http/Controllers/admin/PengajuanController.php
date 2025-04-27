<?php

namespace App\Http\Controllers\admin;

use App\Models\Sktm;
use App\Models\Arsip;
use App\Models\Domisili;
use Barryvdh\DomPDF\PDF;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
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
        if (!in_array($jenis, ['domisili', 'sktm'])) { // Ubah 'tidak_mampu' menjadi 'sktm'
            return redirect()->back()->with('error', 'Jenis surat tidak valid.');
        }

        return view('user.pengajuan.form', compact('jenis'));
    }

    public function approve($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        // Only approve pending pengajuan
        if ($pengajuan->status != 'pending') {
            return redirect()->back()->with('error', 'Pengajuan sudah diproses sebelumnya.');
        }

        try {
            // Generate nomor surat
            $nomorSurat = $this->generateNomorSurat($pengajuan);

            // Create arsip entry
            if ($pengajuan->jenis_surat == 'domisili') {
                $pengajuan->load('domisili');
                $data = $pengajuan->domisili;
                $perihal = 'Surat Keterangan Domisili - ' . $data->nama;
                $filename = 'domisili_' . $pengajuan->pengajuan_id . '.pdf';
            } else if ($pengajuan->jenis_surat == 'sktm') { // Ubah 'tidak_mampu' menjadi 'sktm'
                $pengajuan->load('sktm');
                $data = $pengajuan->sktm;
                $perihal = 'Surat Keterangan Tidak Mampu - ' . $data->nama;
                $filename = 'sktm_' . $pengajuan->pengajuan_id . '.pdf'; // Ubah prefix filename
            } else {
                return redirect()->back()->with('error', 'Jenis surat tidak valid.');
            }

            // Generate PDF terlebih dahulu
            $generatedFilename = $this->generatePDF($pengajuan, $nomorSurat);

            // Pastikan file PDF berhasil dibuat sebelum update status
            if (!Storage::disk('public')->exists('surat_keluar/' . $generatedFilename)) {
                throw new \Exception('Gagal membuat file PDF');
            }

            // Update pengajuan status setelah PDF berhasil dibuat
            $updateResult = $pengajuan->update([
                'status' => 'approved',
                'approved_at' => now(),
                'approved_by' => Auth::id(),
                'catatan_admin' => request('catatan_admin')
            ]);

            // Log hasil update untuk debugging
            Log::info('Update status pengajuan #' . $pengajuan->pengajuan_id . ' result: ' . ($updateResult ? 'success' : 'failed'));

            // Verifikasi status telah berubah
            $pengajuan = $pengajuan->fresh();
            Log::info('Status pengajuan #' . $pengajuan->pengajuan_id . ' setelah update: ' . $pengajuan->status);

            // Buat arsip setelah status diupdate
            $arsip = Arsip::create([
                'pengajuan_id' => $pengajuan->pengajuan_id,
                'nomor_surat' => $nomorSurat,
                'jenis_surat' => 'keluar',  // Set jenis surat sebagai surat keluar
                'perihal' => $perihal,
                'tanggal_surat' => now(),
                'asal_surat' => 'Desa Gedungboyountung',
                'keterangan' => $data->keterangan ?? 'Surat Keterangan ' . ucfirst($pengajuan->jenis_surat),
                'file_surat' => $generatedFilename,
                'user_created' => Auth::id(),
            ]);

            return redirect()->route('approve')
                ->with('success', 'Pengajuan berhasil disetujui dan surat telah dibuat.');
        } catch (\Exception $e) {
            // Log error
            Log::error('Error saat menyetujui pengajuan #' . $pengajuan->pengajuan_id . ': ' . $e->getMessage());
            Log::error($e->getTraceAsString());

            // Rollback status jika sudah terlanjur diupdate
            if ($pengajuan->status === 'approved') {
                $pengajuan->update(['status' => 'pending']);
            }

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyetujui pengajuan: ' . $e->getMessage());
        }
    }

    private function generatePDF($pengajuan, $nomorSurat)
    {
        try {
            // Setup data untuk PDF
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
            } else if ($pengajuan->jenis_surat == 'sktm') { // Ubah 'tidak_mampu' menjadi 'sktm'
                $pengajuan->load('sktm');
                $data = [
                    'pengajuan' => $pengajuan,
                    'sktm' => $pengajuan->sktm,
                    'nomor_surat' => $nomorSurat,
                    'tanggal' => now()->format('d F Y')
                ];
                $view = 'admin.surat.pdf.sktm'; // Sesuaikan nama view
                $filename = 'sktm_' . $pengajuan->pengajuan_id . '.pdf'; // Ubah prefix filename
            } else {
                throw new \Exception('Jenis surat tidak valid.');
            }

            $pdf = app('dompdf.wrapper')->loadView($view, $data);

            // Pastikan direktori ada
            $storagePath = storage_path('app/public/surat_keluar');
            if (!file_exists($storagePath)) {
                mkdir($storagePath, 0755, true);
            }

            // Simpan PDF
            $pdf->save($storagePath . '/' . $filename);

            // Verifikasi file berhasil disimpan
            if (!file_exists($storagePath . '/' . $filename)) {
                throw new \Exception('File PDF gagal disimpan di: ' . $storagePath . '/' . $filename);
            }

            Log::info('PDF berhasil dibuat: ' . $filename);
            return $filename;
        } catch (\Exception $e) {
            Log::error('Error generating PDF: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            throw $e;
        }
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
            'catatan_admin' => $request->catatam_admin,
        ]);

        return redirect()->route('approve')
            ->with('success', 'Pengajuan berhasil ditolak.');
    }

    private function generateNomorSurat($pengajuan)
    {
        // Tentukan prefix dan suffix berdasarkan jenis surat
        if ($pengajuan->jenis_surat == 'domisili') {
            $prefix = '470';
            $suffix = '413.321.19';
        } else { // untuk surat tidak mampu
            $prefix = '440'; // Changed from 470 to 440 for SKTM
            $suffix = '413.321.19';
        }
        $year = date('Y');

        // Cari nomor surat terakhir dengan format yang sama di tahun ini
        $latestArsip = Arsip::whereYear('created_at', $year)
            ->where('nomor_surat', 'like', $prefix . '/%/' . $suffix . '/' . $year)
            ->orderBy('created_at', 'desc')
            ->first();

        if ($latestArsip && $latestArsip->nomor_surat) {
            // Ekstrak nomor urut dari nomor surat terakhir
            $parts = explode('/', $latestArsip->nomor_surat);
            if (count($parts) >= 2 && is_numeric($parts[1])) {
                $count = (int)$parts[1] + 1;
            } else {
                $count = 1;
            }
        } else {
            $count = 1;
        }

        // Format: 470/001/413.321.19/2024 untuk domisili
        // Format: 440/001/413.321.19/2024 untuk sktm
        return $prefix . '/' . str_pad($count, 3, '0', STR_PAD_LEFT) . '/' . $suffix . '/' . $year;
    }
}
