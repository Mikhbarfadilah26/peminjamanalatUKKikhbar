<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ModelAlat;
use App\Models\ModelPeminjaman;

class ControllerPeminjamanPeminjam extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | DAFTAR ALAT
    |--------------------------------------------------------------------------
    */

    public function daftarAlat(Request $request)
    {

        $search =
        $request->search;

        $data =
        ModelAlat::with(
            'kategori'
        )

        ->when(
            $search,
            function($query)
            use($search){

                $query
                ->where(
                    'nama_alat',
                    'like',
                    "%{$search}%"
                );

            }
        )

        ->latest()

        ->get();

        return view(
            'peminjam.alat.index',
            compact(
                'data'
            )
        );

    }



    /*
    |--------------------------------------------------------------------------
    | PINJAM ALAT
    |--------------------------------------------------------------------------
    */

    public function pinjam($id)
    {

        $alat =
        ModelAlat::findOrFail(
            $id
        );


        if($alat->stok <= 0){

            return back()

            ->with(
                'error',
                'Stok alat habis'
            );

        }


        ModelPeminjaman::create([

            'user_id'
            =>
            Auth::id(),

            'alat_id'
            =>
            $alat->id,

            'tanggal_pinjam'
            =>
            now(),

            'tanggal_kembali'
            =>
            now()->addDays(3),

            'jumlah'
            =>
            1,

            'status'
            =>
            'pending'

        ]);


        $alat->decrement(
            'stok'
        );


        return back()

        ->with(
            'success',
            'Peminjaman berhasil diajukan'
        );

    }



    /*
    |--------------------------------------------------------------------------
    | STATUS PEMINJAMAN
    |--------------------------------------------------------------------------
    */

    public function statusPeminjaman()
    {

        $data =

        ModelPeminjaman::with([

            'alat'

        ])

        ->where(

            'user_id',

            Auth::id()

        )

        ->latest()

        ->get();


        return view(

            'peminjam.peminjaman.index',

            compact(

                'data'

            )

        );

    }

}