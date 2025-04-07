<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_users' => 1,
                'id_level' => 1,
                'id_sa' => 1,
                'id_fungsi' => 4,
                'email' => 'adminprotrack@gmail.com',
                'password' => Hash::make(env('ADMIN_PASSWORD', 'defaultpass')),
            ],
            [
                'id_users' => 2,
                'id_level' => 2,
                'id_sa' => 1,
                'id_fungsi' => 4,
                'email' => 'picprotrack@gmail.com',
                'password' => Hash::make(env('PIC_PASSWORD', 'defaultpass')),
            ],
        ];
        DB::table('users')->insert($data);
    }
}
