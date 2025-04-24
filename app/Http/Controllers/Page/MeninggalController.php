<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;

class MeninggalController extends Controller
{
    public function index()
    {
        return view('frontend.pengajuan.meninggal', [
            'title' => 'Surat Keterangan Meninggal'
        ]);
    }
}
