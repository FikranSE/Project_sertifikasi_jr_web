<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriksaSeeder extends Seeder
{
    public function run()
    {
        DB::table('periksa')->insert([
            ['No_periksa' => 'PRK001', 'Tgl_periksa' => '2024-11-01', 'Pasien_id' => 1, 'Dokter_id' => 1, 'Keluhan' => 'Sakit Kepala', 'Diagnose' => 'Migrain', 'Biaya_admin' => 50000],
            ['No_periksa' => 'PRK002', 'Tgl_periksa' => '2024-11-02', 'Pasien_id' => 2, 'Dokter_id' => 2, 'Keluhan' => 'Sakit Gigi', 'Diagnose' => 'Gigi Berlubang', 'Biaya_admin' => 75000],
            ['No_periksa' => 'PRK003', 'Tgl_periksa' => '2024-11-03', 'Pasien_id' => 3, 'Dokter_id' => 3, 'Keluhan' => 'Mata Kabur', 'Diagnose' => 'Rabun Jauh', 'Biaya_admin' => 60000],
            ['No_periksa' => 'PRK004', 'Tgl_periksa' => '2024-11-04', 'Pasien_id' => 4, 'Dokter_id' => 4, 'Keluhan' => 'Batuk Pilek', 'Diagnose' => 'Flu', 'Biaya_admin' => 45000],
            ['No_periksa' => 'PRK005', 'Tgl_periksa' => '2024-11-05', 'Pasien_id' => 5, 'Dokter_id' => 5, 'Keluhan' => 'Mual', 'Diagnose' => 'Mual Umum', 'Biaya_admin' => 55000],
        ]);
    }
}
