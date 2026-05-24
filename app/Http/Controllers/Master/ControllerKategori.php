<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\ModelKategori;

class ControllerKategori extends Controller
{
    public function index()
    {
        $data = ModelKategori::latest()->get();

        return view('admin.kategori.index', compact('data'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        ModelKategori::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi'     => $request->deskripsi,
        ]);

        return redirect('/admin/kategori')
            ->with('success', 'Data kategori berhasil ditambah');
    }

    public function show($id)
    {
        $data = ModelKategori::findOrFail($id);

        return view('admin.kategori.show', compact('data'));
    }

    public function edit($id)
    {
        $data = ModelKategori::findOrFail($id);

        return view('admin.kategori.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        $data = ModelKategori::findOrFail($id);

        $data->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi'     => $request->deskripsi,
        ]);

        return redirect('/admin/kategori')
            ->with('success', 'Data kategori berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = ModelKategori::findOrFail($id);

        $data->delete();

        return redirect('/admin/kategori')
            ->with('success', 'Data kategori berhasil dihapus');
    }
}