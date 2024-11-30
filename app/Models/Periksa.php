<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periksa extends Model
{
    use HasFactory;

    protected $table = 'periksa';  // Nama tabel jika berbeda dengan nama model

    protected $primaryKey = 'No_periksa';  // Tentukan No_periksa sebagai kunci utama

    public $incrementing = false; // Menonaktifkan auto increment jika No_periksa bukan angka

    protected $fillable = [
        'No_periksa', 'Tgl_periksa', 'Pasien_id', 'Dokter_id', 'Keluhan', 'Diagnose', 'Biaya_admin'
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'Dokter_id');  // Sesuaikan dengan kolom yang benar
    }

    // Relasi dengan Pasien
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'Pasien_id');
    }
}


