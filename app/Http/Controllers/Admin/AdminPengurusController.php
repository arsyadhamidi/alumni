<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengurus;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPengurusController extends Controller
{
    public function index()
    {
        $pengurus = Pengurus::latest()->get();
        return view('admin.pengurus.index', [
            'pengurus' => $pengurus,
        ]);
    }

    public function create()
    {
        $users = User::latest()->get();
        return view('admin.pengurus.create', [
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'users_id' => 'required',
            'nama' => 'required',
            'telp' => 'required',
            'jekel' => 'required',
            'jabatan' => 'required',
        ], [
            'users_id.required' => 'Users Registrasi wajib diisi',
            'nama.required' => 'Nama Lengkap wajib diisi',
            'telp.required' => 'Telepon wajib diisi',
            'jekel.required' => 'Jenis Kelamin wajib diisi',
            'jabatan.required' => 'Jabatan wajib diisi',
        ]);

        Pengurus::create($validated);

        return redirect()->route('data-pengurus.index')->with('success', 'Selamat ! Anda berhasil menambahkan data');
    }

    public function edit($id)
    {
        $users = User::latest()->get();
        return view('admin.pengurus.edit', [
            'pengurus' => Pengurus::where('id', $id)->first(),
            'users' => $users,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'users_id' => 'required',
            'nama' => 'required',
            'telp' => 'required',
            'jekel' => 'required',
            'jabatan' => 'required',
        ], [
            'users_id.required' => 'Users Registrasi wajib diisi',
            'nama.required' => 'Nama Lengkap wajib diisi',
            'telp.required' => 'Telepon wajib diisi',
            'jekel.required' => 'Jenis Kelamin wajib diisi',
            'jabatan.required' => 'Jabatan wajib diisi',
        ]);

        Pengurus::where('id', $id)->update($validated);

        return redirect()->route('data-pengurus.index')->with('success', 'Selamat ! Anda berhasil memperbaharui data');
    }

    public function destroy($id)
    {
        $pengurus = Pengurus::where('id', $id)->first();
        $pengurus->delete();

        return redirect()->route('data-pengurus.index')->with('success', 'Selamat ! Anda berhasil menghapus data');
    }
}
