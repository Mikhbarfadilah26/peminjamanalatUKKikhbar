<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {

        DB::statement("
            ALTER TABLE peminjamans
            MODIFY status ENUM(
                'pending',
                'approved',
                'terlambat',
                'menunggu_verifikasi',
                'selesai',
                'rejected'
            )
            DEFAULT 'pending'
        ");

    }

    public function down(): void
    {

        DB::statement("
            ALTER TABLE peminjamans
            MODIFY status ENUM(
                'pending',
                'approved',
                'rejected',
                'selesai'
            )
            DEFAULT 'pending'
        ");

    }
};