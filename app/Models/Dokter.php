<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokter';  // Nama tabel jika berbeda dengan nama model

    protected $primaryKey = 'Dokter_id';  // Tentukan nama kolom primary key jika bukan 'id'

    protected $fillable = [
        'Dokter_nama', 'Email_dokter', 'Poli_id'
    ];

    /**
     * Relasi dengan Poli
     */
    public function poli()
    {
        return $this->belongsTo(Poli::class, 'Poli_id');  // Pastikan foreign key sesuai
    }
}

