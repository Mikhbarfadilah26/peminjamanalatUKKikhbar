<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\Models\ModelPeminjaman;

class ControllerDashboardPeminjam extends Controller
{

    public function index()
    {

        $userId =
        Auth::id();

        /*
        |--------------------------------------------------------------------------
        | CARD STATISTIK
        |--------------------------------------------------------------------------
        */

        $totalPinjaman =
        ModelPeminjaman::where(
            'user_id',
            $userId
        )->count();


        $dipinjam =
        ModelPeminjaman::where(
            'user_id',
            $userId
        )
        ->whereIn(
            'status',
            [
                'approved',
                'dipinjam'
            ]
        )
        ->count();


        $selesai =
        ModelPeminjaman::where(
            'user_id',
            $userId
        )
        ->where(
            'status',
            'selesai'
        )
        ->count();



        /*
        |--------------------------------------------------------------------------
        | DATA TERBARU
        |--------------------------------------------------------------------------
        */

        $terbaru =
        ModelPeminjaman::with(
            'alat'
        )

        ->where(
            'user_id',
            $userId
        )

        ->latest()

        ->take(5)

        ->get();


        return view(

            'peminjam.dashboard.index',

            compact(

                'totalPinjaman',

                'dipinjam',

                'selesai',

                'terbaru'

            )

        );

    }

}