<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class SeederPeminjamanAlat extends Seeder
{
    public function run(): void
    {

        /*
        |--------------------------------------------------------------------------
        | USERS
        |--------------------------------------------------------------------------
        */

        DB::table('users')->insert([

            [
                'nama' => 'Administrator',
                'username' => 'admin',
                'password' => Hash::make('123'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama' => 'Petugas Lab',
                'username' => 'petugas',
                'password' => Hash::make('123'),
                'role' => 'petugas',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama' => 'Ikbar Fadil',
                'username' => 'peminjam',
                'password' => Hash::make('123'),
                'role' => 'peminjam',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        /*
        |--------------------------------------------------------------------------
        | KATEGORI
        |--------------------------------------------------------------------------
        */

        DB::table('kategoris')->insert([

            [
                'nama_kategori' => 'Elektronik',
                'deskripsi' => 'Peralatan elektronik',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_kategori' => 'Jaringan',
                'deskripsi' => 'Peralatan jaringan komputer',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_kategori' => 'Multimedia',
                'deskripsi' => 'Peralatan multimedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        /*
        |--------------------------------------------------------------------------
        | ALAT
        |--------------------------------------------------------------------------
        */

        DB::table('alats')->insert([

            [
                'kategori_id' => 1,
                'nama_alat' => 'Laptop Asus',
                'stok' => 10,
                'kondisi' => 'baik',
                'foto' => null,
                'status' => 'tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'kategori_id' => 2,
                'nama_alat' => 'Router Mikrotik',
                'stok' => 5,
                'kondisi' => 'baik',
                'foto' => null,
                'status' => 'tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'kategori_id' => 3,
                'nama_alat' => 'Proyektor Epson',
                'stok' => 3,
                'kondisi' => 'baik',
                'foto' => null,
                'status' => 'tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        /*
        |--------------------------------------------------------------------------
        | PEMINJAMAN
        |--------------------------------------------------------------------------
        */

        DB::table('peminjamans')->insert([

            [
                'user_id' => 3,
                'alat_id' => 1,
                'tanggal_pinjam' => Carbon::now()->toDateString(),
                'tanggal_kembali' => Carbon::now()->addDays(3)->toDateString(),
                'jumlah' => 1,
                'status' => 'approved',
                'catatan' => 'Dipinjam untuk praktik',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        /*
        |--------------------------------------------------------------------------
        | PENGEMBALIAN
        |--------------------------------------------------------------------------
        */

        DB::table('pengembalians')->insert([

            [
                'peminjaman_id' => 1,
                'tanggal_pengembalian' => Carbon::now()->toDateString(),
                'keterlambatan' => 0,
                'denda' => 0,
                'kondisi_kembali' => 'baik',
                'catatan' => 'Alat dikembalikan lengkap',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        /*
        |--------------------------------------------------------------------------
        | LOG ACTIVITY
        |--------------------------------------------------------------------------
        */

        DB::table('log_activities')->insert([

            [
                'user_id' => 1,
                'aktivitas' => 'Admin login ke sistem',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'user_id' => 2,
                'aktivitas' => 'Petugas menyetujui peminjaman',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'user_id' => 3,
                'aktivitas' => 'Peminjam mengajukan peminjaman alat',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

    }
}