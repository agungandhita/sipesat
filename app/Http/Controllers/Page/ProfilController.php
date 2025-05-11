<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\ProfileDesa;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        // Ambil semua data perangkat desa
        $perangkatDesa = ProfileDesa::all();
        
        return view('frontend.profile.index', [
            'title' => 'profil desa',
            'perangkatDesa' => $perangkatDesa
        ]);
    }
}