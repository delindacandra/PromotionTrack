<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailBarangMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_detailBarangMasuk' => 1,
                'id_barangMasuk' => 1,
                'id_barang' => 1,
                'jumlah' => 108
            ],
            [
                'id_detailBarangMasuk' => 2,
                'id_barangMasuk' => 2,
                'id_barang' => 8,
                'jumlah' => 750
            ],
            [
                'id_detailBarangMasuk' => 3,
                'id_barangMasuk' => 3,
                'id_barang' => 4,
                'jumlah' => 750
            ],
            [
                'id_detailBarangMasuk' => 4,
                'id_barangMasuk' => 4,
                'id_barang' => 5,
                'jumlah' => 500
            ],
            [
                'id_detailBarangMasuk' => 5,
                'id_barangMasuk' => 5,
                'id_barang' => 6,
                'jumlah' => 500
            ],
            [
                'id_detailBarangMasuk' => 6,
                'id_barangMasuk' => 6,
                'id_barang' => 30,
                'jumlah' => 1000
            ],
            [
                'id_detailBarangMasuk' => 7,
                'id_barangMasuk' => 7,
                'id_barang' => 20,
                'jumlah' => 500
            ],
            [
                'id_detailBarangMasuk' => 8,
                'id_barangMasuk' => 8,
                'id_barang' => 21,
                'jumlah' => 500
            ],
            [
                'id_detailBarangMasuk' => 9,
                'id_barangMasuk' => 9,
                'id_barang' => 30,
                'jumlah' => 120
            ],
        ];
        DB::table('detail_barangMasuk')->insert($data);
    }
}
