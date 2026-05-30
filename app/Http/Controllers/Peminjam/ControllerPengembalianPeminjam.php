<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;

use App\Models\ModelPeminjaman;

use Carbon\Carbon;

class ControllerPengembalianPeminjam extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | HALAMAN PENGEMBALIAN
    |--------------------------------------------------------------------------
    */

    public function index()
    {

        /*
        |--------------------------------------------------------------------------
        | WAKTU INDONESIA
        |--------------------------------------------------------------------------
        */

        date_default_timezone_set('Asia/Jakarta');


        /*
        |--------------------------------------------------------------------------
        | AUTO UPDATE TERLAMBAT
        |--------------------------------------------------------------------------
        */

        ModelPeminjaman::where(
            'status',
            'approved'
        )

        ->whereDate(
            'tanggal_kembali',
            '<',
            Carbon::today('Asia/Jakarta')
        )

        ->update([
            'status' => 'terlambat'
        ]);


        /*
        |--------------------------------------------------------------------------
        | DATA PENGEMBALIAN
        |--------------------------------------------------------------------------
        */

        $data =
        ModelPeminjaman::with([
            'alat',
            'user'
        ])

        ->where(
            'user_id',
            auth()->id()
        )

        /*
        |--------------------------------------------------------------------------
        | JANGAN HILANGKAN DATA SELESAI
        |--------------------------------------------------------------------------
        */

        ->whereIn('status', [
            'approved',
            'terlambat',
            'menunggu_verifikasi',
            'dikembalikan',
            'selesai'
        ])

        ->latest()

        ->get();


        /*
        |--------------------------------------------------------------------------
        | STATISTIK
        |--------------------------------------------------------------------------
        */

        $peminjaman =
        ModelPeminjaman::where(
            'user_id',
            auth()->id()
        )->count();


        $pending =
        ModelPeminjaman::where(
            'user_id',
            auth()->id()
        )

        ->where(
            'status',
            'pending'
        )

        ->count();


        $approved =
        ModelPeminjaman::where(
            'user_id',
            auth()->id()
        )

        ->whereIn('status', [
            'approved',
            'terlambat'
        ])

        ->count();


        $pengembalian =
        ModelPeminjaman::where(
            'user_id',
            auth()->id()
        )

        ->where(
            'status',
            'menunggu_verifikasi'
        )

        ->count();


        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'peminjam.pengembalian.index',
            compact(
                'data',
                'peminjaman',
                'pending',
                'approved',
                'pengembalian'
            )
        );

    }



    /*
    |--------------------------------------------------------------------------
    | KEMBALIKAN BARANG
    |--------------------------------------------------------------------------
    */

    public function kembalikan($id)
    {

        /*
        |--------------------------------------------------------------------------
        | WAKTU INDONESIA
        |--------------------------------------------------------------------------
        */

        date_default_timezone_set('Asia/Jakarta');


        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA
        |--------------------------------------------------------------------------
        */

        $pinjam =
        ModelPeminjaman::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | VALIDASI PEMILIK
        |--------------------------------------------------------------------------
        */

        if(
            $pinjam->user_id
            !=
            auth()->id()
        )
        {

            return back()
            ->with(
                'error',
                'Akses ditolak'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | VALIDASI STATUS
        |--------------------------------------------------------------------------
        */

        if(
            $pinjam->status != 'approved'
            &&
            $pinjam->status != 'terlambat'
        )
        {

            return back()
            ->with(
                'error',
                'Barang tidak bisa dikembalikan'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | VALIDASI BELUM WAKTUNYA
        |--------------------------------------------------------------------------
        | TIDAK BOLEH KEMBALIKAN
        | SEBELUM TANGGAL KEMBALI
        |--------------------------------------------------------------------------
        */

        $sekarang =
        Carbon::now('Asia/Jakarta');

        $tanggalKembali =
        Carbon::parse(
            $pinjam->tanggal_kembali,
            'Asia/Jakarta'
        )->endOfDay();


        if(
            $sekarang->lt($tanggalKembali)
        )
        {

            return back()
            ->with(
                'error',
                'Belum waktunya pengembalian'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE STATUS
        |--------------------------------------------------------------------------
        */

        $pinjam->status =
        'menunggu_verifikasi';


        /*
        |--------------------------------------------------------------------------
        | SIMPAN TANGGAL PENGEMBALIAN ASLI
        |--------------------------------------------------------------------------
        */

        $pinjam->tanggal_dikembalikan =
        Carbon::now('Asia/Jakarta');


        $pinjam->save();


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return back()
        ->with(
            'success',
            'Barang berhasil dikembalikan dan menunggu verifikasi petugas'
        );

    }

}