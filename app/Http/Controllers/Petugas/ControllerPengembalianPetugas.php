<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;

use App\Models\ModelPeminjaman;

class ControllerPengembalianPetugas extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | LIST VERIFIKASI
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

                'menunggu_verifikasi'

            ]
        )

        ->latest()

        ->get();


        return view(
            'petugas.pengembalian.index',
            compact(
                'data'
            )
        );

    }



    /*
    |--------------------------------------------------------------------------
    | VERIFIKASI
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


        // sudah selesai
        if(

            $pinjam->status
            ==
            'selesai'

        ){

            return back()
            ->with(
                'error',
                'Sudah diverifikasi'
            );

        }


        $pinjam->update([

            'status'
            =>
            'selesai'

        ]);


        // kembalikan stok
        if(
            $pinjam->alat
        ){

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