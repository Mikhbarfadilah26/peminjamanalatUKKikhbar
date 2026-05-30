<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONTROLLER
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Auth\ControllerLogin;

use App\Http\Controllers\Dashboard\ControllerDashboardAdmin;
use App\Http\Controllers\Dashboard\ControllerDashboardPetugas;
use App\Http\Controllers\Dashboard\ControllerDashboardPeminjam;

use App\Http\Controllers\Master\ControllerUser;
use App\Http\Controllers\Master\ControllerKategori;
use App\Http\Controllers\Master\ControllerAlat;

use App\Http\Controllers\Admin\ControllerPeminjamanAdmin;
use App\Http\Controllers\Petugas\ControllerPeminjamanPetugas;
use App\Http\Controllers\Peminjam\ControllerPeminjamanPeminjam;

use App\Http\Controllers\Admin\ControllerPengembalianAdmin;
use App\Http\Controllers\Petugas\ControllerPengembalianPetugas;
use App\Http\Controllers\Peminjam\ControllerPengembalianPeminjam;

use App\Http\Controllers\Peminjam\ControllerProfilPeminjam;

use App\Http\Controllers\Laporan\ControllerLaporan;


/*
|--------------------------------------------------------------------------
| LANDING
|--------------------------------------------------------------------------
*/

Route::view('/', 'landing.home');

Route::view('/fitur', 'landing.fitur')
    ->name('fitur');

Route::view('/tentang', 'landing.tentang')
    ->name('tentang');

Route::view('/kontak', 'landing.kontak')
    ->name('kontak');


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get(
    '/login',
    [
        ControllerLogin::class,
        'index'
    ]
)->name('login');


Route::post(
    '/login',
    [
        ControllerLogin::class,
        'proses'
    ]
);


Route::post(
    '/logout',
    [
        ControllerLogin::class,
        'logout'
    ]
)->name('logout');



/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['role:admin'])
    ->prefix('admin')
    ->group(function () {


        Route::get(
            '/dashboard',
            [
                ControllerDashboardAdmin::class,
                'index'
            ]
        )->name(
            'admin.dashboard'
        );


        Route::resource(
            'user',
            ControllerUser::class
        );

        Route::resource(
            'kategori',
            ControllerKategori::class
        );

        Route::resource(
            'alat',
            ControllerAlat::class
        );



        /*
/*
|--------------------------------------------------------------------------
| PEMINJAMAN
|--------------------------------------------------------------------------
*/

Route::get(
    '/peminjaman',
    [
        ControllerPeminjamanAdmin::class,
        'index'
    ]
)->name('admin.peminjaman');


Route::post(
    '/peminjaman/{id}/approve',
    [
        ControllerPeminjamanAdmin::class,
        'approve'
    ]
)->name('admin.peminjaman.approve');


Route::post(
    '/peminjaman/{id}/reject',
    [
        ControllerPeminjamanAdmin::class,
        'reject'
    ]
)->name('admin.peminjaman.reject');


Route::delete(
    '/peminjaman/{id}',
    [
        ControllerPeminjamanAdmin::class,
        'destroy'
    ]
)->name('admin.peminjaman.destroy');
/*
|--------------------------------------------------------------------------
| PENGEMBALIAN ADMIN
|--------------------------------------------------------------------------
*/

Route::get(
    '/pengembalian',
    [
        ControllerPengembalianAdmin::class,
        'index'
    ]
)->name(
    'admin.pengembalian'
);


Route::post(
    '/pengembalian/verifikasi/{id}',
    [
        ControllerPengembalianAdmin::class,
        'verifikasi'
    ]
)->name(
    'admin.pengembalian.verifikasi'
);

        /*
|--------------------------------------------------------------------------
| LAPORAN
|--------------------------------------------------------------------------
*/

        Route::get(
            '/laporan',
            [
                ControllerLaporan::class,
                'index'
            ]
        )->name(
            'admin.laporan'
        );


        Route::get(
            '/laporan/cetak',
            [
                ControllerLaporan::class,
                'cetak'
            ]
        )->name(
            'admin.laporan.cetak'
        );



        /*
|--------------------------------------------------------------------------
| LOG
|--------------------------------------------------------------------------
*/

        Route::get(
            '/log',
            [
                \App\Http\Controllers\Master\ControllerLogActivity::class,
                'index'
            ]
        )->name(
            'admin.log'
        );
    });



/*
|--------------------------------------------------------------------------
| PETUGAS
|--------------------------------------------------------------------------
*/

