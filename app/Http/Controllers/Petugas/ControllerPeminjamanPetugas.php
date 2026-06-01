<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\ModelPeminjaman;
use App\Models\ModelAlat;
use Illuminate\Http\Request;

class ControllerPeminjamanPetugas extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $data = ModelPeminjaman::with([
            'user',
            'alat'
        ])
        ->latest()
        ->get();

        return view(
            'petugas.peminjaman.index',
            compact('data')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | APPROVE
    |--------------------------------------------------------------------------
    */
    public function approve($id)
    {
        $pinjam = ModelPeminjaman::with('user')->findOrFail($id);

        if ($pinjam->status != 'pending') {

            return back()->with(
                'error',
                'Status peminjaman sudah diproses'
            );
        }

        $alat = ModelAlat::findOrFail($pinjam->alat_id);

        if ($alat->stok < $pinjam->jumlah) {

            return back()->with(
                'error',
                'Stok alat tidak mencukupi'
            );
        }

        // kurangi stok
        $alat->update([
            'stok' => $alat->stok - $pinjam->jumlah
        ]);

        // update status
        $pinjam->update([
            'status' => 'approved'
        ]);

        return back()->with(
            'success',
            '✅ Anda telah menyetujui peminjaman atas nama ' .
            ($pinjam->user->nama ?? 'Peminjam')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | REJECT
    |--------------------------------------------------------------------------
    */
    public function reject($id)
    {
        $pinjam = ModelPeminjaman::with('user')->findOrFail($id);

        if ($pinjam->status != 'pending') {

            return back()->with(
                'error',
                'Status peminjaman sudah diproses'
            );
        }

        $pinjam->update([
            'status' => 'rejected'
        ]);

        return back()->with(
            'error',
            '❌ Anda telah menolak peminjaman atas nama ' .
            ($pinjam->user->nama ?? 'Peminjam')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $data = ModelPeminjaman::with([
            'user',
            'alat'
        ])->findOrFail($id);

        return view(
            'petugas.peminjaman.edit',
            compact('data')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|numeric|min:1',
            'tanggal_pinjam' => 'required'
        ]);

        $pinjam = ModelPeminjaman::findOrFail($id);

        $pinjam->update([
            'jumlah' => $request->jumlah,
            'tanggal_pinjam' => $request->tanggal_pinjam
        ]);

        return redirect()
            ->route('petugas.peminjaman')
            ->with(
                'success',
                'Data peminjaman berhasil diupdate'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $pinjam = ModelPeminjaman::with('user')->findOrFail($id);

        if ($pinjam->status == 'approved') {

            $alat = ModelAlat::findOrFail($pinjam->alat_id);

            $alat->update([
                'stok' => $alat->stok + $pinjam->jumlah
            ]);
        }

        $nama = $pinjam->user->nama ?? 'Peminjam';

        $pinjam->delete();

        return back()->with(
            'success',
            'Data peminjaman atas nama ' . $nama . ' berhasil dihapus'
        );
    }
}