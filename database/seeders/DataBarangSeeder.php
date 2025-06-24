<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_barang' => 1,
                'nama_barang' => 'Kaos Dexlite',
                'id_vendor' => 1,
                'gambar' => '',
            ],
            [
                'id_barang' => 2,
                'nama_barang' => 'Kaos Pertamax',
                'id_vendor' => 1,
                'gambar' => '',
            ],
            [
                'id_barang' => 3,
                'nama_barang' => 'Kaos Pertamina Dex',
                'id_vendor' => 1,
                'gambar' => '',
            ],
            [
                'id_barang' => 4,
                'nama_barang' => 'Kaos Polo Pertamax Turbo',
                'id_vendor' => 1,
                'gambar' => '',
            ],
        ];
        DB::table('data_barang')->insert($data);
    }
}
