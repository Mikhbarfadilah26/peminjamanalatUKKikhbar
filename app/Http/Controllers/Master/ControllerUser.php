<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\ModelUser;

use Illuminate\Support\Facades\Hash;

class ControllerUser extends Controller
{
    public function index()
    {
        $data = ModelUser::latest()->get();

        return view('admin.user.index', compact('data'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'role'     => 'required'
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {

            $foto = time() . '.' . $request->foto->extension();

            $request->foto->move(
                public_path('foto/user'),
                $foto
            );
        }

        ModelUser::create([
            'nama'     => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'foto'     => $foto,
            'role'     => $request->role
        ]);

        return redirect('/admin/user')
            ->with('success', 'Data user berhasil ditambah');
    }

    public function edit($id)
    {
        $data = ModelUser::findOrFail($id);

        return view('admin.user.edit', compact('data'));
    }

    public function show($id)
    {
        $data = ModelUser::findOrFail($id);

        return view('admin.user.show', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = ModelUser::findOrFail($id);

        $request->validate([
            'nama'     => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'role'     => 'required'
        ]);

        $foto = $data->foto;

        if ($request->hasFile('foto')) {

            if ($data->foto && file_exists(public_path('foto/user/' . $data->foto))) {

                unlink(public_path('foto/user/' . $data->foto));
            }

            $foto = time() . '.' . $request->foto->extension();

            $request->foto->move(
                public_path('foto/user'),
                $foto
            );
        }

        $update = [
            'nama'     => $request->nama,
            'username' => $request->username,
            'foto'     => $foto,
            'role'     => $request->role
        ];

        if ($request->password) {

            $update['password'] = Hash::make($request->password);
        }

        $data->update($update);

        return redirect('/admin/user')
            ->with('success', 'Data user berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = ModelUser::findOrFail($id);

        if ($data->foto && file_exists(public_path('foto/user/' . $data->foto))) {

            unlink(public_path('foto/user/' . $data->foto));
        }

        $data->delete();

        return redirect('/admin/user')
            ->with('success', 'Data user berhasil dihapus');
    }
}
