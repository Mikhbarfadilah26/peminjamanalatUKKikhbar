<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;

use App\Models\ModelPeminjaman;

class ControllerPengembalianPeminjam extends Controller
{

    public function index()
    {

        $data =
        ModelPeminjaman::with(
            'alat'
        )
        ->where(
            'user_id',
            auth()->id()
        )
        ->latest()
        ->get();

        return view(
            'peminjam.pengembalian.index',
            compact('data')
        );

    }



    public function kembalikan($id)
    {

        $pinjam =
        ModelPeminjaman::findOrFail($id);

        $pinjam->status =
        'menunggu_verifikasi';

        $pinjam->save();

        return back()
        ->with(
            'success',
            'Berhasil'
        );

    }

}