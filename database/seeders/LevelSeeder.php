<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_level' => 1,
                'nama_level' => 'Admin',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_level' => 2,
                'nama_level' => 'PIC',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_level' => 3,
                'nama_level' => 'Pemohon',
                'created_at' => now(),
                "updated_at" => now()
            ],
        ];
        DB::table('level')->insert($data);
    }
}
