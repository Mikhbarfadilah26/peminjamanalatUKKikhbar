<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelPeminjaman;
use Illuminate\Http\Request;

class ControllerPeminjamanAdmin extends Controller
{
    public function index()
    {
        $data = ModelPeminjaman::with('user', 'alat')
                    ->latest()
                    ->get();

        return view(
            'admin.peminjaman.index',
            compact('data')
        );
    }

    // APPROVE
    public function approve($id)
    {
        $peminjaman = ModelPeminjaman::findOrFail($id);

        $peminjaman->update([
            'status' => 'approved'
        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Peminjaman berhasil di-approve.'
            );
    }

    // REJECT
    public function reject($id)
    {
        $peminjaman = ModelPeminjaman::findOrFail($id);

        $peminjaman->update([
            'status' => 'rejected'
        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Peminjaman berhasil ditolak.'
            );
    }

    // DELETE
    public function destroy($id)
    {
        $peminjaman = ModelPeminjaman::findOrFail($id);

        $peminjaman->delete();

        return redirect()
            ->back()
            ->with(
                'success',
                'Data berhasil dihapus.'
            );
    }
}