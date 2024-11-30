<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id('Pasien_id'); 
            $table->string('Pasien_nama'); 
            $table->date('Tanggal_lahir'); 
            $table->enum('Jenis_kelamin', ['L', 'P']); 
            $table->text('Alamat'); 
            $table->string('Telepon', 15)->nullable(); 
            $table->string('Email')->unique()->nullable(); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