Route::middleware(['role:petugas'])
    ->prefix('petugas')
    ->group(function () {


        Route::get(
            '/dashboard',
            [
                ControllerDashboardPetugas::class,
                'index'
            ]
        )->name(
            'petugas.dashboard'
        );



        Route::get(
            '/alat',
            [
                ControllerAlat::class,
                'petugasIndex'
            ]
        )->name(
            'petugas.alat'
        );

        Route::middleware(['role:petugas'])->prefix('petugas')->group(function () {

            /*
    |--------------------------------------------------------------------------
    | PEMINJAMAN PETUGAS
    |--------------------------------------------------------------------------
    */

            Route::get(
                '/peminjaman',
                [ControllerPeminjamanPetugas::class, 'index']
            )->name('petugas.peminjaman');


            Route::post(
                '/peminjaman/{id}/approve',
                [ControllerPeminjamanPetugas::class, 'approve']
            )->name('petugas.peminjaman.approve');


            Route::post(
                '/peminjaman/{id}/reject',
                [ControllerPeminjamanPetugas::class, 'reject']
            )->name('petugas.peminjaman.reject');


            /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

            Route::get(
                '/peminjaman/{id}/edit',
                [ControllerPeminjamanPetugas::class, 'edit']
            )->name('petugas.peminjaman.edit');


            /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

            Route::put(
                '/peminjaman/{id}',
                [ControllerPeminjamanPetugas::class, 'update']
            )->name('petugas.peminjaman.update');


            /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

            Route::delete(
                '/peminjaman/{id}',
                [ControllerPeminjamanPetugas::class, 'destroy']
            )->name('petugas.peminjaman.destroy');
        });



        /*
|--------------------------------------------------------------------------
| APPROVAL PEMINJAMAN
|--------------------------------------------------------------------------
*/

        Route::get(
            '/peminjaman',
            [
                ControllerPeminjamanPetugas::class,
                'index'
            ]
        )->name(
            'petugas.peminjaman'
        );


        Route::post(
            '/peminjaman/approve/{id}',
            [
                ControllerPeminjamanPetugas::class,
                'approve'
            ]
        )->name(
            'petugas.peminjaman.approve'
        );


        Route::post(
            '/peminjaman/reject/{id}',
            [
                ControllerPeminjamanPetugas::class,
                'reject'
            ]
        )->name(
            'petugas.peminjaman.reject'
        );



        /*
|--------------------------------------------------------------------------
| VERIFIKASI PENGEMBALIAN
|--------------------------------------------------------------------------
*/

        Route::get(
            '/pengembalian',
            [
                ControllerPengembalianPetugas::class,
                'index'
            ]
        )->name(
            'petugas.pengembalian'
        );


        Route::post(
            '/pengembalian/verifikasi/{id}',
            [
                ControllerPengembalianPetugas::class,
                'verifikasi'
            ]
        )->name(
            'petugas.pengembalian.verifikasi'
        );
    });



/*
|--------------------------------------------------------------------------
| PEMINJAM
|--------------------------------------------------------------------------
*/

Route::middleware(['role:peminjam'])
    ->prefix('peminjam')
    ->group(function () {



        Route::get(
            '/dashboard',
            [
                ControllerDashboardPeminjam::class,
                'index'
            ]
        )->name(
            'peminjam.dashboard'
        );



        /*
|--------------------------------------------------------------------------
| DAFTAR ALAT
|--------------------------------------------------------------------------
*/

        Route::get(
            '/alat',
            [
                ControllerPeminjamanPeminjam::class,
                'daftarAlat'
            ]
        )->name(
            'peminjam.alat'
        );



        /*
|--------------------------------------------------------------------------
| FORM PINJAM
|--------------------------------------------------------------------------
*/

        Route::get(
            '/pinjam/{id}',
            [
                ControllerPeminjamanPeminjam::class,
                'formPinjam'
            ]
        )->name(
            'peminjam.pinjam.form'
        );


        Route::post(
            '/pinjam/store/{id}',
            [
                ControllerPeminjamanPeminjam::class,
                'storePinjam'
            ]
        )->name(
            'peminjam.pinjam.store'
        );



        /*
|--------------------------------------------------------------------------
| STATUS PEMINJAMAN
|--------------------------------------------------------------------------
*/

        Route::get(
            '/status',
            [
                ControllerPeminjamanPeminjam::class,
                'statusPeminjaman'
            ]
        )->name(
            'peminjam.status'
        );



        /*
|--------------------------------------------------------------------------
| PROFIL
|--------------------------------------------------------------------------
*/

        Route::get(
            '/profil',
            [
                ControllerProfilPeminjam::class,
                'index'
            ]
        )->name(
            'peminjam.profil'
        );



        /*
|--------------------------------------------------------------------------
| PENGEMBALIAN
|--------------------------------------------------------------------------
*/

        Route::get(
            '/pengembalian',
            [
                ControllerPengembalianPeminjam::class,
                'index'
            ]
        )->name(
            'peminjam.pengembalian'
        );


        Route::post(
            '/pengembalian/{id}',
            [
                ControllerPengembalianPeminjam::class,
                'kembalikan'
            ]
        )->name(
            'peminjam.pengembalian.kembalikan'
        );
    });
