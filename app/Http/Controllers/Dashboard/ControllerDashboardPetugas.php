<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\ModelPeminjaman;
use App\Models\ModelPengembalian;

class ControllerDashboardPetugas extends Controller
{
    public function index()
    {
        $peminjaman = ModelPeminjaman::count();

        $pengembalian = ModelPengembalian::count();

        $pending = ModelPeminjaman::where('status', 'pending')->count();

        $approved = ModelPeminjaman::where('status', 'approved')->count();

        $dikembalikan = ModelPengembalian::count();

        $terbaruPeminjaman = ModelPeminjaman::with(['user', 'alat'])
            ->latest()
            ->limit(5)
            ->get();

        return view('petugas.dashboard.index', compact(
            'peminjaman',
            'pengembalian',
            'pending',
            'approved',
            'dikembalikan',
            'terbaruPeminjaman'
        ));
    }
}