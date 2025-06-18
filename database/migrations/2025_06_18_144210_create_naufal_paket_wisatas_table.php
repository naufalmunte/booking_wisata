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
        Schema::create('naufal_paket_wisatas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            $table->text('deskripsi');
            $table->integer('harga_per_orang');
            $table->integer('durasi_hari');
            $table->string('lokasi');
            $table->string('gambar')->nullable(); // untuk gambar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('naufal_paket_wisatas');
    }
};
