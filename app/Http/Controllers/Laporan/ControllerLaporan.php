<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelPeminjaman;

class ControllerLaporan extends Controller
{
    public function index(Request $request)
    {
        $mulai  = $request->mulai;
        $sampai = $request->sampai;
        $status = $request->status;

        $data = ModelPeminjaman::with([
            'user',
            'alat'
        ]);

        if ($mulai && $sampai) {

            $data->whereBetween(
                'created_at',
                [
                    $mulai . ' 00:00:00',
                    $sampai . ' 23:59:59'
                ]
            );
        }

        if ($status && $status != 'semua') {

            $data->where(
                'status',
                $status
            );
        }

        $data = $data
            ->latest()
            ->get();

        return view(
            'admin.laporan.index',
            compact(
                'data',
                'mulai',
                'sampai',
                'status'
            )
        );
    }

    public function cetak(Request $request)
    {
        $mulai  = $request->mulai;
        $sampai = $request->sampai;
        $status = $request->status;

        $data = ModelPeminjaman::with([
            'user',
            'alat'
        ]);

        if ($mulai && $sampai) {

            $data->whereBetween(
                'created_at',
                [
                    $mulai . ' 00:00:00',
                    $sampai . ' 23:59:59'
                ]
            );
        }

        if ($status && $status != 'semua') {

            $data->where(
                'status',
                $status
            );
        }

        $data = $data
            ->latest()
            ->get();

        return view(
            'admin.laporan.cetak',
            compact(
                'data',
                'mulai',
                'sampai',
                'status'
            )
        );
    }
}