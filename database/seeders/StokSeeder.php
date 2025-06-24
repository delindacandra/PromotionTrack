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
                'jumlah' => 250,
            ],
            [
                'id_stok' => 2,
                'id_barang' => 2,
                'jumlah' => 150,
            ],
            [
                'id_stok' => 3,
                'id_barang' => 3,
                'jumlah' => 205,
            ],
            [
                'id_stok' => 4,
                'id_barang' => 4,
                'jumlah' => 230,
            ],
        ];
        DB::table('stok')->insert($data);
    }
}
