<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
{
    $this->call([
        PoliSeeder::class,  // Isi Poli terlebih dahulu
        PasienSeeder::class,
        DokterSeeder::class,  // Baru Dokter setelah Poli
        PeriksaSeeder::class,
    ]);
}

}
