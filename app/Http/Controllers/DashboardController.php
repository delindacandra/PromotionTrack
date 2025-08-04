<?php

namespace App\Http\Controllers;

use App\Charts\FastMovingItemsChart;
use App\Charts\SlowMovingItemsChart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request, SlowMovingItemsChart $slowChart, FastMovingItemsChart $fastChart)
    {
        $breadcrumb = (object)[
            'title' => 'Dashboard',
            'list' => ['Dashboard']
        ];

        $user = session('user');
        $totalBarang = DB::table('data_barang')->count();
        $totalPermintaan = DB::table('barang_keluar')->count();
        $totalBarangKeluar = DB::table('detail_barang_keluar')->sum('jumlah');
        $totalBarangMasuk = DB::table('barang_masuk')->count();

        // Ambil filter dari query string, default = 6 bulan
        $slowRange = $request->get('slow_range', 6);
        $fastRange = $request->get('fast_range', 6);

        $slowMovingChart = $slowChart->build($slowRange);
        $fastMovingChart = $fastChart->build($fastRange);

        return view('dashboard', [
            'breadcrumb' => $breadcrumb,
            'user' => $user,
            'totalBarang' => $totalBarang,
            'totalPermintaan' => $totalPermintaan,
            'totalBarangKeluar' => $totalBarangKeluar,
            'totalBarangMasuk' => $totalBarangMasuk,
            'slowMoving' => $slowMovingChart,
            'fastMoving' => $fastMovingChart,
        ]);
    }
}
