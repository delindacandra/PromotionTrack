<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FungsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_fungsi' => 1,
                'nama_fungsi' => 'Executive GM',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_fungsi' => 2,
                'nama_fungsi' => 'Corporate Sales',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_fungsi' => 3,
                'nama_fungsi' => 'Corporate Opt & Srv',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_fungsi' => 4,
                'nama_fungsi' => 'Retail Sales',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_fungsi' => 5,
                'nama_fungsi' => 'Supply & Distribution',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_fungsi' => 6,
                'nama_fungsi' => 'Rel & Proj. Dev.',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_fungsi' => 7,
                'nama_fungsi' => 'HSSE',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_fungsi' => 8,
                'nama_fungsi' => 'Procurement',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_fungsi' => 9,
                'nama_fungsi' => 'Asset Operation',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_fungsi' => 10,
                'nama_fungsi' => 'Finance',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_fungsi' => 11,
                'nama_fungsi' => 'HC',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_fungsi' => 12,
                'nama_fungsi' => 'Legal Counsel',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_fungsi' => 13,
                'nama_fungsi' => 'Comm, Rel, & CSR',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_fungsi' => 14,
                'nama_fungsi' => 'Medical',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_fungsi' => 15,
                'nama_fungsi' => 'IA',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_fungsi' => 16,
                'nama_fungsi' => 'SSC ICT MOR V',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_fungsi' => 17,
                'nama_fungsi' => 'Group Head Operation',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_fungsi' => 18,
                'nama_fungsi' => 'SSC ICT VI',
                'created_at' => now(),
                "updated_at" => now()
            ],
            [
                'id_fungsi' => 19,
                'nama_fungsi' => 'Manager Sales Region V PT. PErtamina Lubricant',
                'created_at' => now(),
                "updated_at" => now()
            ],
            
            [
                'id_fungsi' => 20,
                'nama_fungsi' => 'GM Marine Business & Operation Region II',
                'created_at' => now(),
                "updated_at" => now()
            ],
        ];
        DB::table('fungsi')->insert($data);
    }
}
