<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('naufal_bookings', function (Blueprint $table) {
            // Hapus foreign key terlebih dahulu jika sudah ada
            $table->dropForeign(['guide_id']);
            $table->dropColumn('guide_id');
        });

        Schema::table('naufal_bookings', function (Blueprint $table) {
            // Tambahkan ulang kolom di posisi baru (setelah jumlah_orang)
            $table->foreignId('guide_id')
                ->nullable()
                ->after('jumlah_orang')
                ->constrained('naufal_guides')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('naufal_bookings', function (Blueprint $table) {
            $table->dropForeign(['guide_id']);
            $table->dropColumn('guide_id');

            // Optional: bisa tambahkan kembali di posisi lama kalau mau
        });
    }
};
