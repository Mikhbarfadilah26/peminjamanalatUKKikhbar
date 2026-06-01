<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use App\Models\ModelPeminjaman;
use App\Models\Pengembalian; // Pastikan model Pengembalian di-import di sini
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
        | UPDATE STATUS PEMINJAMAN
        |--------------------------------------------------------------------------
        */

        $pinjam->status = 'menunggu_verifikasi';
        $pinjam->save();


        /*
        |--------------------------------------------------------------------------
        | SIMPAN DATA KE TABEL PENGEMBALIAN (Sesuai Struktur Database)
        |--------------------------------------------------------------------------
        */

        // Menghitung hari keterlambatan jika status sebelumnya adalah 'terlambat'
        $hariKeterlambatan = 0;
        if ($sekarang->gt($tanggalKembali)) {
            $hariKeterlambatan = (int) $sekarang->diffInDays($tanggalKembali);
        }

        \Illuminate\Support\Facades\DB::table('pengembalians')->insert([
            'peminjaman_id'        => $pinjam->id,
            'tanggal_pengembalian' => $sekarang->toDateString(),
            'keterlambatan'        => $hariKeterlambatan,
            'denda'                => 0, // Kalkulasi denda bisa disesuaikan nanti jika ada aturan tarif denda
            'kondisi_kembali'      => 'baik',
            'catatan'              => 'Diajukan oleh peminjam',
            'created_at'           => $sekarang,
            'updated_at'           => $sekarang,
        ]);


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