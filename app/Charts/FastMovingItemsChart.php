<?php

namespace App\Charts;

use App\Models\BarangModel;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class FastMovingItemsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($months): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $dateLimit = Carbon::now()->subMonths($months);

        $barang = BarangModel::withCount([
            'detailBarangKeluar as jumlah_keluar' => function ($query) use ($dateLimit) {
                $query->where('created_at', '>=', $dateLimit);
            }
        ])
            ->orderBy('jumlah_keluar', 'desc')
            ->take(5)
            ->get();

        return $this->chart->barChart()
            ->setTitle("Barang Paling Sering Keluar dalam $months Bulan Terakhir")
            ->addData('Jumlah Dikeluarkan', $barang->pluck('jumlah_keluar')->toArray())
            ->setXAxis($barang->pluck('nama_barang')->toArray())
            ->setHeight(280);
    }
}
