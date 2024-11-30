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
        Schema::create('periksa', function (Blueprint $table) {
            $table->string('No_periksa')->primary(); 
            $table->date('Tgl_periksa'); 
            $table->unsignedBigInteger('Pasien_id'); 
            $table->unsignedBigInteger('Dokter_id'); 
            $table->text('Keluhan'); 
            $table->text('Diagnose'); 
            $table->decimal('Biaya_admin', 10, 2); 
            $table->timestamps(); 

            // Menambahkan foreign key constraints
            $table->foreign('Pasien_id')->references('Pasien_id')->on('pasien')->onDelete('cascade');
            $table->foreign('Dokter_id')->references('Dokter_id')->on('dokter')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periksa');
    }
};
