<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelAlat;
use App\Models\ModelKategori;

class ControllerAlat extends Controller
{
    // =========================
    // INDEX ADMIN
    // =========================
    public function index(Request $request)
    {
        $kategori = ModelKategori::all();

        $query = ModelAlat::with('kategori');

        // FILTER KATEGORI
        if ($request->filled('kategori_id')) {
            $query->where('kategori_id', $request->kategori_id);
        }

        // FILTER KONDISI
        if ($request->filled('kondisi')) {
            $query->where('kondisi', $request->kondisi);
        }

        $data = $query->latest()->paginate(10);

        return view('admin.alat.index', compact('data', 'kategori'));
    }

    // =========================
    // CREATE
    // =========================
    public function create()
    {
        $kategori = ModelKategori::all();

        return view('admin.alat.create', compact('kategori'));
    }

    // =========================
    // STORE
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'nama_alat'   => 'required',
            'stok'        => 'required|numeric',
            'kondisi'     => 'required',
            'status'      => 'required',
            'foto'        => 'nullable|image|max:2048',
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $foto = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('foto/alat'), $foto);
        }

        ModelAlat::create([
            'kategori_id' => $request->kategori_id,
            'nama_alat'   => $request->nama_alat,
            'stok'        => $request->stok,
            'kondisi'     => $request->kondisi,
            'status'      => $request->status,
            'foto'        => $foto
        ]);

        return redirect('/admin/alat')
            ->with('success', 'Data alat berhasil ditambahkan');
    }

    // =========================
    // SHOW
    // =========================
    public function show($id)
    {
        $data = ModelAlat::with('kategori')->findOrFail($id);

        return view('admin.alat.show', compact('data'));
    }

    // =========================
    // EDIT
    // =========================
    public function edit($id)
    {
        $data = ModelAlat::findOrFail($id);
        $kategori = ModelKategori::all();

        return view('admin.alat.edit', compact('data', 'kategori'));
    }

    // =========================
    // UPDATE
    // =========================
    public function update(Request $request, $id)
    {
        $data = ModelAlat::findOrFail($id);

        $request->validate([
            'kategori_id' => 'required',
            'nama_alat'   => 'required',
            'stok'        => 'required|numeric',
            'kondisi'     => 'required',
            'status'      => 'required',
            'foto'        => 'nullable|image|max:2048',
        ]);

        $foto = $data->foto;

        if ($request->hasFile('foto')) {

            if ($foto && file_exists(public_path('foto/alat/' . $foto))) {
                unlink(public_path('foto/alat/' . $foto));
            }

            $foto = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('foto/alat'), $foto);
        }

        $data->update([
            'kategori_id' => $request->kategori_id,
            'nama_alat'   => $request->nama_alat,
            'stok'        => $request->stok,
            'kondisi'     => $request->kondisi,
            'status'      => $request->status,
            'foto'        => $foto
        ]);

        return redirect('/admin/alat')
            ->with('success', 'Data alat berhasil diupdate');
    }

    // =========================
    // DELETE
    // =========================
    public function destroy($id)
    {
        $data = ModelAlat::findOrFail($id);

        if ($data->foto && file_exists(public_path('foto/alat/' . $data->foto))) {
            unlink(public_path('foto/alat/' . $data->foto));
        }

        $data->delete();

        return redirect('/admin/alat')
            ->with('success', 'Data alat berhasil dihapus');
    }

    // =========================
    // PETUGAS INDEX (FILTER KATEGORI + KONDISI)
    // =========================
    public function petugasIndex(Request $request)
    {
        $kategori = ModelKategori::all();

        $query = ModelAlat::with('kategori');

        // FILTER KATEGORI
        if ($request->filled('kategori_id')) {
            $query->where('kategori_id', $request->kategori_id);
        }

        // FILTER KONDISI
        if ($request->filled('kondisi')) {
            $query->where('kondisi', $request->kondisi);
        }

        $data = $query->latest()->paginate(12);

        return view('petugas.alat.index', compact('data', 'kategori'));
    }
}