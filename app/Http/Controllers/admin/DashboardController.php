<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Arsip;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get current date and time
        $now = Carbon::now();
        $today = Carbon::today();
        $startOfWeek = Carbon::now()->startOfWeek();
        $startOfMonth = Carbon::now()->startOfMonth();

        // Count total documents
        $totalArsip = Arsip::count();
        $newArsip = Arsip::where('created_at', '>=', $startOfWeek)->count();
        $targetArsip = 100; // You can adjust this or make it dynamic

        // Count incoming letters
        $totalSuratMasuk = Arsip::where('jenis_surat', 'masuk')->count();
        $newSuratMasuk = Arsip::where('jenis_surat', 'masuk')
            ->where('created_at', '>=', $today)
            ->count();
        $targetSuratMasuk = 50; // You can adjust this

        // Count outgoing letters
        $totalSuratKeluar = Arsip::where('jenis_surat', 'keluar')->count();
        $newSuratKeluar = Arsip::where('jenis_surat', 'keluar')
            ->where('created_at', '>=', $startOfWeek)
            ->count();
        $targetSuratKeluar = 50; // You can adjust this

        // Get recent activities
        // Since you might not have an activities table yet, we'll create mock data
        $recentActivities = $this->getMockActivities();

        // Get service statistics
        $statistikLayanan = $this->getStatistics();
        $statColors = ['blue', 'green', 'yellow', 'purple', 'red', 'indigo'];

        return view('admin.dashboard.index', compact(
            'totalArsip', 'newArsip', 'targetArsip',
            'totalSuratMasuk', 'newSuratMasuk', 'targetSuratMasuk',
            'totalSuratKeluar', 'newSuratKeluar', 'targetSuratKeluar',
            'recentActivities', 'statistikLayanan', 'statColors'
        ));
    }

    private function getMockActivities()
    {
        // This is a temporary function to generate mock activities
        // In a real application, you would fetch this from your activities table
        
        $activities = collect([
            (object)[
                'title' => 'Surat Masuk Baru',
                'description' => 'Surat dari Dinas Pendidikan telah diterima',
                'created_at' => Carbon::now()->subHours(2),
                'type_color' => 'blue',
                'icon_path' => '<path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>'
            ],
            (object)[
                'title' => 'Surat Keluar Terkirim',
                'description' => 'Surat undangan rapat berhasil dikirim',
                'created_at' => Carbon::now()->subHours(5),
                'type_color' => 'green',
                'icon_path' => '<polyline points="20 6 9 17 4 12"></polyline>'
            ],
            (object)[
                'title' => 'Dokumen Diarsipkan',
                'description' => '3 dokumen baru telah diarsipkan',
                'created_at' => Carbon::now()->subDays(1),
                'type_color' => 'yellow',
                'icon_path' => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>'
            ]
        ]);
        
        return $activities;
    }

    private function getStatistics()
    {
        // Group by perihal and count
        $stats = DB::table('arsips')
            ->select('perihal', DB::raw('count(*) as total'))
            ->groupBy('perihal')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();
            
        // Calculate percentages
        $total = $stats->sum('total');
        
        return $stats->map(function ($item) use ($total) {
            $item->percentage = $total > 0 ? round(($item->total / $total) * 100) : 0;
            
            // This would typically be calculated by comparing with previous period
            // For now, we'll just generate a random change
            $item->change = rand(-5, 10);
            
            return $item;
        });
    }
}
