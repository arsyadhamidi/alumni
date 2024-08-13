<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    public function create()
    {
        return view('admin.users.create', [
            'levels' => Level::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'level_id' => 'required',
            'telp' => 'required|min:10',
        ], [
            'name.required' => 'Nama Lengkap wajib diisi',
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah tersedia',
            'level_id.required' => 'Status Autentikasi wajib diisi',
            'telp.required' => 'Telepon wajib diisi',
            'telp.min' => 'Telepon minimal 10 karakter',
        ]);

        // dd($validated);

        $validated['password'] = bcrypt('12345678');

        User::create($validated);

        return redirect()->route('data-user.index')->with('success', 'Selamat ! Anda berhasil menambahkan data');
    }

    public function edit($id)
    {
        return view('admin.users.edit', [
            'levels' => Level::latest()->get(),
            'users' => User::where('id', $id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'level_id' => 'required',
            'telp' => 'required|min:10',
        ], [
            'name.required' => 'Nama Lengkap wajib diisi',
            'level_id.required' => 'Status Autentikasi wajib diisi',
            'telp.required' => 'Telepon wajib diisi',
            'telp.min' => 'Telepon minimal 10 karakter',
        ]);

        $validated['password'] = bcrypt('12345678');

        User::where('id', $id)->update($validated);

        return redirect()->route('data-user.index')->with('success', 'Selamat ! Anda berhasil memperbaharui data');
    }

    public function destroy($id)
    {
        $users = User::where('id', $id)->first();
        $users->delete();

        return redirect()->route('data-user.index')->with('success', 'Selamat ! Anda berhasil menghapus data');
    }
}
