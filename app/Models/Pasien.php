<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';
    protected $primaryKey = 'Pasien_id';   

    protected $fillable = [
        'Pasien_nama', 'Tanggal_lahir', 'Jenis_kelamin', 'Alamat', 'Telepon', 'Email'
    ];

    /**
     * Relasi dengan Periksa
     */
    public function periksa()
    {
        return $this->hasMany(Periksa::class, 'Pasien_id');
    }
}
