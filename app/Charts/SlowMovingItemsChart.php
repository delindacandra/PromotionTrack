<?php

namespace App\Charts;

use App\Models\BarangModel;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class SlowMovingItemsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($months): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $dateLimit = Carbon::now()->subMonths($months);

        $barang = BarangModel::withSum([
            'detailBarangKeluar as jumlah_keluar' => function ($query) use ($dateLimit) {
                $query->whereHas('barang_keluar', function ($q) use ($dateLimit) {
                    $q->where('tanggal_barang_keluar', '>=', $dateLimit);
                });
            }
        ], 'jumlah')
            ->whereHas('stok', function ($q) {
                $q->where('jumlah', '>', 0); 
            })
            ->with('stok') 
            ->orderByRaw('COALESCE(jumlah_keluar, 0) ASC') 
            ->take(5)
            ->get();

        return $this->chart->barChart()
            ->setTitle("Barang Slow-Moving dalam $months Bulan Terakhir")
            ->addData('Jumlah Dikeluarkan', $barang->pluck('jumlah_keluar')->map(fn($val) => $val ?? 0)->toArray())
            ->setXAxis($barang->pluck('nama_barang')->toArray())
            ->setHeight(280);
    }
}
