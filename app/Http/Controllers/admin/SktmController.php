<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Sktm;
use App\Models\Arsip;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class SktmController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengajuan::where('jenis_surat', 'sktm')
            ->where('status', 'approved')
            ->with('sktm');

        // Filter by name if provided
        if ($request->filled('nama')) {
            $query->whereHas('sktm', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->nama . '%');
            });
        }

        // Filter by NIK if provided
        if ($request->filled('nik')) {
            $query->whereHas('sktm', function ($q) use ($request) {
                $q->where('nik', 'like', '%' . $request->nik . '%');
            });
        }

        $sktms = $query->latest()->paginate(10);

        return view('admin.surat.tidak-mampu.index', compact('sktms'));
    }

    public function create()
    {
        return view('admin.surat.tidak-mampu.form');
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

        // Create pengajuan with auto-approved status
        $pengajuan = Pengajuan::create([
            'user_id' => Auth::id(),
            'jenis_surat' => 'sktm',
            'status' => 'approved', // Auto-approved
            'approved_at' => now(),
            'approved_by' => Auth::id(),
        ]);

        // Create SKTM record
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

        // Generate nomor surat
        $nomorSurat = $this->generateNomorSurat();

        // Make sure we have a valid nomor surat
        if (empty($nomorSurat)) {
            $nomorSurat = '471/001/' . date('m') . '/' . date('Y');
        }

        // Create arsip entry with explicit nomor_surat
        $arsip = new Arsip();
        $arsip->pengajuan_id = $pengajuan->pengajuan_id;
        $arsip->nomor_surat = $nomorSurat;
        $arsip->jenis_surat = 'keluar';
        $arsip->perihal = 'Surat Keterangan Tidak Mampu - ' . $request->nama;
        $arsip->tanggal_surat = now();
        $arsip->asal_surat = 'Desa Gedongboyountung';
        $arsip->keterangan = $request->keterangan;
        $arsip->file_surat = 'sktm_' . $pengajuan->pengajuan_id . '.pdf';
        $arsip->user_created = Auth::id();
        $arsip->save();

        // Generate PDF and save it
        $this->generatePDF($pengajuan, $nomorSurat);

        return redirect()->route('sktm.index')
            ->with('success', 'Surat Keterangan Tidak Mampu berhasil dibuat dan diarsipkan.');
    }

    private function generateNomorSurat()
    {
        $prefix = '470'; // Fixed prefix
        $suffix = '413.321.19'; // Fixed suffix for SKTM
        $year = date('Y');

        // Get the highest number used this year for this type of letter
        $latestArsip = Arsip::whereYear('created_at', $year)
            ->where('nomor_surat', 'like', $prefix . '/%/' . $suffix . '/' . $year)
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

        return $prefix . '/' . str_pad($count, 3, '0', STR_PAD_LEFT) . '/' . $suffix . '/' . $year;
    }

    public function show($id)
    {
        try {
            $pengajuan = Pengajuan::with(['sktm', 'arsip'])->findOrFail($id);

            return response()->json([
                'sktm' => $pengajuan->sktm,
                'arsip' => $pengajuan->arsip,
                'pengajuan' => $pengajuan
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        $pengajuan = Pengajuan::with('sktm')->findOrFail($id);
        return view('admin.surat.tidak-mampu.edit', compact('pengajuan'));
    }

    public function update(Request $request, $id)
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

        $pengajuan = Pengajuan::findOrFail($id);
        $sktm = $pengajuan->sktm;

        $sktm->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
            'keperluan' => $request->keperluan,
        ]);

        // Update arsip entry
        $arsip = Arsip::where('pengajuan_id', $pengajuan->pengajuan_id)->first();
        if ($arsip) {
            $arsip->update([
                'perihal' => 'Surat Keterangan Tidak Mampu - ' . $request->nama,
                'keterangan' => $request->keterangan,
                'user_updated' => Auth::id(),
            ]);

            // Regenerate PDF
            $this->generatePDF($pengajuan, $arsip->nomor_surat);
        }

        return redirect()->route('sktm.index')
            ->with('success', 'Surat Keterangan Tidak Mampu berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        // Delete the arsip record if it exists
        $arsip = Arsip::where('pengajuan_id', $pengajuan->pengajuan_id)->first();
        if ($arsip) {
            // Delete the physical file if it exists
            $filePath = storage_path('app/public/surat_keluar/' . $arsip->file_surat);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $arsip->delete();
        }

        // Delete the pengajuan record (will cascade delete SKTM due to foreign key)
        $pengajuan->delete();

        return redirect()->route('sktm.index')
            ->with('success', 'Surat Keterangan Tidak Mampu berhasil dihapus.');
    }

    public function download($id)
    {
        $pengajuan = Pengajuan::with('sktm')->findOrFail($id);
        $arsip = Arsip::where('pengajuan_id', $pengajuan->pengajuan_id)->first();

        if (!$arsip) {
            return redirect()->back()->with('error', 'File surat tidak ditemukan.');
        }

        // Fix the file path to match your actual storage structure
        $filePath = storage_path('app/public/surat_keluar/' . $arsip->file_surat);

        if (!file_exists($filePath)) {
            // If file doesn't exist, regenerate it
            $this->generatePDF($pengajuan, $arsip->nomor_surat);
        }

        // Use the same filename that's stored in the database
        return response()->download($filePath, $arsip->file_surat);
    }

    private function generatePDF($pengajuan, $nomorSurat)
    {
        $data = [
            'pengajuan' => $pengajuan,
            'sktm' => $pengajuan->sktm,
            'nomor_surat' => $nomorSurat,
            'tanggal' => now()->format('d F Y')
        ];

        $pdf = PDF::loadView('admin.surat.pdf.sktm', $data);

        // Make sure directory exists with the correct path
        $storagePath = storage_path('app/public/surat_keluar');
        if (!file_exists($storagePath)) {
            mkdir($storagePath, 0755, true);
        }

        $filename = 'sktm_' . $pengajuan->pengajuan_id . '.pdf';
        $pdf->save($storagePath . '/' . $filename);

        return $filename;
    }
}
