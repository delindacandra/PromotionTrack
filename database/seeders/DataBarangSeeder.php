<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [
                'id_barang' => 1,
                'nama_barang' => 'Plakat Pertashop',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 2,
                'nama_barang' => 'Lumpin',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 3,
                'nama_barang' => 'Umbul-umbul Pertalite',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 4,
                'nama_barang' => 'Umbul-umbul Pertamax',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 5,
                'nama_barang' => 'Umbul-umbul Pertamax Turbo',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 6,
                'nama_barang' => 'Umbul-umbul Pertamina Dex',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 7,
                'nama_barang' => 'Umbul-umbul Dexlite',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 8,
                'nama_barang' => 'Umbul-umbul My Pertamina',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 9,
                'nama_barang' => 'Bantal Leher',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 10,
                'nama_barang' => 'Gantungan Kunci Mobil',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 11,
                'nama_barang' => 'Tumbler L&L MyPertamia',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 12,
                'nama_barang' => 'Tumbler MyPertamina Putih',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 13,
                'nama_barang' => 'Tumbler MyPertamina Hitam',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 14,
                'nama_barang' => 'Celemek Bright Gas',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 15,
                'nama_barang' => 'Plakat MyPertamina',
                'vendor' => '',
                'gambar' => '',
            ],
            
            [
                'id_barang' => 16,
                'nama_barang' => 'Gantungan Kunci Motor Jiffy',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 17,
                'nama_barang' => 'Box Kulit (Cluth, Card Holder, Gantungan Kunci)',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 18,
                'nama_barang' => 'Gantungan Kunci Mobil Kulit',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 19,
                'nama_barang' => 'Kaos Bright Gas',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 20,
                'nama_barang' => 'Kaos Mypertamina Putih',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 21,
                'nama_barang' => 'Kaos Mypertamina Hitam',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 22,
                'nama_barang' => 'Tas Lipat Bright Gas',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 23,
                'nama_barang' => 'Kitchen Spatula Bright Gas',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 24,
                'nama_barang' => 'Event Desk Bright Gas',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 25,
                'nama_barang' => 'Pouch MyPertamina',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 26,
                'nama_barang' => 'Kanebo',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 27,
                'nama_barang' => 'Tumbler Vacum Set Ekslusif',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 28,
                'nama_barang' => 'Earphone Set Ekslusif',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 29,
                'nama_barang' => 'Kipas Angin Portable',
                'vendor' => '',
                'gambar' => '',
            ],
            [
                'id_barang' => 30,
                'nama_barang' => 'Bucket Hat',
                'vendor' => '',
                'gambar' => '',
            ],
        ];
        DB::table('data_barang')->insert($data);
    }
}
