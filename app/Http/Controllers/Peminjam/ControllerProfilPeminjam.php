<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ControllerProfilPeminjam extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('peminjam.profil.index', compact('user'));
    }
}