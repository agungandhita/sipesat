<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Domisili;
use App\Models\Arsip;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class DomisiliController extends Controller
{
    public function index()
    {
        // Get all domisili letters created by admin
        $domisilis = Pengajuan::where('jenis_surat', 'domisili')
            ->where('status', 'approved')
            ->with('domisili')
            ->latest()
            ->paginate(10);

        return view('admin.surat.domisili.index', compact('domisilis'));
    }

    public function create()
    {
        return view('admin.surat.domisili.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'tempat_lahir' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'keterangan' => 'required|string',
            'keperluan' => 'required|string|max:255',
        ]);

        // Create pengajuan with auto-approved status
        $pengajuan = Pengajuan::create([
            'user_id' => Auth::id(),
            'jenis_surat' => 'domisili',
            'status' => 'approved', // Auto-approved
            'approved_at' => now(),
            'approved_by' => Auth::id(),
        ]);

        // Create domisili record
        $domisili = Domisili::create([
            'pengajuan_id' => $pengajuan->pengajuan_id,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
            'keperluan' => $request->keperluan,
        ]);

        // Generate nomor surat - ensure it's not empty
        $nomorSurat = $this->generateNomorSurat();

        // Make sure we have a valid nomor surat
        if (empty($nomorSurat)) {
            $nomorSurat = 'SKD/001/' . date('m') . '/' . date('Y');
        }

        // Create arsip entry with explicit nomor_surat
        $arsip = new Arsip();
        $arsip->pengajuan_id = $pengajuan->pengajuan_id;
        $arsip->nomor_surat = $nomorSurat; // Explicitly set the nomor_surat
        $arsip->jenis_surat = 'keluar';
        $arsip->perihal = 'Surat Keterangan Domisili - ' . $request->nama;
        $arsip->tanggal_surat = now();
        $arsip->asal_surat = 'Desa Gedungboyountung';
        $arsip->keterangan = $request->keterangan;
        $arsip->file_surat = 'domisili_' . $pengajuan->pengajuan_id . '.pdf';
        $arsip->user_created = Auth::id();
        $arsip->save();

        // Generate PDF and save it
        $this->generatePDF($pengajuan, $nomorSurat);

        return redirect()->route('domisili.index')
            ->with('success', 'Surat Keterangan Domisili berhasil dibuat dan diarsipkan.');
    }

    private function generateNomorSurat()
    {
        $prefix = 'SKD';

        // Get the highest number used this year
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

    public function show($id)
    {
        $pengajuan = Pengajuan::with('domisili')->findOrFail($id);
        $arsip = Arsip::where('pengajuan_id', $pengajuan->pengajuan_id)->first();

        return view('admin.surat.domisili.show', compact('pengajuan', 'arsip'));
    }

    public function edit($id)
    {
        $pengajuan = Pengajuan::with('domisili')->findOrFail($id);
        return view('admin.surat.domisili.edit', compact('pengajuan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'tempat_lahir' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'keterangan' => 'required|string',
            'keperluan' => 'required|string|max:255',
        ]);

        $pengajuan = Pengajuan::findOrFail($id);
        $domisili = $pengajuan->domisili;

        $domisili->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
            'keperluan' => $request->keperluan,
        ]);

        // Update arsip entry
        $arsip = Arsip::where('pengajuan_id', $pengajuan->pengajuan_id)->first();
        if ($arsip) {
            $arsip->update([
                'perihal' => 'Surat Keterangan Domisili - ' . $request->nama,
                'keterangan' => $request->keterangan,
                'user_updated' => Auth::id(),
            ]);

            // Regenerate PDF
            $this->generatePDF($pengajuan, $arsip->nomor_surat);
        }

        return redirect()->route('domisili.index')
            ->with('success', 'Surat Keterangan Domisili berhasil diperbarui.');
    }

    public function download($id)
    {
        $pengajuan = Pengajuan::with('domisili')->findOrFail($id);
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
            'domisili' => $pengajuan->domisili,
            'nomor_surat' => $nomorSurat,
            'tanggal' => now()->format('d F Y')
        ];

        $pdf = PDF::loadView('admin.surat.pdf.domisili', $data);

        // Make sure directory exists with the correct path
        $storagePath = storage_path('app/public/surat_keluar');
        if (!file_exists($storagePath)) {
            mkdir($storagePath, 0755, true);
        }

        $filename = 'domisili_' . $pengajuan->pengajuan_id . '.pdf';
        $pdf->save($storagePath . '/' . $filename);

        return $filename;
    }
}
