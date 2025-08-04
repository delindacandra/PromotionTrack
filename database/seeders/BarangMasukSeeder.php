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
                'id_barang_masuk' => 1,
                'tanggal_barang_masuk' => '2024/08/28',
                'keterangan' => 'Tambahan 108pcs lagi ya'
            ],
            [
                'id_barang_masuk' => 2,
                'tanggal_barang_masuk' => '2024/08/29',
                'keterangan' => 'Tambah stok'
            ],
            [
                'id_barang_masuk' => 3,
                'tanggal_barang_masuk' => '2024/08/29',
                'keterangan' => 'Tambah stok'
            ],
            [
                'id_barang_masuk' => 4,
                'tanggal_barang_masuk' => '2024/08/29',
                'keterangan' => 'Tambah stok'
            ], 
            [
                'id_barang_masuk' => 5,
                'tanggal_barang_masuk' => '2024/08/29',
                'keterangan' => 'Tambah stok'
            ],
            [
                'id_barang_masuk' => 6,
                'tanggal_barang_masuk' => '2024/09/12',
                'keterangan' => 'Tambah stok'
            ],
            [
                'id_barang_masuk' => 7,
                'tanggal_barang_masuk' => '2024/10/03',
                'keterangan' => 'Tambah stok'
            ],
            [
                'id_barang_masuk' => 8,
                'tanggal_barang_masuk' => '2024/10/11',
                'keterangan' => 'Tambah stok'
            ],
            [
                'id_barang_masuk' => 9,
                'tanggal_barang_masuk' => '2024/11/20',
                'keterangan' => 'Return dari commrel - Keperluan kegiatan mandalika 2024'
            ],
            
        ];
        DB::table('barang_masuk')->insert($data);
    }
}
