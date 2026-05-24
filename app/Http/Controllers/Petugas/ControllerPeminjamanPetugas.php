<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\ModelPeminjaman;

class ControllerPeminjamanPetugas extends Controller
{

    public function index()
    {

        $data =
        ModelPeminjaman::with([
            'user',
            'alat'
        ])
        ->latest()
        ->get();

        return view(
            'petugas.peminjaman.index',
            compact('data')
        );

    }



    public function approve($id)
    {

        $pinjam =
        ModelPeminjaman::findOrFail($id);


        // sudah diproses
        if(
            $pinjam->status
            !=
            'pending'
        ){

            return back()
            ->with(
                'error',
                'Status sudah diproses'
            );

        }


        $pinjam->update([

            'status'
            =>
            'approved'

        ]);


        return back()
        ->with(
            'success',
            'Peminjaman berhasil disetujui'
        );

    }



    public function reject($id)
    {

        $pinjam =
        ModelPeminjaman::findOrFail($id);


        if(
            $pinjam->status
            !=
            'pending'
        ){

            return back()
            ->with(
                'error',
                'Status sudah diproses'
            );

        }


        $pinjam->update([

            'status'
            =>
            'rejected'

        ]);


        return back()
        ->with(
            'success',
            'Peminjaman berhasil ditolak'
        );

    }

}