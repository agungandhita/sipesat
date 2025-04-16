<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('frontend.beranda.index', [
            'title' => 'beranda'
        ]);
    }

    public function profil()
    {
        return view('frontend.profile.index', [
            'title' => 'profil desa'
        ]);
    }

    public function pengumuman()
    {
        return view('frontend.pengumuman.index');
    }

    public function artikel()
    {
        return view('frontend.pengumuman.artikel');
    }

    public function layanan()
    {
        return view('frontend.pengajuan.layanan');
    }

    public function userProfile()
    {
        $user = auth()->user();
        return view('frontend.user.profile', [
            'user' => $user,
            'title' => 'Profil Pengguna'
        ]);
    }
}
