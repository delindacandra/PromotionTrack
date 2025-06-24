<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use FFI;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LevelSeeder::class,
            HakAksesSeeder::class,
            SalesAreaSeeder::class,
            FungsiSeeder::class,
            UsersSeeder::class,
            SkalaKegiatanSeeder::class,
            PermintaanSeeder::class,
            VendorSeeder::class,
            DataBarangSeeder::class,
            StokSeeder::class,
            BarangKeluarSeeder::class,
            BarangMasukSeeder::class,
            DetailBarangKeluarSeeder::class,
            DetailBarangMasukSeeder::class,
        ]);
    }
}
