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
                'id_detail_barang_masuk' => 1,
                'id_barang_masuk' => 1,
                'id_barang' => 44,
                'jumlah' => 108
            ], 
            [
                'id_detail_barang_masuk' => 2,
                'id_barang_masuk' => 2,
                'id_barang' => 8,
                'jumlah' => 750
            ],
            [
                'id_detail_barang_masuk' => 3,
                'id_barang_masuk' => 2,
                'id_barang' => 4,
                'jumlah' => 750
            ],
            [
                'id_detail_barang_masuk' => 4,
                'id_barang_masuk' => 2,
                'id_barang' => 5,
                'jumlah' => 500
            ],
            [
                'id_detail_barang_masuk' => 5,
                'id_barang_masuk' => 2,
                'id_barang' => 6,
                'jumlah' => 500
            ],
            [
                'id_detail_barang_masuk' => 6,
                'id_barang_masuk' => 3,
                'id_barang' => 50,
                'jumlah' => 1000
            ],
            [
                'id_detail_barang_masuk' => 7,
                'id_barang_masuk' => 4,
                'id_barang' => 20,
                'jumlah' => 500,
            ],
            [
                'id_detail_barang_masuk' => 8,
                'id_barang_masuk' => 5,
                'id_barang' => 21,
                'jumlah' => 500,
            ],
            [
                'id_detail_barang_masuk' => 9,
                'id_barang_masuk' => 6,
                'id_barang' => 40,
                'jumlah' => 120,
            ]
        ];
        DB::table('detail_barang_masuk')->insert($data);
    }
}
