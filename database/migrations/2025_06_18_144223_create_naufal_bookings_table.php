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
        Schema::create('naufal_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained('naufal_penggunas')->onDelete('cascade');
            $table->foreignId('paket_id')->constrained('naufal_paket_wisatas')->onDelete('cascade');
            $table->date('tanggal_berangkat');
            $table->integer('jumlah_orang');
            $table->enum('status', ['pending', 'confirmed', 'batal'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('naufal_bookings');
    }
};
