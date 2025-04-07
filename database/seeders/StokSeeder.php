<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_stok' => 1,
                'id_barang' => 1,
                'jumlah' => 8,
            ],
            [
                'id_stok' => 2,
                'id_barang' => 2,
                'jumlah' => 79,
            ],
            [
                'id_stok' => 3,
                'id_barang' => 3,
                'jumlah' => 325,
            ],
            [
                'id_stok' => 4,
                'id_barang' => 4,
                'jumlah' => 370,
            ],
            [
                'id_stok' => 5,
                'id_barang' => 5,
                'jumlah' => 290,
            ],
            [
                'id_stok' => 6,
                'id_barang' => 6,
                'jumlah' => 225,
            ],
            [
                'id_stok' => 7,
                'id_barang' => 7,
                'jumlah' => 180,
            ],
            [
                'id_stok' => 8,
                'id_barang' => 8,
                'jumlah' => 335,
            ],
            [
                'id_stok' => 9,
                'id_barang' => 9,
                'jumlah' => 309,
            ],
            [
                'id_stok' => 10,
                'id_barang' => 10,
                'jumlah' => 125,
            ],
            [
                'id_stok' => 11,
                'id_barang' => 11,
                'jumlah' => 40,
            ],
            [
                'id_stok' => 12,
                'id_barang' => 12,
                'jumlah' => 271,
            ],
            [
                'id_stok' => 13,
                'id_barang' => 13,
                'jumlah' => 131,
            ],
            [
                'id_stok' => 14,
                'id_barang' => 14,
                'jumlah' => 50,
            ],
            [
                'id_stok' => 15,
                'id_barang' => 15,
                'jumlah' => 2,
            ],
            [
                'id_stok' => 16,
                'id_barang' => 16,
                'jumlah' => 645,
            ],
            [
                'id_stok' => 17,
                'id_barang' => 17,
                'jumlah' => 0,
            ],
            [
                'id_stok' => 18,
                'id_barang' => 18,
                'jumlah' => 130,
            ],
            [
                'id_stok' => 19,
                'id_barang' => 19,
                'jumlah' => 33,
            ],
            [
                'id_stok' => 20,
                'id_barang' => 20,
                'jumlah' => 170,
            ],
            [
                'id_stok' => 21,
                'id_barang' => 21,
                'jumlah' => 240,
            ],
            [
                'id_stok' => 22,
                'id_barang' => 22,
                'jumlah' => 28,
            ],
            [
                'id_stok' => 23,
                'id_barang' => 23,
                'jumlah' => 220,
            ],
            [
                'id_stok' => 24,
                'id_barang' => 24,
                'jumlah' => 9,
            ],
            [
                'id_stok' => 25,
                'id_barang' => 25,
                'jumlah' => 257,
            ],
            [
                'id_stok' => 26,
                'id_barang' => 26,
                'jumlah' => 778,
            ],
            [
                'id_stok' => 27,
                'id_barang' => 27,
                'jumlah' => 27,
            ],
            [
                'id_stok' => 28,
                'id_barang' => 28,
                'jumlah' => 44,
            ],
            [
                'id_stok' => 29,
                'id_barang' => 29,
                'jumlah' => 0,
            ],
            [
                'id_stok' => 30,
                'id_barang' => 30,
                'jumlah' => 40,
            ],
        ];
        DB::table('stok')->insert($data);
    }
}
