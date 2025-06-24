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
                'jumlah' => 100
            ],
        ];
        DB::table('detail_barangMasuk')->insert($data);
    }
}
