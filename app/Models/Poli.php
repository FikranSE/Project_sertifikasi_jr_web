<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;

    protected $table = 'poli';  // Nama tabel jika berbeda dengan nama model

    protected $primaryKey = 'Poli_id';  // Tentukan nama kolom primary key jika bukan 'id'

    protected $fillable = [
        'Poli_nama'
    ];

    /**
     * Relasi dengan Dokter
     */
    public function dokter()
    {
        return $this->hasMany(Dokter::class, 'Poli_id');
    }
}

