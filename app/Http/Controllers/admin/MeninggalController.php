<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Meninggal;
use App\Models\Arsip;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class MeninggalController extends Controller
{
    public function index()
    {
        $meninggals = Pengajuan::where('jenis_surat', 'meninggal')
            ->where('status', 'approved')
            ->with('meninggal')
            ->latest()
            ->paginate(10);

        return view('admin.surat.suket-meninggal.index', compact('meninggals'));
    }

    public function create()
    {
        return view('admin.surat.suket-meninggal.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pejabat' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nik_almarhum' => 'required|string|size:16',
            'nama_almarhum' => 'required|string|max:255',
            'tempat_lahir_almarhum' => 'required|string|max:255',
            'tanggal_lahir_almarhum' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'warga_negara' => 'required|string|max:255',
            'agama' => 'required|string',
            'pekerjaan_almarhum' => 'required|string|max:255',
            'alamat_almarhum' => 'required|string',
            'tanggal_meninggal' => 'required|date',
            'sebab_meninggal' => 'required|string|max:255',
            'tempat_meninggal' => 'required|string|max:255',
            'nik_pelapor' => 'required|string|size:16',
            'nama_pelapor' => 'required|string|max:255',
            'tempat_lahir_pelapor' => 'required|string|max:255',
            'tanggal_lahir_pelapor' => 'required|date',
            'jenis_kelamin_pelapor' => 'required|string',
            'alamat_pelapor' => 'required|string',
        ]);

        // Create pengajuan with auto-approved status
        $pengajuan = Pengajuan::create([
            'user_id' => Auth::id(),
            'jenis_surat' => 'meninggal',
            'status' => 'approved',
            'approved_at' => now(),
            'approved_by' => Auth::id(),
        ]);

        // Create meninggal record
        $meninggal = Meninggal::create([
            'pengajuan_id' => $pengajuan->pengajuan_id,
            'nama_pejabat' => $request->nama_pejabat,
            'jabatan' => $request->jabatan,
            'nik_almarhum' => $request->nik_almarhum,
            'nama_almarhum' => $request->nama_almarhum,
            'tempat_lahir_almarhum' => $request->tempat_lahir_almarhum,
            'tanggal_lahir_almarhum' => $request->tanggal_lahir_almarhum,
            'jenis_kelamin' => $request->jenis_kelamin,
            'warga_negara' => $request->warga_negara,
            'agama' => $request->agama,
            'pekerjaan_almarhum' => $request->pekerjaan_almarhum,
            'alamat_almarhum' => $request->alamat_almarhum,
            'tanggal_meninggal' => $request->tanggal_meninggal,
            'sebab_meninggal' => $request->sebab_meninggal,
            'tempat_meninggal' => $request->tempat_meninggal,
            'nik_pelapor' => $request->nik_pelapor,
            'nama_pelapor' => $request->nama_pelapor,
            'tempat_lahir_pelapor' => $request->tempat_lahir_pelapor,
            'tanggal_lahir_pelapor' => $request->tanggal_lahir_pelapor,
            'jenis_kelamin_pelapor' => $request->jenis_kelamin_pelapor,
            'alamat_pelapor' => $request->alamat_pelapor,
        ]);

        // Generate nomor surat
        $nomorSurat = $this->generateNomorSurat();

        // Create arsip entry
        $arsip = new Arsip();
        $arsip->pengajuan_id = $pengajuan->pengajuan_id;
        $arsip->nomor_surat = $nomorSurat;
        $arsip->jenis_surat = 'keluar';
        $arsip->perihal = 'Surat Keterangan Kematian - ' . $request->nama_almarhum;
        $arsip->tanggal_surat = now();
        $arsip->asal_surat = 'Desa Gedungboyountung';
        $arsip->keterangan = 'Surat Keterangan Kematian atas nama ' . $request->nama_almarhum;
        $arsip->file_surat = 'meninggal_' . $pengajuan->pengajuan_id . '.pdf';
        $arsip->user_created = Auth::id();
        $arsip->save();

        // Generate PDF
        $this->generatePDF($pengajuan, $nomorSurat);

        return redirect()->route('meninggal.index')
            ->with('success', 'Surat Keterangan Kematian berhasil dibuat dan diarsipkan.');
    }

    private function generateNomorSurat()
    {
        $prefix = '470'; // Prefix untuk surat kematian
        $suffix = '413.321.19'; // Suffix tetap
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

        // Format: 470/001/413.321.19/2024
        return $prefix . '/' . str_pad($count, 3, '0', STR_PAD_LEFT) . '/' . $suffix . '/' . $year;
    }

    public function show($id)
    {
        try {
            $pengajuan = Pengajuan::with(['meninggal', 'arsip'])->findOrFail($id);
            
            if (request()->ajax()) {
                return response()->json([
                    'pengajuan' => $pengajuan,
                    'meninggal' => $pengajuan->meninggal,
                    'arsip' => $pengajuan->arsip
                ]);
            }

            return view('admin.surat.suket-meninggal.show', compact('pengajuan'));
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json(['error' => 'Data tidak ditemukan'], 404);
            }
            return back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function edit($id)
    {
        $pengajuan = Pengajuan::with('meninggal')->findOrFail($id);
        return view('admin.surat.suket-meninggal.edit', compact('pengajuan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pejabat' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nik_almarhum' => 'required|string|size:16',
            'nama_almarhum' => 'required|string|max:255',
            'tempat_lahir_almarhum' => 'required|string|max:255',
            'tanggal_lahir_almarhum' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'warga_negara' => 'required|string|max:255',
            'agama' => 'required|string',
            'pekerjaan_almarhum' => 'required|string|max:255',
            'alamat_almarhum' => 'required|string',
            'tanggal_meninggal' => 'required|date',
            'sebab_meninggal' => 'required|string|max:255',
            'tempat_meninggal' => 'required|string|max:255',
            'nik_pelapor' => 'required|string|size:16',
            'nama_pelapor' => 'required|string|max:255',
            'tempat_lahir_pelapor' => 'required|string|max:255',
            'tanggal_lahir_pelapor' => 'required|date',
            'jenis_kelamin_pelapor' => 'required|string',
            'alamat_pelapor' => 'required|string',
        ]);

        $pengajuan = Pengajuan::findOrFail($id);
        $meninggal = $pengajuan->meninggal;

        $meninggal->update($request->all());

        // Update arsip entry
        $arsip = Arsip::where('pengajuan_id', $pengajuan->pengajuan_id)->first();
        if ($arsip) {
            $arsip->update([
                'perihal' => 'Surat Keterangan Kematian - ' . $request->nama_almarhum,
                'keterangan' => 'Surat Keterangan Kematian atas nama ' . $request->nama_almarhum,
                'user_updated' => Auth::id(),
            ]);

            // Regenerate PDF
            $this->generatePDF($pengajuan, $arsip->nomor_surat);
        }

        return redirect()->route('meninggal.index')
            ->with('success', 'Surat Keterangan Kematian berhasil diperbarui.');
    }

    public function download($id)
    {
        $pengajuan = Pengajuan::with('meninggal')->findOrFail($id);
        $arsip = Arsip::where('pengajuan_id', $pengajuan->pengajuan_id)->first();

        if (!$arsip) {
            return redirect()->back()->with('error', 'File surat tidak ditemukan.');
        }

        $filePath = storage_path('app/public/surat_keluar/' . $arsip->file_surat);

        if (!file_exists($filePath)) {
            $this->generatePDF($pengajuan, $arsip->nomor_surat);
        }

        return response()->download($filePath, $arsip->file_surat);
    }

    private function generatePDF($pengajuan, $nomorSurat)
    {
        $data = [
            'pengajuan' => $pengajuan,
            'meninggal' => $pengajuan->meninggal,
            'nomor_surat' => $nomorSurat,
            'tanggal' => now()->format('d F Y')
        ];

        $pdf = PDF::loadView('admin.surat.pdf.meninggal', $data);

        $storagePath = storage_path('app/public/surat_keluar');
        if (!file_exists($storagePath)) {
            mkdir($storagePath, 0755, true);
        }

        $filename = 'meninggal_' . $pengajuan->pengajuan_id . '.pdf';
        $pdf->save($storagePath . '/' . $filename);

        return $filename;
    }
}