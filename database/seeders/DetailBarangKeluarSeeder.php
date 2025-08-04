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
                'id_detail_barang_keluar' => 1,
                'id_barang_keluar' => 1,
                'id_barang' => 4,
                'jumlah'  => 100
            ],
            [
                'id_detail_barang_keluar' => 2,
                'id_barang_keluar' => 2,
                'id_barang' => 5,
                'jumlah'  => 100
            ],
            [
                'id_detail_barang_keluar' => 3,
                'id_barang_keluar' => 3,
                'id_barang' => 6,
                'jumlah'  => 100
            ],
            [
                'id_detail_barang_keluar' => 4,
                'id_barang_keluar' => 4,
                'id_barang' => 8,
                'jumlah'  => 100
            ], 
            [
                'id_detail_barang_keluar' => 5,
                'id_barang_keluar' => 5,
                'id_barang' => 30,
                'jumlah'  => 50
            ],
            [
                'id_detail_barang_keluar' => 6,
                'id_barang_keluar' => 5,
                'id_barang' => 29,
                'jumlah'  => 145
            ],
            [
                'id_detail_barang_keluar' => 7,
                'id_barang_keluar' => 5,
                'id_barang' => 2,
                'jumlah'  => 100
            ],
            [
                'id_detail_barang_keluar' => 8,
                'id_barang_keluar' => 5,
                'id_barang' => 53,
                'jumlah'  => 100
            ],
            [
                'id_detail_barang_keluar' => 9,
                'id_barang_keluar' => 5,
                'id_barang' => 52,
                'jumlah'  => 40
            ],
            [
                'id_detail_barang_keluar' => 10,
                'id_barang_keluar' => 6,
                'id_barang' => 14,
                'jumlah'  => 50
            ],
            [
                'id_detail_barang_keluar' => 11,
                'id_barang_keluar' => 6,
                'id_barang' => 19,
                'jumlah'  => 120
            ],
            [
                'id_detail_barang_keluar' => 12,
                'id_barang_keluar' => 6,
                'id_barang' => 40,
                'jumlah'  => 120
            ],
            [
                'id_detail_barang_keluar' => 13,
                'id_barang_keluar' => 7,
                'id_barang' => 33,
                'jumlah'  => 20
            ], 
            [
                'id_detail_barang_keluar' => 14,
                'id_barang_keluar' => 7,
                'id_barang' => 19,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 15,
                'id_barang_keluar' => 7,
                'id_barang' => 21,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 16,
                'id_barang_keluar' => 7,
                'id_barang' => 53,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 17,
                'id_barang_keluar' => 7,
                'id_barang' => 52,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 18,
                'id_barang_keluar' => 8,
                'id_barang' => 50,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 19,
                'id_barang_keluar' => 8,
                'id_barang' => 20,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 20,
                'id_barang_keluar' => 8,
                'id_barang' => 54,
                'jumlah'  => 10
            ], 
            [
                'id_detail_barang_keluar' => 21,
                'id_barang_keluar' => 9,
                'id_barang' => 53,
                'jumlah'  => 20
            ],
            [
                'id_detail_barang_keluar' => 22,
                'id_barang_keluar' => 10,
                'id_barang' => 17,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 23,
                'id_barang_keluar' => 10,
                'id_barang' => 38,
                'jumlah'  => 5
            ], 
            [
                'id_detail_barang_keluar' => 24,
                'id_barang_keluar' => 10,
                'id_barang' => 13,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 25,
                'id_barang_keluar' => 11,
                'id_barang' => 42,
                'jumlah'  => 4
            ],
            [
                'id_detail_barang_keluar' => 26,
                'id_barang_keluar' => 11,
                'id_barang' => 27,
                'jumlah'  => 4
            ],
            [
                'id_detail_barang_keluar' => 27,
                'id_barang_keluar' => 12,
                'id_barang' => 16,
                'jumlah'  => 50
            ],
            [
                'id_detail_barang_keluar' => 28,
                'id_barang_keluar' => 12,
                'id_barang' => 26,
                'jumlah'  => 50
            ], 
            [
                'id_detail_barang_keluar' => 29,
                'id_barang_keluar' => 13,
                'id_barang' => 16,
                'jumlah'  => 50
            ],
            [
                'id_detail_barang_keluar' => 30,
                'id_barang_keluar' => 13,
                'id_barang' => 26,
                'jumlah'  => 50
            ],
            [
                'id_detail_barang_keluar' => 31,
                'id_barang_keluar' => 13,
                'id_barang' => 20,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 32,
                'id_barang_keluar' => 13,
                'id_barang' => 22,
                'jumlah'  => 50
            ], 
            [
                'id_detail_barang_keluar' => 33,
                'id_barang_keluar' => 14,
                'id_barang' => 35,
                'jumlah'  => 4
            ],
            [
                'id_detail_barang_keluar' => 34,
                'id_barang_keluar' => 15,
                'id_barang' => 10,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 35,
                'id_barang_keluar' => 15,
                'id_barang' => 19,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 36,
                'id_barang_keluar' => 15,
                'id_barang' => 52,
                'jumlah'  => 5
            ],  
            [
                'id_detail_barang_keluar' => 37,
                'id_barang_keluar' => 16,
                'id_barang' => 50,
                'jumlah'  => 20
            ],
            [
                'id_detail_barang_keluar' => 38,
                'id_barang_keluar' => 17,
                'id_barang' => 50,
                'jumlah'  => 30
            ],
            [
                'id_detail_barang_keluar' => 39,
                'id_barang_keluar' => 17,
                'id_barang' => 26,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 40,
                'id_barang_keluar' => 17,
                'id_barang' => 21,
                'jumlah'  => 35
            ], 
            [
                'id_detail_barang_keluar' => 41,
                'id_barang_keluar' => 17,
                'id_barang' => 20,
                'jumlah'  => 15
            ],
            [
                'id_detail_barang_keluar' => 42,
                'id_barang_keluar' => 17,
                'id_barang' => 58,
                'jumlah'  => 30
            ],
            [
                'id_detail_barang_keluar' => 43,
                'id_barang_keluar' => 17,
                'id_barang' => 42,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 44,
                'id_barang_keluar' => 17,
                'id_barang' => 52,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 45,
                'id_barang_keluar' => 18,
                'id_barang' => 10,
                'jumlah'  => 15
            ],
            [
                'id_detail_barang_keluar' => 46,
                'id_barang_keluar' => 18,
                'id_barang' => 16,
                'jumlah'  => 20
            ], 
            [
                'id_detail_barang_keluar' => 47,
                'id_barang_keluar' => 18,
                'id_barang' => 26,
                'jumlah'  => 30
            ],
            [
                'id_detail_barang_keluar' => 48,
                'id_barang_keluar' => 18,
                'id_barang' => 20,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 49,
                'id_barang_keluar' => 18,
                'id_barang' => 37,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 50,
                'id_barang_keluar' => 18,
                'id_barang' => 13,
                'jumlah'  => 10
            ], 
            [
                'id_detail_barang_keluar' => 51,
                'id_barang_keluar' => 19,
                'id_barang' => 16,
                'jumlah'  => 30
            ],
            [
                'id_detail_barang_keluar' => 52,
                'id_barang_keluar' => 19,
                'id_barang' => 26,
                'jumlah'  => 20
            ],
            [
                'id_detail_barang_keluar' => 53,
                'id_barang_keluar' => 19,
                'id_barang' => 22,
                'jumlah'  => 50
            ],
            [
                'id_detail_barang_keluar' => 54,
                'id_barang_keluar' => 19,
                'id_barang' => 13,
                'jumlah'  => 10
            ], 
            [
                'id_detail_barang_keluar' => 55,
                'id_barang_keluar' => 20,
                'id_barang' => 7,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 56,
                'id_barang_keluar' => 20,
                'id_barang' => 8,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 57,
                'id_barang_keluar' => 20,
                'id_barang' => 4,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 58,
                'id_barang_keluar' => 20,
                'id_barang' => 5,
                'jumlah'  => 5
            ], 
            [
                'id_detail_barang_keluar' => 59,
                'id_barang_keluar' => 20,
                'id_barang' => 6,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 60,
                'id_barang_keluar' => 21,
                'id_barang' => 17,
                'jumlah'  => 3
            ],
            [
                'id_detail_barang_keluar' => 61,
                'id_barang_keluar' => 22,
                'id_barang' => 8,
                'jumlah'  => 30
            ],
            [
                'id_detail_barang_keluar' => 62,
                'id_barang_keluar' => 22,
                'id_barang' => 4,
                'jumlah'  => 30
            ],
            [
                'id_detail_barang_keluar' => 63,
                'id_barang_keluar' => 22,
                'id_barang' => 34,
                'jumlah'  => 30
            ], 
            [
                'id_detail_barang_keluar' => 64,
                'id_barang_keluar' => 23,
                'id_barang' => 10,
                'jumlah'  => 15
            ], 
            [
                'id_detail_barang_keluar' => 65,
                'id_barang_keluar' => 23,
                'id_barang' => 16,
                'jumlah'  => 50
            ],
            [
                'id_detail_barang_keluar' => 66,
                'id_barang_keluar' => 23,
                'id_barang' => 42,
                'jumlah'  => 50
            ],
            [
                'id_detail_barang_keluar' => 67,
                'id_barang_keluar' => 23,
                'id_barang' => 25,
                'jumlah'  => 15
            ],
            [
                'id_detail_barang_keluar' => 68,
                'id_barang_keluar' => 23,
                'id_barang' => 12,
                'jumlah'  => 50
            ],
            [
                'id_detail_barang_keluar' => 69,
                'id_barang_keluar' => 24,
                'id_barang' => 21,
                'jumlah'  => 15
            ],
            [
                'id_detail_barang_keluar' => 70,
                'id_barang_keluar' => 24,
                'id_barang' => 8,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 71,
                'id_barang_keluar' => 24,
                'id_barang' => 5,
                'jumlah'  => 10
            ], 
            [
                'id_detail_barang_keluar' => 72,
                'id_barang_keluar' => 25,
                'id_barang' => 41,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 73,
                'id_barang_keluar' => 25,
                'id_barang' => 8,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 74,
                'id_barang_keluar' => 25,
                'id_barang' => 34,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 75,
                'id_barang_keluar' => 26,
                'id_barang' => 16,
                'jumlah'  => 100
            ],
            [
                'id_detail_barang_keluar' => 76,
                'id_barang_keluar' => 26,
                'id_barang' => 21,
                'jumlah'  => 20
            ], 
            [
                'id_detail_barang_keluar' => 77,
                'id_barang_keluar' => 26,
                'id_barang' => 20,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 78,
                'id_barang_keluar' => 26,
                'id_barang' => 22,
                'jumlah'  => 50
            ],
            [
                'id_detail_barang_keluar' => 79,
                'id_barang_keluar' => 27,
                'id_barang' => 26,
                'jumlah'  => 20
            ],
            [
                'id_detail_barang_keluar' => 80,
                'id_barang_keluar' => 27,
                'id_barang' => 20,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 81,
                'id_barang_keluar' => 27,
                'id_barang' => 22,
                'jumlah'  => 50
            ], 
            [
                'id_detail_barang_keluar' => 82,
                'id_barang_keluar' => 28,
                'id_barang' => 9,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 83,
                'id_barang_keluar' => 28,
                'id_barang' => 36,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 84,
                'id_barang_keluar' => 28,
                'id_barang' => 27,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 85,
                'id_barang_keluar' => 29,
                'id_barang' => 50,
                'jumlah'  => 100
            ],
            [
                'id_detail_barang_keluar' => 86,
                'id_barang_keluar' => 29,
                'id_barang' => 21,
                'jumlah'  => 20
            ], 
            [
                'id_detail_barang_keluar' => 87,
                'id_barang_keluar' => 29,
                'id_barang' => 20,
                'jumlah'  => 30
            ],
            [
                'id_detail_barang_keluar' => 88,
                'id_barang_keluar' => 29,
                'id_barang' => 38,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 89,
                'id_barang_keluar' => 29,
                'id_barang' => 42,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 90,
                'id_barang_keluar' => 29,
                'id_barang' => 53,
                'jumlah'  => 20
            ],
            [
                'id_detail_barang_keluar' => 91,
                'id_barang_keluar' => 29,
                'id_barang' => 12,
                'jumlah'  => 10
            ], 
            [
                'id_detail_barang_keluar' => 92,
                'id_barang_keluar' => 30,
                'id_barang' => 7,
                'jumlah'  => 70
            ],
            [
                'id_detail_barang_keluar' => 93,
                'id_barang_keluar' => 30,
                'id_barang' => 8,
                'jumlah'  => 150
            ],
            [
                'id_detail_barang_keluar' => 94,
                'id_barang_keluar' => 30,
                'id_barang' => 4,
                'jumlah'  => 200
            ],
            [
                'id_detail_barang_keluar' => 95,
                'id_barang_keluar' => 30,
                'id_barang' => 5,
                'jumlah'  => 150
            ],
            [
                'id_detail_barang_keluar' => 96,
                'id_barang_keluar' => 30,
                'id_barang' => 6,
                'jumlah'  => 200
            ], 
            [
                'id_detail_barang_keluar' => 97,
                'id_barang_keluar' => 31,
                'id_barang' => 36,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 98,
                'id_barang_keluar' => 31,
                'id_barang' => 25,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 99,
                'id_barang_keluar' => 31,
                'id_barang' => 12,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 100,
                'id_barang_keluar' => 32,
                'id_barang' => 20,
                'jumlah'  => 5
            ], 
            [
                'id_detail_barang_keluar' => 101,
                'id_barang_keluar' => 32,
                'id_barang' => 42,
                'jumlah'  => 3
            ],
            [
                'id_detail_barang_keluar' => 102,
                'id_barang_keluar' => 32,
                'id_barang' => 12,
                'jumlah'  => 3
            ],
            [
                'id_detail_barang_keluar' => 103,
                'id_barang_keluar' => 33,
                'id_barang' => 51,
                'jumlah'  => 4
            ],
            [
                'id_detail_barang_keluar' => 104,
                'id_barang_keluar' => 33,
                'id_barang' => 35,
                'jumlah'  => 4
            ],
            [
                'id_detail_barang_keluar' => 105,
                'id_barang_keluar' => 34,
                'id_barang' => 50,
                'jumlah'  => 50
            ],
            [
                'id_detail_barang_keluar' => 106,
                'id_barang_keluar' => 34,
                'id_barang' => 26,
                'jumlah'  => 50
            ],
            [
                'id_detail_barang_keluar' => 107,
                'id_barang_keluar' => 34,
                'id_barang' => 21,
                'jumlah'  => 25
            ],
            [
                'id_detail_barang_keluar' => 108,
                'id_barang_keluar' => 34,
                'id_barang' => 20,
                'jumlah'  => 25
            ], 
            [
                'id_detail_barang_keluar' => 109,
                'id_barang_keluar' => 34,
                'id_barang' => 45,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 110,
                'id_barang_keluar' => 34,
                'id_barang' => 46,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 111,
                'id_barang_keluar' => 34,
                'id_barang' => 53,
                'jumlah'  => 20
            ],
            [
                'id_detail_barang_keluar' => 112,
                'id_barang_keluar' => 34,
                'id_barang' => 52,
                'jumlah'  => 30
            ], 
            [
                'id_detail_barang_keluar' => 113,
                'id_barang_keluar' => 34,
                'id_barang' => 8,
                'jumlah'  => 20
            ],
            [
                'id_detail_barang_keluar' => 114,
                'id_barang_keluar' => 34,
                'id_barang' => 4,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 115,
                'id_barang_keluar' => 34,
                'id_barang' => 5,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 116,
                'id_barang_keluar' => 34,
                'id_barang' => 6,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 117,
                'id_barang_keluar' => 35,
                'id_barang' => 16,
                'jumlah'  => 50
            ],
            [
                'id_detail_barang_keluar' => 118,
                'id_barang_keluar' => 35,
                'id_barang' => 26,
                'jumlah'  => 20
            ],
            [
                'id_detail_barang_keluar' => 119,
                'id_barang_keluar' => 35,
                'id_barang' => 21,
                'jumlah'  => 20
            ],
            [
                'id_detail_barang_keluar' => 120,
                'id_barang_keluar' => 35,
                'id_barang' => 20,
                'jumlah'  => 20
            ],
            [
                'id_detail_barang_keluar' => 121,
                'id_barang_keluar' => 35,
                'id_barang' => 38,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 122,
                'id_barang_keluar' => 35,
                'id_barang' => 42,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 123,
                'id_barang_keluar' => 35,
                'id_barang' => 44,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 124,
                'id_barang_keluar' => 35,
                'id_barang' => 13,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 125,
                'id_barang_keluar' => 35,
                'id_barang' => 12,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 126,
                'id_barang_keluar' => 35,
                'id_barang' => 8,
                'jumlah'  => 20
            ],
            [
                'id_detail_barang_keluar' => 127,
                'id_barang_keluar' => 35,
                'id_barang' => 4,
                'jumlah'  => 50
            ],
            [
                'id_detail_barang_keluar' => 128,
                'id_barang_keluar' => 35,
                'id_barang' => 5,
                'jumlah'  => 20
            ],
            [
                'id_detail_barang_keluar' => 129,
                'id_barang_keluar' => 35,
                'id_barang' => 6,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 130,
                'id_barang_keluar' => 36,
                'id_barang' => 50,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 131,
                'id_barang_keluar' => 36,
                'id_barang' => 26,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 132,
                'id_barang_keluar' => 36,
                'id_barang' => 21,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 133,
                'id_barang_keluar' => 36,
                'id_barang' => 13,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 134,
                'id_barang_keluar' => 37,
                'id_barang' => 9,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 135,
                'id_barang_keluar' => 37,
                'id_barang' => 21,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 136,
                'id_barang_keluar' => 37,
                'id_barang' => 20,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 137,
                'id_barang_keluar' => 37,
                'id_barang' => 51,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 138,
                'id_barang_keluar' => 37,
                'id_barang' => 13,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 139,
                'id_barang_keluar' => 38,
                'id_barang' => 56,
                'jumlah'  => 15
            ],
            [
                'id_detail_barang_keluar' => 140,
                'id_barang_keluar' => 39,
                'id_barang' => 14,
                'jumlah'  => 20
            ],
            [
                'id_detail_barang_keluar' => 141,
                'id_barang_keluar' => 39,
                'id_barang' => 10,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 142,
                'id_barang_keluar' => 39,
                'id_barang' => 16,
                'jumlah'  => 50
            ],
            [
                'id_detail_barang_keluar' => 143,
                'id_barang_keluar' => 39,
                'id_barang' => 50,
                'jumlah'  => 52
            ],
            [
                'id_detail_barang_keluar' => 144,
                'id_barang_keluar' => 39,
                'id_barang' => 26,
                'jumlah'  => 20
            ],
            [
                'id_detail_barang_keluar' => 145,
                'id_barang_keluar' => 39,
                'id_barang' => 21,
                'jumlah'  => 20
            ],
            [
                'id_detail_barang_keluar' => 146,
                'id_barang_keluar' => 39,
                'id_barang' => 20,
                'jumlah'  => 20
            ],
            [
                'id_detail_barang_keluar' => 147,
                'id_barang_keluar' => 39,
                'id_barang' => 37,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 148,
                'id_barang_keluar' => 39,
                'id_barang' => 12,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 149,
                'id_barang_keluar' => 40,
                'id_barang' => 46,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 150,
                'id_barang_keluar' => 40,
                'id_barang' => 44,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 151,
                'id_barang_keluar' => 40,
                'id_barang' => 53,
                'jumlah'  => 20
            ],
            [
                'id_detail_barang_keluar' => 152,
                'id_barang_keluar' => 40,
                'id_barang' => 52,
                'jumlah'  => 20
            ],
            [
                'id_detail_barang_keluar' => 153,
                'id_barang_keluar' => 41,
                'id_barang' => 14,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 154,
                'id_barang_keluar' => 41,
                'id_barang' => 32,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 155,
                'id_barang_keluar' => 41,
                'id_barang' => 19,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 156,
                'id_barang_keluar' => 41,
                'id_barang' => 37,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 157,
                'id_barang_keluar' => 41,
                'id_barang' => 22,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 158,
                'id_barang_keluar' => 42,
                'id_barang' => 9,
                'jumlah'  => 70
            ],
            [
                'id_detail_barang_keluar' => 159,
                'id_barang_keluar' => 42,
                'id_barang' => 48,
                'jumlah'  => 70
            ],
            [
                'id_detail_barang_keluar' => 160,
                'id_barang_keluar' => 42,
                'id_barang' => 36,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 161,
                'id_barang_keluar' => 42,
                'id_barang' => 44,
                'jumlah'  => 70
            ],
            [
                'id_detail_barang_keluar' => 162,
                'id_barang_keluar' => 42,
                'id_barang' => 60,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 163,
                'id_barang_keluar' => 43,
                'id_barang' => 51,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 164,
                'id_barang_keluar' => 43,
                'id_barang' => 35,
                'jumlah'  => 1
            ],
            [
                'id_detail_barang_keluar' => 165,
                'id_barang_keluar' => 43,
                'id_barang' => 25,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 166,
                'id_barang_keluar' => 43,
                'id_barang' => 12,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 167,
                'id_barang_keluar' => 44,
                'id_barang' => 50,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 168,
                'id_barang_keluar' => 44,
                'id_barang' => 26,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 169,
                'id_barang_keluar' => 44,
                'id_barang' => 58,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 170,
                'id_barang_keluar' => 44,
                'id_barang' => 53,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 171,
                'id_barang_keluar' => 45,
                'id_barang' => 16,
                'jumlah'  => 50
            ],
            [
                'id_detail_barang_keluar' => 172,
                'id_barang_keluar' => 45,
                'id_barang' => 26,
                'jumlah'  => 50
            ],
            [
                'id_detail_barang_keluar' => 173,
                'id_barang_keluar' => 45,
                'id_barang' => 19,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 174,
                'id_barang_keluar' => 45,
                'id_barang' => 21,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 175,
                'id_barang_keluar' => 45,
                'id_barang' => 43,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 176,
                'id_barang_keluar' => 45,
                'id_barang' => 22,
                'jumlah'  => 50
            ], 
            [
                'id_detail_barang_keluar' => 177,
                'id_barang_keluar' => 46,
                'id_barang' => 9,
                'jumlah'  => 12
            ],
            [
                'id_detail_barang_keluar' => 178,
                'id_barang_keluar' => 46,
                'id_barang' => 33,
                'jumlah'  => 12
            ],
            [
                'id_detail_barang_keluar' => 179,
                'id_barang_keluar' => 46,
                'id_barang' => 26,
                'jumlah'  => 12
            ],
            [
                'id_detail_barang_keluar' => 180,
                'id_barang_keluar' => 46,
                'id_barang' => 43,
                'jumlah'  => 12
            ],
            [
                'id_detail_barang_keluar' => 181,
                'id_barang_keluar' => 46,
                'id_barang' => 22,
                'jumlah'  => 12
            ],
            [
                'id_detail_barang_keluar' => 182,
                'id_barang_keluar' => 46,
                'id_barang' => 52,
                'jumlah'  => 12
            ], 
            [
                'id_detail_barang_keluar' => 183,
                'id_barang_keluar' => 47,
                'id_barang' => 9,
                'jumlah'  => 8
            ],
            [
                'id_detail_barang_keluar' => 184,
                'id_barang_keluar' => 47,
                'id_barang' => 48,
                'jumlah'  => 8
            ],
            [
                'id_detail_barang_keluar' => 185,
                'id_barang_keluar' => 47,
                'id_barang' => 51,
                'jumlah'  => 8
            ],
            [
                'id_detail_barang_keluar' => 186,
                'id_barang_keluar' => 47,
                'id_barang' => 44,
                'jumlah'  => 8
            ],
            [
                'id_detail_barang_keluar' => 187,
                'id_barang_keluar' => 47,
                'id_barang' => 25,
                'jumlah'  => 8
            ],
            [
                'id_detail_barang_keluar' => 188,
                'id_barang_keluar' => 47,
                'id_barang' => 61,
                'jumlah'  => 8
            ],
            [
                'id_detail_barang_keluar' => 189,
                'id_barang_keluar' => 48,
                'id_barang' => 19,
                'jumlah'  => 20
            ],
            [
                'id_detail_barang_keluar' => 190,
                'id_barang_keluar' => 48,
                'id_barang' => 21,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 191,
                'id_barang_keluar' => 48,
                'id_barang' => 20,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 192,
                'id_barang_keluar' => 48,
                'id_barang' => 59,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 193,
                'id_barang_keluar' => 48,
                'id_barang' => 42,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 194,
                'id_barang_keluar' => 48,
                'id_barang' => 35,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 195,
                'id_barang_keluar' => 48,
                'id_barang' => 25,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 196,
                'id_barang_keluar' => 48,
                'id_barang' => 52,
                'jumlah'  => 20
            ],
            [
                'id_detail_barang_keluar' => 197,
                'id_barang_keluar' => 48,
                'id_barang' => 60,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 198,
                'id_barang_keluar' => 48,
                'id_barang' => 12,
                'jumlah'  => 5
            ],
            [
                'id_detail_barang_keluar' => 199,
                'id_barang_keluar' => 49,
                'id_barang' => 62,
                'jumlah'  => 15
            ],
            [
                'id_detail_barang_keluar' => 200,
                'id_barang_keluar' => 49,
                'id_barang' => 7,
                'jumlah'  => 10
            ],
            [
                'id_detail_barang_keluar' => 201,
                'id_barang_keluar' => 49,
                'id_barang' => 8,
                'jumlah'  => 15
            ],
            [
                'id_detail_barang_keluar' => 202,
                'id_barang_keluar' => 49,
                'id_barang' => 4,
                'jumlah'  => 15
            ],
            [
                'id_detail_barang_keluar' => 203,
                'id_barang_keluar' => 49,
                'id_barang' => 5,
                'jumlah'  => 15
            ],
            [
                'id_detail_barang_keluar' => 204,
                'id_barang_keluar' => 49,
                'id_barang' => 6,
                'jumlah'  => 10
            ]
        ];
        DB::table('detail_barang_keluar')->insert($data);
    }
}
