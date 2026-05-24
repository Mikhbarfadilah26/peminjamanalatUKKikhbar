<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelPeminjaman;

class ControllerPeminjamanAdmin extends Controller
{
    public function index()
    {
        $data =
        ModelPeminjaman::with(
            'user',
            'alat'
        )
        ->latest()
        ->get();

        return view(
            'admin.peminjaman.index',
            compact('data')
        );
    }
}