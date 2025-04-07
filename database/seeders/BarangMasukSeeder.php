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
                'keterangan' => 'Tambahan 108pcs'
            ],
            [
                'id_barangMasuk' => 2,
                'tanggal_barangMasuk' => '2024/08/29',
                'keterangan' => 'Tambah stok'
            ],
            [
                'id_barangMasuk' => 3,
                'tanggal_barangMasuk' => '2024/08/29',
                'keterangan' => 'Tambah stok'
            ],
            [
                'id_barangMasuk' => 4,
                'tanggal_barangMasuk' => '2024/08/29',
                'keterangan' => 'Tambah stok'
            ],
            [
                'id_barangMasuk' => 5,
                'tanggal_barangMasuk' => '2024/08/29',
                'keterangan' => 'Tambah stok'
            ],
            [
                'id_barangMasuk' => 6,
                'tanggal_barangMasuk' => '2024/09/12',
                'keterangan' => 'Tambah stok'
            ],
            [
                'id_barangMasuk' => 7,
                'tanggal_barangMasuk' => '2024/10/03',
                'keterangan' => 'Tambah stok'
            ],
            [
                'id_barangMasuk' => 8,
                'tanggal_barangMasuk' => '2024/10/11',
                'keterangan' => 'Tambah stok'
            ],
            [
                'id_barangMasuk' => 9,
                'tanggal_barangMasuk' => '2024/11/20',
                'keterangan' => 'Return dari commrel - Keperluan kegiatan mandalika 2024'
            ],
            
        ];
        DB::table('barang_masuk')->insert($data);
    }
}
