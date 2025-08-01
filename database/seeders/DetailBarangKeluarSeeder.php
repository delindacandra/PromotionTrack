<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailBarangKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_detailBarangKeluar' => 1,
                'id_barangKeluar' => 1,
                'id_barang' => 4,
                'jumlah'  => 100
            ],
            [
                'id_detailBarangKeluar' => 2,
                'id_barangKeluar' => 2,
                'id_barang' => 5,
                'jumlah'  => 100
            ],
            [
                'id_detailBarangKeluar' => 3,
                'id_barangKeluar' => 3,
                'id_barang' => 6,
                'jumlah'  => 100
            ],
            [
                'id_detailBarangKeluar' => 4,
                'id_barangKeluar' => 4,
                'id_barang' => 8,
                'jumlah'  => 100
            ], 
            [
                'id_detailBarangKeluar' => 5,
                'id_barangKeluar' => 5,
                'id_barang' => 30,
                'jumlah'  => 50
            ],
            [
                'id_detailBarangKeluar' => 6,
                'id_barangKeluar' => 5,
                'id_barang' => 29,
                'jumlah'  => 145
            ],
            [
                'id_detailBarangKeluar' => 7,
                'id_barangKeluar' => 5,
                'id_barang' => 2,
                'jumlah'  => 100
            ],
            [
                'id_detailBarangKeluar' => 8,
                'id_barangKeluar' => 5,
                'id_barang' => 53,
                'jumlah'  => 100
            ],
            [
                'id_detailBarangKeluar' => 9,
                'id_barangKeluar' => 5,
                'id_barang' => 52,
                'jumlah'  => 40
            ],
            [
                'id_detailBarangKeluar' => 10,
                'id_barangKeluar' => 6,
                'id_barang' => 14,
                'jumlah'  => 50
            ],
            [
                'id_detailBarangKeluar' => 11,
                'id_barangKeluar' => 6,
                'id_barang' => 19,
                'jumlah'  => 120
            ],
            [
                'id_detailBarangKeluar' => 12,
                'id_barangKeluar' => 6,
                'id_barang' => 40,
                'jumlah'  => 120
            ],
            [
                'id_detailBarangKeluar' => 13,
                'id_barangKeluar' => 7,
                'id_barang' => 33,
                'jumlah'  => 20
            ], 
            [
                'id_detailBarangKeluar' => 14,
                'id_barangKeluar' => 7,
                'id_barang' => 19,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 15,
                'id_barangKeluar' => 7,
                'id_barang' => 21,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 16,
                'id_barangKeluar' => 7,
                'id_barang' => 53,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 17,
                'id_barangKeluar' => 7,
                'id_barang' => 52,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 18,
                'id_barangKeluar' => 8,
                'id_barang' => 50,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 19,
                'id_barangKeluar' => 8,
                'id_barang' => 20,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 20,
                'id_barangKeluar' => 8,
                'id_barang' => 54,
                'jumlah'  => 10
            ], 
            [
                'id_detailBarangKeluar' => 21,
                'id_barangKeluar' => 9,
                'id_barang' => 53,
                'jumlah'  => 20
            ],
            [
                'id_detailBarangKeluar' => 22,
                'id_barangKeluar' => 10,
                'id_barang' => 17,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 23,
                'id_barangKeluar' => 10,
                'id_barang' => 38,
                'jumlah'  => 5
            ], 
            [
                'id_detailBarangKeluar' => 24,
                'id_barangKeluar' => 10,
                'id_barang' => 13,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 25,
                'id_barangKeluar' => 11,
                'id_barang' => 42,
                'jumlah'  => 4
            ],
            [
                'id_detailBarangKeluar' => 26,
                'id_barangKeluar' => 11,
                'id_barang' => 27,
                'jumlah'  => 4
            ],
            [
                'id_detailBarangKeluar' => 27,
                'id_barangKeluar' => 12,
                'id_barang' => 16,
                'jumlah'  => 50
            ],
            [
                'id_detailBarangKeluar' => 28,
                'id_barangKeluar' => 12,
                'id_barang' => 26,
                'jumlah'  => 50
            ], 
            [
                'id_detailBarangKeluar' => 29,
                'id_barangKeluar' => 13,
                'id_barang' => 16,
                'jumlah'  => 50
            ],
            [
                'id_detailBarangKeluar' => 30,
                'id_barangKeluar' => 13,
                'id_barang' => 26,
                'jumlah'  => 50
            ],
            [
                'id_detailBarangKeluar' => 31,
                'id_barangKeluar' => 13,
                'id_barang' => 20,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 32,
                'id_barangKeluar' => 13,
                'id_barang' => 22,
                'jumlah'  => 50
            ], 
            [
                'id_detailBarangKeluar' => 33,
                'id_barangKeluar' => 14,
                'id_barang' => 35,
                'jumlah'  => 4
            ],
            [
                'id_detailBarangKeluar' => 34,
                'id_barangKeluar' => 15,
                'id_barang' => 10,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 35,
                'id_barangKeluar' => 15,
                'id_barang' => 19,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 36,
                'id_barangKeluar' => 15,
                'id_barang' => 52,
                'jumlah'  => 5
            ],  
            [
                'id_detailBarangKeluar' => 37,
                'id_barangKeluar' => 16,
                'id_barang' => 50,
                'jumlah'  => 20
            ],
            [
                'id_detailBarangKeluar' => 38,
                'id_barangKeluar' => 17,
                'id_barang' => 50,
                'jumlah'  => 30
            ],
            [
                'id_detailBarangKeluar' => 39,
                'id_barangKeluar' => 17,
                'id_barang' => 26,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 40,
                'id_barangKeluar' => 17,
                'id_barang' => 21,
                'jumlah'  => 35
            ], 
            [
                'id_detailBarangKeluar' => 41,
                'id_barangKeluar' => 17,
                'id_barang' => 20,
                'jumlah'  => 15
            ],
            [
                'id_detailBarangKeluar' => 42,
                'id_barangKeluar' => 17,
                'id_barang' => 58,
                'jumlah'  => 30
            ],
            [
                'id_detailBarangKeluar' => 43,
                'id_barangKeluar' => 17,
                'id_barang' => 42,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 44,
                'id_barangKeluar' => 17,
                'id_barang' => 52,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 45,
                'id_barangKeluar' => 18,
                'id_barang' => 10,
                'jumlah'  => 15
            ],
            [
                'id_detailBarangKeluar' => 46,
                'id_barangKeluar' => 18,
                'id_barang' => 16,
                'jumlah'  => 20
            ], 
            [
                'id_detailBarangKeluar' => 47,
                'id_barangKeluar' => 18,
                'id_barang' => 26,
                'jumlah'  => 30
            ],
            [
                'id_detailBarangKeluar' => 48,
                'id_barangKeluar' => 18,
                'id_barang' => 20,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 49,
                'id_barangKeluar' => 18,
                'id_barang' => 37,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 50,
                'id_barangKeluar' => 18,
                'id_barang' => 13,
                'jumlah'  => 10
            ], 
            [
                'id_detailBarangKeluar' => 51,
                'id_barangKeluar' => 19,
                'id_barang' => 16,
                'jumlah'  => 30
            ],
            [
                'id_detailBarangKeluar' => 52,
                'id_barangKeluar' => 19,
                'id_barang' => 26,
                'jumlah'  => 20
            ],
            [
                'id_detailBarangKeluar' => 53,
                'id_barangKeluar' => 19,
                'id_barang' => 22,
                'jumlah'  => 50
            ],
            [
                'id_detailBarangKeluar' => 54,
                'id_barangKeluar' => 19,
                'id_barang' => 13,
                'jumlah'  => 10
            ], 
            [
                'id_detailBarangKeluar' => 55,
                'id_barangKeluar' => 20,
                'id_barang' => 7,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 56,
                'id_barangKeluar' => 20,
                'id_barang' => 8,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 57,
                'id_barangKeluar' => 20,
                'id_barang' => 4,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 58,
                'id_barangKeluar' => 20,
                'id_barang' => 5,
                'jumlah'  => 5
            ], 
            [
                'id_detailBarangKeluar' => 59,
                'id_barangKeluar' => 20,
                'id_barang' => 6,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 60,
                'id_barangKeluar' => 21,
                'id_barang' => 17,
                'jumlah'  => 3
            ],
            [
                'id_detailBarangKeluar' => 61,
                'id_barangKeluar' => 22,
                'id_barang' => 8,
                'jumlah'  => 30
            ],
            [
                'id_detailBarangKeluar' => 62,
                'id_barangKeluar' => 22,
                'id_barang' => 4,
                'jumlah'  => 30
            ],
            [
                'id_detailBarangKeluar' => 63,
                'id_barangKeluar' => 22,
                'id_barang' => 34,
                'jumlah'  => 30
            ], 
            [
                'id_detailBarangKeluar' => 64,
                'id_barangKeluar' => 23,
                'id_barang' => 10,
                'jumlah'  => 15
            ], 
            [
                'id_detailBarangKeluar' => 65,
                'id_barangKeluar' => 23,
                'id_barang' => 16,
                'jumlah'  => 50
            ],
            [
                'id_detailBarangKeluar' => 66,
                'id_barangKeluar' => 23,
                'id_barang' => 42,
                'jumlah'  => 50
            ],
            [
                'id_detailBarangKeluar' => 67,
                'id_barangKeluar' => 23,
                'id_barang' => 25,
                'jumlah'  => 15
            ],
            [
                'id_detailBarangKeluar' => 68,
                'id_barangKeluar' => 23,
                'id_barang' => 12,
                'jumlah'  => 50
            ],
            [
                'id_detailBarangKeluar' => 69,
                'id_barangKeluar' => 24,
                'id_barang' => 21,
                'jumlah'  => 15
            ],
            [
                'id_detailBarangKeluar' => 70,
                'id_barangKeluar' => 24,
                'id_barang' => 8,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 71,
                'id_barangKeluar' => 24,
                'id_barang' => 5,
                'jumlah'  => 10
            ], 
            [
                'id_detailBarangKeluar' => 72,
                'id_barangKeluar' => 25,
                'id_barang' => 41,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 73,
                'id_barangKeluar' => 25,
                'id_barang' => 8,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 74,
                'id_barangKeluar' => 25,
                'id_barang' => 34,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 75,
                'id_barangKeluar' => 26,
                'id_barang' => 16,
                'jumlah'  => 100
            ],
            [
                'id_detailBarangKeluar' => 76,
                'id_barangKeluar' => 26,
                'id_barang' => 21,
                'jumlah'  => 20
            ], 
            [
                'id_detailBarangKeluar' => 77,
                'id_barangKeluar' => 26,
                'id_barang' => 20,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 78,
                'id_barangKeluar' => 26,
                'id_barang' => 22,
                'jumlah'  => 50
            ],
            [
                'id_detailBarangKeluar' => 79,
                'id_barangKeluar' => 27,
                'id_barang' => 26,
                'jumlah'  => 20
            ],
            [
                'id_detailBarangKeluar' => 80,
                'id_barangKeluar' => 27,
                'id_barang' => 20,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 81,
                'id_barangKeluar' => 27,
                'id_barang' => 22,
                'jumlah'  => 50
            ], 
            [
                'id_detailBarangKeluar' => 82,
                'id_barangKeluar' => 28,
                'id_barang' => 9,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 83,
                'id_barangKeluar' => 28,
                'id_barang' => 36,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 84,
                'id_barangKeluar' => 28,
                'id_barang' => 27,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 85,
                'id_barangKeluar' => 29,
                'id_barang' => 50,
                'jumlah'  => 100
            ],
            [
                'id_detailBarangKeluar' => 86,
                'id_barangKeluar' => 29,
                'id_barang' => 21,
                'jumlah'  => 20
            ], 
            [
                'id_detailBarangKeluar' => 87,
                'id_barangKeluar' => 29,
                'id_barang' => 20,
                'jumlah'  => 30
            ],
            [
                'id_detailBarangKeluar' => 88,
                'id_barangKeluar' => 29,
                'id_barang' => 38,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 89,
                'id_barangKeluar' => 29,
                'id_barang' => 42,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 90,
                'id_barangKeluar' => 29,
                'id_barang' => 53,
                'jumlah'  => 20
            ],
            [
                'id_detailBarangKeluar' => 91,
                'id_barangKeluar' => 29,
                'id_barang' => 12,
                'jumlah'  => 10
            ], 
            [
                'id_detailBarangKeluar' => 92,
                'id_barangKeluar' => 30,
                'id_barang' => 7,
                'jumlah'  => 70
            ],
            [
                'id_detailBarangKeluar' => 93,
                'id_barangKeluar' => 30,
                'id_barang' => 8,
                'jumlah'  => 150
            ],
            [
                'id_detailBarangKeluar' => 94,
                'id_barangKeluar' => 30,
                'id_barang' => 4,
                'jumlah'  => 200
            ],
            [
                'id_detailBarangKeluar' => 95,
                'id_barangKeluar' => 30,
                'id_barang' => 5,
                'jumlah'  => 150
            ],
            [
                'id_detailBarangKeluar' => 96,
                'id_barangKeluar' => 30,
                'id_barang' => 6,
                'jumlah'  => 200
            ], 
            [
                'id_detailBarangKeluar' => 97,
                'id_barangKeluar' => 31,
                'id_barang' => 36,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 98,
                'id_barangKeluar' => 31,
                'id_barang' => 25,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 99,
                'id_barangKeluar' => 31,
                'id_barang' => 12,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 100,
                'id_barangKeluar' => 32,
                'id_barang' => 20,
                'jumlah'  => 5
            ], 
            [
                'id_detailBarangKeluar' => 101,
                'id_barangKeluar' => 32,
                'id_barang' => 42,
                'jumlah'  => 3
            ],
            [
                'id_detailBarangKeluar' => 102,
                'id_barangKeluar' => 32,
                'id_barang' => 12,
                'jumlah'  => 3
            ],
            [
                'id_detailBarangKeluar' => 103,
                'id_barangKeluar' => 33,
                'id_barang' => 51,
                'jumlah'  => 4
            ],
            [
                'id_detailBarangKeluar' => 104,
                'id_barangKeluar' => 33,
                'id_barang' => 35,
                'jumlah'  => 4
            ],
            [
                'id_detailBarangKeluar' => 105,
                'id_barangKeluar' => 34,
                'id_barang' => 50,
                'jumlah'  => 50
            ],
            [
                'id_detailBarangKeluar' => 106,
                'id_barangKeluar' => 34,
                'id_barang' => 26,
                'jumlah'  => 50
            ],
            [
                'id_detailBarangKeluar' => 107,
                'id_barangKeluar' => 34,
                'id_barang' => 21,
                'jumlah'  => 25
            ],
            [
                'id_detailBarangKeluar' => 108,
                'id_barangKeluar' => 34,
                'id_barang' => 20,
                'jumlah'  => 25
            ], 
            [
                'id_detailBarangKeluar' => 109,
                'id_barangKeluar' => 34,
                'id_barang' => 45,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 110,
                'id_barangKeluar' => 34,
                'id_barang' => 46,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 111,
                'id_barangKeluar' => 34,
                'id_barang' => 53,
                'jumlah'  => 20
            ],
            [
                'id_detailBarangKeluar' => 112,
                'id_barangKeluar' => 34,
                'id_barang' => 52,
                'jumlah'  => 30
            ], 
            [
                'id_detailBarangKeluar' => 113,
                'id_barangKeluar' => 34,
                'id_barang' => 8,
                'jumlah'  => 20
            ],
            [
                'id_detailBarangKeluar' => 114,
                'id_barangKeluar' => 34,
                'id_barang' => 4,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 115,
                'id_barangKeluar' => 34,
                'id_barang' => 5,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 116,
                'id_barangKeluar' => 34,
                'id_barang' => 6,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 117,
                'id_barangKeluar' => 35,
                'id_barang' => 16,
                'jumlah'  => 50
            ],
            [
                'id_detailBarangKeluar' => 118,
                'id_barangKeluar' => 35,
                'id_barang' => 26,
                'jumlah'  => 20
            ],
            [
                'id_detailBarangKeluar' => 119,
                'id_barangKeluar' => 35,
                'id_barang' => 21,
                'jumlah'  => 20
            ],
            [
                'id_detailBarangKeluar' => 120,
                'id_barangKeluar' => 35,
                'id_barang' => 20,
                'jumlah'  => 20
            ],
            [
                'id_detailBarangKeluar' => 121,
                'id_barangKeluar' => 35,
                'id_barang' => 38,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 122,
                'id_barangKeluar' => 35,
                'id_barang' => 42,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 123,
                'id_barangKeluar' => 35,
                'id_barang' => 44,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 124,
                'id_barangKeluar' => 35,
                'id_barang' => 13,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 125,
                'id_barangKeluar' => 35,
                'id_barang' => 12,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 126,
                'id_barangKeluar' => 35,
                'id_barang' => 8,
                'jumlah'  => 20
            ],
            [
                'id_detailBarangKeluar' => 127,
                'id_barangKeluar' => 35,
                'id_barang' => 4,
                'jumlah'  => 50
            ],
            [
                'id_detailBarangKeluar' => 128,
                'id_barangKeluar' => 35,
                'id_barang' => 5,
                'jumlah'  => 20
            ],
            [
                'id_detailBarangKeluar' => 129,
                'id_barangKeluar' => 35,
                'id_barang' => 6,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 130,
                'id_barangKeluar' => 36,
                'id_barang' => 50,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 131,
                'id_barangKeluar' => 36,
                'id_barang' => 26,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 132,
                'id_barangKeluar' => 36,
                'id_barang' => 21,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 133,
                'id_barangKeluar' => 36,
                'id_barang' => 13,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 134,
                'id_barangKeluar' => 37,
                'id_barang' => 9,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 135,
                'id_barangKeluar' => 37,
                'id_barang' => 21,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 136,
                'id_barangKeluar' => 37,
                'id_barang' => 20,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 137,
                'id_barangKeluar' => 37,
                'id_barang' => 51,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 138,
                'id_barangKeluar' => 37,
                'id_barang' => 13,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 139,
                'id_barangKeluar' => 38,
                'id_barang' => 56,
                'jumlah'  => 15
            ],
            [
                'id_detailBarangKeluar' => 140,
                'id_barangKeluar' => 39,
                'id_barang' => 14,
                'jumlah'  => 20
            ],
            [
                'id_detailBarangKeluar' => 141,
                'id_barangKeluar' => 39,
                'id_barang' => 10,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 142,
                'id_barangKeluar' => 39,
                'id_barang' => 16,
                'jumlah'  => 50
            ],
            [
                'id_detailBarangKeluar' => 143,
                'id_barangKeluar' => 39,
                'id_barang' => 50,
                'jumlah'  => 52
            ],
            [
                'id_detailBarangKeluar' => 144,
                'id_barangKeluar' => 39,
                'id_barang' => 26,
                'jumlah'  => 20
            ],
            [
                'id_detailBarangKeluar' => 145,
                'id_barangKeluar' => 39,
                'id_barang' => 21,
                'jumlah'  => 20
            ],
            [
                'id_detailBarangKeluar' => 146,
                'id_barangKeluar' => 39,
                'id_barang' => 20,
                'jumlah'  => 20
            ],
            [
                'id_detailBarangKeluar' => 147,
                'id_barangKeluar' => 39,
                'id_barang' => 37,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 148,
                'id_barangKeluar' => 39,
                'id_barang' => 12,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 149,
                'id_barangKeluar' => 40,
                'id_barang' => 46,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 150,
                'id_barangKeluar' => 40,
                'id_barang' => 44,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 151,
                'id_barangKeluar' => 40,
                'id_barang' => 53,
                'jumlah'  => 20
            ],
            [
                'id_detailBarangKeluar' => 152,
                'id_barangKeluar' => 40,
                'id_barang' => 52,
                'jumlah'  => 20
            ],
            [
                'id_detailBarangKeluar' => 153,
                'id_barangKeluar' => 41,
                'id_barang' => 14,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 154,
                'id_barangKeluar' => 41,
                'id_barang' => 32,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 155,
                'id_barangKeluar' => 41,
                'id_barang' => 19,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 156,
                'id_barangKeluar' => 41,
                'id_barang' => 37,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 157,
                'id_barangKeluar' => 41,
                'id_barang' => 22,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 158,
                'id_barangKeluar' => 42,
                'id_barang' => 9,
                'jumlah'  => 70
            ],
            [
                'id_detailBarangKeluar' => 159,
                'id_barangKeluar' => 42,
                'id_barang' => 48,
                'jumlah'  => 70
            ],
            [
                'id_detailBarangKeluar' => 160,
                'id_barangKeluar' => 42,
                'id_barang' => 36,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 161,
                'id_barangKeluar' => 42,
                'id_barang' => 44,
                'jumlah'  => 70
            ],
            [
                'id_detailBarangKeluar' => 162,
                'id_barangKeluar' => 42,
                'id_barang' => 60,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 163,
                'id_barangKeluar' => 43,
                'id_barang' => 51,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 164,
                'id_barangKeluar' => 43,
                'id_barang' => 35,
                'jumlah'  => 1
            ],
            [
                'id_detailBarangKeluar' => 165,
                'id_barangKeluar' => 43,
                'id_barang' => 25,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 166,
                'id_barangKeluar' => 43,
                'id_barang' => 12,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 167,
                'id_barangKeluar' => 44,
                'id_barang' => 50,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 168,
                'id_barangKeluar' => 44,
                'id_barang' => 26,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 169,
                'id_barangKeluar' => 44,
                'id_barang' => 58,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 170,
                'id_barangKeluar' => 44,
                'id_barang' => 53,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 171,
                'id_barangKeluar' => 45,
                'id_barang' => 16,
                'jumlah'  => 50
            ],
            [
                'id_detailBarangKeluar' => 172,
                'id_barangKeluar' => 45,
                'id_barang' => 26,
                'jumlah'  => 50
            ],
            [
                'id_detailBarangKeluar' => 173,
                'id_barangKeluar' => 45,
                'id_barang' => 19,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 174,
                'id_barangKeluar' => 45,
                'id_barang' => 21,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 175,
                'id_barangKeluar' => 45,
                'id_barang' => 43,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 176,
                'id_barangKeluar' => 45,
                'id_barang' => 22,
                'jumlah'  => 50
            ], 
            [
                'id_detailBarangKeluar' => 177,
                'id_barangKeluar' => 46,
                'id_barang' => 9,
                'jumlah'  => 12
            ],
            [
                'id_detailBarangKeluar' => 178,
                'id_barangKeluar' => 46,
                'id_barang' => 33,
                'jumlah'  => 12
            ],
            [
                'id_detailBarangKeluar' => 179,
                'id_barangKeluar' => 46,
                'id_barang' => 26,
                'jumlah'  => 12
            ],
            [
                'id_detailBarangKeluar' => 180,
                'id_barangKeluar' => 46,
                'id_barang' => 43,
                'jumlah'  => 12
            ],
            [
                'id_detailBarangKeluar' => 181,
                'id_barangKeluar' => 46,
                'id_barang' => 22,
                'jumlah'  => 12
            ],
            [
                'id_detailBarangKeluar' => 182,
                'id_barangKeluar' => 46,
                'id_barang' => 52,
                'jumlah'  => 12
            ], 
            [
                'id_detailBarangKeluar' => 183,
                'id_barangKeluar' => 47,
                'id_barang' => 9,
                'jumlah'  => 8
            ],
            [
                'id_detailBarangKeluar' => 184,
                'id_barangKeluar' => 47,
                'id_barang' => 48,
                'jumlah'  => 8
            ],
            [
                'id_detailBarangKeluar' => 185,
                'id_barangKeluar' => 47,
                'id_barang' => 51,
                'jumlah'  => 8
            ],
            [
                'id_detailBarangKeluar' => 186,
                'id_barangKeluar' => 47,
                'id_barang' => 44,
                'jumlah'  => 8
            ],
            [
                'id_detailBarangKeluar' => 187,
                'id_barangKeluar' => 47,
                'id_barang' => 25,
                'jumlah'  => 8
            ],
            [
                'id_detailBarangKeluar' => 188,
                'id_barangKeluar' => 47,
                'id_barang' => 61,
                'jumlah'  => 8
            ],
            [
                'id_detailBarangKeluar' => 189,
                'id_barangKeluar' => 48,
                'id_barang' => 19,
                'jumlah'  => 20
            ],
            [
                'id_detailBarangKeluar' => 190,
                'id_barangKeluar' => 48,
                'id_barang' => 21,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 191,
                'id_barangKeluar' => 48,
                'id_barang' => 20,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 192,
                'id_barangKeluar' => 48,
                'id_barang' => 59,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 193,
                'id_barangKeluar' => 48,
                'id_barang' => 42,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 194,
                'id_barangKeluar' => 48,
                'id_barang' => 35,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 195,
                'id_barangKeluar' => 48,
                'id_barang' => 25,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 196,
                'id_barangKeluar' => 48,
                'id_barang' => 52,
                'jumlah'  => 20
            ],
            [
                'id_detailBarangKeluar' => 197,
                'id_barangKeluar' => 48,
                'id_barang' => 60,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 198,
                'id_barangKeluar' => 48,
                'id_barang' => 12,
                'jumlah'  => 5
            ],
            [
                'id_detailBarangKeluar' => 199,
                'id_barangKeluar' => 49,
                'id_barang' => 62,
                'jumlah'  => 15
            ],
            [
                'id_detailBarangKeluar' => 200,
                'id_barangKeluar' => 49,
                'id_barang' => 7,
                'jumlah'  => 10
            ],
            [
                'id_detailBarangKeluar' => 201,
                'id_barangKeluar' => 49,
                'id_barang' => 8,
                'jumlah'  => 15
            ],
            [
                'id_detailBarangKeluar' => 202,
                'id_barangKeluar' => 49,
                'id_barang' => 4,
                'jumlah'  => 15
            ],
            [
                'id_detailBarangKeluar' => 203,
                'id_barangKeluar' => 49,
                'id_barang' => 5,
                'jumlah'  => 15
            ],
            [
                'id_detailBarangKeluar' => 204,
                'id_barangKeluar' => 49,
                'id_barang' => 6,
                'jumlah'  => 10
            ]
        ];
        DB::table('detail_barangKeluar')->insert($data);
    }
}
