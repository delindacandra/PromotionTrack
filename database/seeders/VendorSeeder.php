<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_vendor' => 1,
                'nama_vendor' => 'PT. Madani Production',
                'no_telepon' => '',
            ],
            [
                'id_vendor' => 2,
                'nama_vendor' => 'PT. Anugerah tujuh langit',
                'no_telepon' => '',
            ],
        ];
        DB::table('vendor')->insert($data);
    }
}
