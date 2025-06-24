<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_barangMasuk' => 1,
                'tanggal_barangMasuk' => '2024/08/28',
                'keterangan' => 'Tambahan'
            ],
            
        ];
        DB::table('barang_masuk')->insert($data);
    }
}
