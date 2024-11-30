<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokterSeeder extends Seeder
{
    public function run()
    {
        DB::table('dokter')->insert([
            ['Dokter_nama' => 'Dr. Sarah Lee', 'Email_dokter' => 'dr.sarahlee@example.com', 'Poli_id' => 1],
            ['Dokter_nama' => 'Dr. Michael Green', 'Email_dokter' => 'dr.michaelgreen@example.com', 'Poli_id' => 2],
            ['Dokter_nama' => 'Dr. Emily Clark', 'Email_dokter' => 'dr.emilyclark@example.com', 'Poli_id' => 3],
            ['Dokter_nama' => 'Dr. James Taylor', 'Email_dokter' => 'dr.jamestaylor@example.com', 'Poli_id' => 1],
            ['Dokter_nama' => 'Dr. Linda White', 'Email_dokter' => 'dr.lindawhite@example.com', 'Poli_id' => 2],
        ]);
    }
}
