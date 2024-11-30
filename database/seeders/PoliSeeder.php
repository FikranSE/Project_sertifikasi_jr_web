<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoliSeeder extends Seeder
{
    // PoliSeeder.php
public function run()
{
    DB::table('poli')->insert([
        ['Poli_id' => 1, 'Poli_nama' => 'Poli Umum'],
        ['Poli_id' => 2, 'Poli_nama' => 'Poli Gigi'],
        ['Poli_id' => 3, 'Poli_nama' => 'Poli Mata'],
        ['Poli_id' => 4, 'Poli_nama' => 'Poli Anak'],
        ['Poli_id' => 5, 'Poli_nama' => 'Poli Kandungan'],
    ]);
}

}
