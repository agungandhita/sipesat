<?php

namespace App\Http\Controllers\Page;

use App\Models\Penduduk;
use App\Models\ProfileDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ProfilController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Ambil semua data perangkat desa
            $perangkatDesa = ProfileDesa::all();

            // PERBAIKAN 7: Perbaiki pengambilan daftar dusun
            $dusunList = Penduduk::distinct()
                ->whereNotNull('dusun')
                ->where('dusun', '!=', '')
                ->orderBy('dusun')
                ->pluck('dusun');

            // Inisialisasi query penduduk
            $query = Penduduk::query();

            // PERBAIKAN 8: Perbaiki filter pencarian
            // Filter berdasarkan pencarian nama (case insensitive)
            if ($request->filled('search')) {
                $searchTerm = trim($request->search);
                $query->where('nama', 'like', '%' . $searchTerm . '%');
            }

            // Filter berdasarkan Dusun
            if ($request->filled('dusun')) {
                $query->where('dusun', $request->dusun);
            }

            // PERBAIKAN 9: Hanya ambil data jika ada filter
            $penduduk = null;
            if ($request->filled('search') || $request->filled('dusun')) {
                // Ambil data penduduk dengan pagination
                $penduduk = $query->paginate(10);

                // PERBAIKAN 10: Jika tidak ada hasil, buat collection kosong
                if ($penduduk->isEmpty()) {
                    $penduduk = $query->paginate(10); // Tetap gunakan paginator kosong
                }
            }

            return view('frontend.profile.index', [
                'title' => 'Profil Desa',
                'perangkatDesa' => $perangkatDesa,
                'penduduk' => $penduduk,
                'dusunList' => $dusunList
            ]);

        } catch (\Exception $e) {
            // PERBAIKAN 11: Error handling
            Log::error('Error in profile search: ' . $e->getMessage());

            return view('frontend.profile.index', [
                'title' => 'Profil Desa',
                'perangkatDesa' => collect([]),
                'penduduk' => null,
                'dusunList' => collect([]),
                'error' => 'Terjadi kesalahan saat memuat data.'
            ]);
        }
    }
}
