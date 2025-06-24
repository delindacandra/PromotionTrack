<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HakAksesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hak_akses')->delete();

        $akses = [
            1 => [ // Admin
                'dashboard' => ['index'],
                'barang' => ['index', 'list', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
                'barang_masuk' => ['index', 'list', 'create', 'store', 'edit', 'update', 'destroy'],
                'barang_keluar' => ['index', 'list', 'create', 'store', 'show', 'edit', 'update', 'destroy', 'cetak'],
                'permintaan' => ['index', 'list', 'proses', 'riwayat', 'store'],
            ],
            2 => [ // PIC
                'dashboard' => ['index'],
                'barang' => ['index', 'list', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
                'barang_masuk' => ['index', 'list', 'create', 'store', 'edit', 'update', 'destroy'],
                'barang_keluar' => ['index', 'list', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
                'permintaan' => ['index', 'list', 'show', 'status', 'proses', 'riwayat'],
                'pengguna' => ['index', 'list', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            ],
            3 => [ // Pemohon
                'permintaan' => ['index', 'create', 'store', 'edit', 'update', 'list', 'show', 'status', 'proses', 'riwayat'],
            ],
        ];

        $data = [];
        foreach ($akses as $level => $fiturs) {
            foreach ($fiturs as $fitur => $privileges) {
                foreach ($privileges as $priv) {
                    $data[] = [
                        'id_level' => $level,
                        'fitur' => $fitur,
                        'privilege' => $priv,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        }

        DB::table('hak_akses')->insert($data);
    }
}
