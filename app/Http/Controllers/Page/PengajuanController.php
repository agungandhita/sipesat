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
        $pengajuan = Pengajuan::with(['sktm', 'domisili', 'meninggal']) // eager loading untuk menghindari N+1 problem
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('frontend.riwayat.index', [
            'title' => 'Riwayat Pengajuan',
            'pengajuan' => $pengajuan
        ]);
    }


    public function detail($id)
    {
        $pengajuan = Pengajuan::with(['sktm', 'domisili', 'meninggal'])
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        return response()->json($pengajuan);
    }
}
