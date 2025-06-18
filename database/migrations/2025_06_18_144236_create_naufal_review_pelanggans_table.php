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
        Schema::create('naufal_review_pelanggans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('naufal_bookings')->onDelete('cascade');
            $table->integer('rating'); // 1–5
            $table->text('komentar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('naufal_review_pelanggans');
    }
};
