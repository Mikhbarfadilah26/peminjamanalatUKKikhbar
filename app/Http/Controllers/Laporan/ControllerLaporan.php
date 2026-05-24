<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelPeminjaman;
use App\Models\ModelPengembalian;

class ControllerLaporan extends Controller
{
    public function index(Request $request)
    {
        $mulai = $request->mulai;
        $sampai = $request->sampai;

        $peminjaman = ModelPeminjaman::with(['user','alat'])
            ->when($mulai && $sampai, function($q) use ($mulai,$sampai){
                $q->whereBetween('created_at', [$mulai,$sampai]);
            })
            ->get();

        $pengembalian = ModelPengembalian::with('peminjaman.alat','peminjaman.user')
            ->when($mulai && $sampai, function($q) use ($mulai,$sampai){
                $q->whereBetween('created_at', [$mulai,$sampai]);
            })
            ->get();

        return view('admin.laporan.index', compact(
            'peminjaman',
            'pengembalian',
            'mulai',
            'sampai'
        ));
    }

    public function cetak(Request $request)
    {
        $mulai = $request->mulai;
        $sampai = $request->sampai;

        $peminjaman = ModelPeminjaman::with(['user','alat'])
            ->whereBetween('created_at', [$mulai,$sampai])
            ->get();

        $pengembalian = ModelPengembalian::with('peminjaman.alat','peminjaman.user')
            ->whereBetween('created_at', [$mulai,$sampai])
            ->get();

        return view('admin.laporan.cetak', compact(
            'peminjaman',
            'pengembalian',
            'mulai',
            'sampai'
        ));
    }
}