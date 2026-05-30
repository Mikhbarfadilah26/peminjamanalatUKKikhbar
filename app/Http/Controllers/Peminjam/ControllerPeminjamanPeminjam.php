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
                function ($query)
                use ($search) {

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
    | FORM PINJAM
    |--------------------------------------------------------------------------
    */

    public function formPinjam($id)
    {

        $alat =
            ModelAlat::with(
                'kategori'
            )

            ->findOrFail(
                $id
            );

        return view(
            'peminjam.pinjam.form',
            compact(
                'alat'
            )
        );
    }



    /*
    |--------------------------------------------------------------------------
    | SIMPAN PEMINJAMAN
    |--------------------------------------------------------------------------
    */

    public function storePinjam(Request $request, $id)
    {

        $alat =
            ModelAlat::findOrFail(
                $id
            );


        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'jumlah'
            =>
            'required|integer|min:1|max:' . $alat->stok,

            'lama_hari'
            =>
            'required|integer|min:1|max:3'

        ]);


        /*
        |--------------------------------------------------------------------------
        | CEK STOK
        |--------------------------------------------------------------------------
        */

        if ($alat->stok <= 0) {

            return back()

                ->with(
                    'error',
                    'Stok alat habis'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | SIMPAN PEMINJAMAN
        |--------------------------------------------------------------------------
        */

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
            now()->addDays(
                (int) $request->lama_hari
            ),

            'jumlah'
            =>
            (int) $request->jumlah,

            'status'
            =>
            'pending'

        ]);


        /*
        |--------------------------------------------------------------------------
        | KURANGI STOK
        |--------------------------------------------------------------------------
        */

        $alat->decrement(

            'stok',

            (int) $request->jumlah

        );


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()

            ->route(
                'peminjam.status'
            )

            ->with(
                'success',
                'Peminjaman anda  berhasil diajukan silahkan tunggu konfirmasi petugas'
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
