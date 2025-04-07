<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_sa' => 1,
                'nama_sa' => 'SA Surabaya',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_sa' => 2,
                'nama_sa' => 'SA Malang',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_sa' => 3,
                'nama_sa' => 'SA Kediri',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_sa' => 4,
                'nama_sa' => 'SA Bali',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_sa' => 5,
                'nama_sa' => 'SA NTB',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_sa' => 6,
                'nama_sa' => 'SA NTT',
                'created_at' => now(),
                "updated_at" => now()
            ],
        ];
        DB::table('sales_area')->insert($data);
    }
}
