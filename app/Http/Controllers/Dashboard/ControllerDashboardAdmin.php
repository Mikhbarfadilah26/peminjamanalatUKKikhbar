<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\ModelUser;
use App\Models\ModelAlat;
use App\Models\ModelPeminjaman;
use App\Models\ModelPengembalian;

class ControllerDashboardAdmin extends Controller
{

    public function index()
    {

        /*
        |--------------------------------------------------------------------------
        | STATISTIK
        |--------------------------------------------------------------------------
        */

        $user =
        ModelUser::count();

        $alat =
        ModelAlat::count();

        $peminjaman =
        ModelPeminjaman::count();

        $pengembalian =
        ModelPeminjaman::where(
            'status',
            'selesai'
        )->count();



        /*
        |--------------------------------------------------------------------------
        | PEMINJAMAN TERBARU
        |--------------------------------------------------------------------------
        */

        $peminjamanTerbaru =
        ModelPeminjaman::with([
            'user',
            'alat'
        ])
        ->latest()
        ->take(5)
        ->get();



        /*
        |--------------------------------------------------------------------------
        | PENGEMBALIAN TERBARU
        |--------------------------------------------------------------------------
        */

        $pengembalianTerbaru =
        ModelPeminjaman::with([
            'user',
            'alat'
        ])
        ->where(
            'status',
            'selesai'
        )
        ->latest()
        ->take(5)
        ->get();



        /*
        |--------------------------------------------------------------------------
        | ALAT TERBARU
        |--------------------------------------------------------------------------
        */

        $alatTerbaru =
        ModelAlat::latest()
        ->take(5)
        ->get();



        return view(
            'admin.dashboard.index',
            compact(
                'user',
                'alat',
                'peminjaman',
                'pengembalian',
                'peminjamanTerbaru',
                'pengembalianTerbaru',
                'alatTerbaru'
            )
        );

    }

}