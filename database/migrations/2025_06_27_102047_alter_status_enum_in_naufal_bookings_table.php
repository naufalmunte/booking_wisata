<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        DB::statement("ALTER TABLE naufal_bookings MODIFY status ENUM('pending', 'confirmed', 'batal', 'done') NOT NULL DEFAULT 'pending'");
    }

    public function down()
    {
        DB::statement("ALTER TABLE naufal_bookings MODIFY status ENUM('pending', 'confirmed', 'batal') NOT NULL DEFAULT 'pending'");
    }
};
