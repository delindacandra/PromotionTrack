<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkalaKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_skala' => 1,
                'skala_kegiatan' => 'Skala Besar'
            ],
            [
                'id_skala' => 2,
                'skala_kegiatan' => 'Skala Kecil'
            ]
        ];
        DB::table('skala_kegiatan')->insert($data);
    }
}
