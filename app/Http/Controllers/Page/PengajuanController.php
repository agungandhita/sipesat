<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengajuan;

class PengajuanController extends Controller
{
    public function index()
    {
        return view('frontend.pengajuan.index', [
            'title' => 'Pengajuan Surat'
        ]);
    }

    public function riwayat()
    {
        $pengajuan = Pengajuan::where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('frontend.riwayat.index', [
            'title' => 'Riwayat Pengajuan',
            'pengajuan' => $pengajuan
        ]);
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'jenis_surat' => 'required',
    //         'keperluan' => 'required',
    //         'lampiran.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048'
    //     ]);

    //     $validatedData['user_id'] = auth()->id();
    //     $validatedData['status'] = 'diproses';

    //     if ($request->hasFile('lampiran')) {
    //         $files = [];
    //         foreach ($request->file('lampiran') as $file) {
    //             $path = $file->store('lampiran', 'public');
    //             $files[] = $path;
    //         }
    //         $validatedData['lampiran'] = json_encode($files);
    //     }

    //     Pengajuan::create($validatedData);

    //     return redirect()->route('pengajuan.riwayat')
    //         ->with('success', 'Pengajuan surat berhasil dikirim');
    // }
}
