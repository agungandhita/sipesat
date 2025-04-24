<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;

class DomisiliController extends Controller
{
    public function index()
    {
        return view('frontend.pengajuan.domisili', [
            'title' => 'Domisili'
        ]);
    }
}
