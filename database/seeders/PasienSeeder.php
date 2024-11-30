<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasienSeeder extends Seeder
{
    // PasienSeeder.php
public function run()
{
    DB::table('pasien')->insert([
        ['Pasien_nama' => 'John Doe', 'Tanggal_lahir' => '1990-01-01', 'Jenis_kelamin' => 'L', 'Alamat' => 'Jl. Contoh Alamat No. 1', 'Telepon' => '081234567890', 'Email' => 'johndoe@example.com'],
        ['Pasien_nama' => 'Jane Smith', 'Tanggal_lahir' => '1985-05-15', 'Jenis_kelamin' => 'P', 'Alamat' => 'Jl. Merdeka No. 5', 'Telepon' => '081234567891', 'Email' => 'janesmith@example.com'],
        ['Pasien_nama' => 'Alice Johnson', 'Tanggal_lahir' => '1992-07-30', 'Jenis_kelamin' => 'P', 'Alamat' => 'Jl. Raya No. 12', 'Telepon' => '081234567892', 'Email' => 'alicejohnson@example.com'],
        ['Pasien_nama' => 'Bob Brown', 'Tanggal_lahir' => '1987-11-20', 'Jenis_kelamin' => 'L', 'Alamat' => 'Jl. Sukasari No. 7', 'Telepon' => '081234567893', 'Email' => 'bobbrown@example.com'],
        ['Pasien_nama' => 'Charlie Davis', 'Tanggal_lahir' => '1995-02-10', 'Jenis_kelamin' => 'L', 'Alamat' => 'Jl. Selatan No. 3', 'Telepon' => '081234567894', 'Email' => 'charliedavis@example.com'],
    ]);
}

}
