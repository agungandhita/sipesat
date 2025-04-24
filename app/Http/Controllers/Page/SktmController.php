<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;

class SktmController extends Controller
{
    public function index()
    {
        return view('frontend.pengajuan.sktm', [
            'title' => 'Surat Keterangan Tidak Mampu'
        ]);
    }
}
