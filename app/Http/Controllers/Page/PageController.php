<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('frontend.beranda.index',[
            'title' => 'beranda'
        ]);
    }

    public function profil() {
        return view('frontend.profile.index', [
            'title' => 'profil desa'

        ]);
    }
}
