<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_barangKeluar' => 1,
                'tanggal_barangKeluar' => '2024/09/14',
                'keperluan' => 'SA NTB',
                'keterangan' => '',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 2,
                'tanggal_barangKeluar' => '2024/09/14',
                'keperluan' => 'SA NTB',
                'keterangan' => '',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 3,
                'tanggal_barangKeluar' => '2024/09/14',
                'keperluan' => 'SA NTB',
                'keterangan' => '',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 4,
                'tanggal_barangKeluar' => '2024/09/14',
                'keperluan' => 'SA NTB',
                'keterangan' => '',
                'id_permintaan' => null
            ]
        ];
        DB::table('barang_keluar')->insert($data);
    }
}
