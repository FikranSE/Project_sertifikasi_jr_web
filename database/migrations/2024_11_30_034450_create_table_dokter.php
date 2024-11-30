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
        Schema::create('dokter', function (Blueprint $table) {
            $table->id('Dokter_id'); // Primary key
            $table->string('Dokter_nama'); // Nama dokter
            $table->string('Email_dokter')->unique(); // Email dokter, harus unik
            $table->unsignedBigInteger('Poli_id'); // Foreign key untuk tabel poli
            $table->timestamps(); // Kolom created_at dan updated_at
        
            // Foreign key constraint
            $table->foreign('Poli_id')->references('Poli_id')->on('poli')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokter');
    }
};
