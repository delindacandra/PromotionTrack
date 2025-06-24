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
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2025/02/15',
                'keperluan' => 'Support Kegiatan PKB IX',
                'keterangan' => 'Kepada SPPSN',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 2,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2025/02/26',
                'keperluan' => 'MyPertamina Basket Ball Cup',
                'keterangan' => '',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 3,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2025/02/26',
                'keperluan' => 'MyPertamina Basket Ball Cup',
                'keterangan' => '',
                'id_permintaan' => null
            ],
            [
                'id_barangKeluar' => 4,
                'id_fungsi' => 4,
                'id_sa' => 1,
                'tanggal_barangKeluar' => '2025/03/21',
                'keperluan' => 'Safety Campaign',
                'keterangan' => '',
                'id_permintaan' => null
            ]
        ];
        DB::table('barang_keluar')->insert($data);
    }
}
