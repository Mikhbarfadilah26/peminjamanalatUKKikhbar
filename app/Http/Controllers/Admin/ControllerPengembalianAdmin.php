<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelPeminjaman;

class ControllerPengembalianAdmin extends Controller
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
            'admin.pengembalian.index',
            compact('data')
        );

    }

}