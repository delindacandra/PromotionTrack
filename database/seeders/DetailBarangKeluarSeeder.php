<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailBarangKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_detailBarangKeluar' => 1,
                'id_barangKeluar' => 1,
                'id_barang' => 5,
                'jumlah'  => 100
            ],
            [
                'id_detailBarangKeluar' => 2,
                'id_barangKeluar' => 2,
                'id_barang' => 6,
                'jumlah'  => 100
            ],
            [
                'id_detailBarangKeluar' => 3,
                'id_barangKeluar' => 3,
                'id_barang' => 7,
                'jumlah'  => 100
            ],
            [
                'id_detailBarangKeluar' => 4,
                'id_barangKeluar' => 4,
                'id_barang' => 9,
                'jumlah'  => 100
            ],
        ];
        DB::table('detail_barangKeluar')->insert($data);
    }
}
