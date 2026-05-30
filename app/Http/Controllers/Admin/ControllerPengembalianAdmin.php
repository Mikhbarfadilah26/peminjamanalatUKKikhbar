<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelPeminjaman;

class ControllerPengembalianAdmin extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | LIST PENGEMBALIAN
    |--------------------------------------------------------------------------
    */

    public function index()
    {

        $data =
        ModelPeminjaman::with([
            'user',
            'alat'
        ])

        ->whereIn(
            'status',
            [

                'approved',

                'menunggu_verifikasi',

                'selesai'

            ]
        )

        ->latest()

        ->get();


        return view(
            'admin.pengembalian.index',
            compact(
                'data'
            )
        );

    }



    /*
    |--------------------------------------------------------------------------
    | VERIFIKASI PENGEMBALIAN
    |--------------------------------------------------------------------------
    */

    public function verifikasi($id)
    {

        $pinjam =
        ModelPeminjaman::with(
            'alat'
        )
        ->findOrFail(
            $id
        );


        if (

            $pinjam->status
            ==
            'selesai'

        ) {

            return back()
            ->with(
                'error',
                'Data sudah diverifikasi'
            );

        }


        $pinjam->update([

            'status'
            =>
            'selesai'

        ]);


        if (

            $pinjam->alat

        ) {

            $pinjam
            ->alat
            ->increment(

                'stok',

                $pinjam->jumlah

            );

        }


        return back()
        ->with(

            'success',

            'Pengembalian berhasil diverifikasi'

        );

    }

}