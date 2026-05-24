<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {

        /*
        |--------------------------------------------------------------------------
        | USERS
        |--------------------------------------------------------------------------
        */

        Schema::create('users', function (Blueprint $table) {

            $table->id();

            $table->string('nama');

            $table->string('username')->unique();

            $table->string('password');

            $table->string('foto')->nullable();

            $table->enum('role', [
                'admin',
                'petugas',
                'peminjam'
            ]);

            $table->timestamps();

        });

        /*
        |--------------------------------------------------------------------------
        | KATEGORI
        |--------------------------------------------------------------------------
        */

        Schema::create('kategoris', function (Blueprint $table) {

            $table->id();

            $table->string('nama_kategori');

            $table->text('deskripsi')->nullable();

            $table->timestamps();

        });

        /*
        |--------------------------------------------------------------------------
        | ALAT
        |--------------------------------------------------------------------------
        */

        Schema::create('alats', function (Blueprint $table) {

            $table->id();

            $table->foreignId('kategori_id')
                ->constrained('kategoris')
                ->cascadeOnDelete();

            $table->string('nama_alat');

            $table->integer('stok')->default(0);

            $table->enum('kondisi', [
                'baik',
                'rusak_ringan',
                'rusak_berat'
            ])->default('baik');

            $table->string('foto')->nullable();

            $table->enum('status', [
                'tersedia',
                'dipinjam',
                'rusak'
            ])->default('tersedia');

            $table->timestamps();

        });

        /*
        |--------------------------------------------------------------------------
        | PEMINJAMAN
        |--------------------------------------------------------------------------
        */

        Schema::create('peminjamans', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('alat_id')
                ->constrained('alats')
                ->cascadeOnDelete();

            $table->date('tanggal_pinjam');

            $table->date('tanggal_kembali');

            $table->integer('jumlah');

            $table->enum('status', [
                'pending',
                'approved',
                'rejected',
                'selesai'
            ])->default('pending');

            $table->text('catatan')->nullable();

            $table->timestamps();

        });

        /*
        |--------------------------------------------------------------------------
        | PENGEMBALIAN
        |--------------------------------------------------------------------------
        */

        Schema::create('pengembalians', function (Blueprint $table) {

            $table->id();

            $table->foreignId('peminjaman_id')
                ->constrained('peminjamans')
                ->cascadeOnDelete();

            $table->date('tanggal_pengembalian');

            $table->integer('keterlambatan')->default(0);

            $table->decimal('denda', 12, 2)->default(0);

            $table->enum('kondisi_kembali', [
                'baik',
                'rusak'
            ])->default('baik');

            $table->text('catatan')->nullable();

            $table->timestamps();

        });

        /*
        |--------------------------------------------------------------------------
        | LOG ACTIVITY
        |--------------------------------------------------------------------------
        */

        Schema::create('log_activities', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('aktivitas');

            $table->timestamps();

        });

    }

    public function down(): void
    {

        Schema::dropIfExists('log_activities');

        Schema::dropIfExists('pengembalians');

        Schema::dropIfExists('peminjamans');

        Schema::dropIfExists('alats');

        Schema::dropIfExists('kategoris');

        Schema::dropIfExists('users');

    }

};