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
        Schema::table('naufal_bookings', function (Blueprint $table) {
        $table->foreignId('guide_id')->nullable()->constrained('naufal_guides')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('naufal_bookings', function (Blueprint $table) {
            //
        });
    }
};
