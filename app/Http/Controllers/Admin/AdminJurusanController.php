<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class AdminJurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::latest()->get();
        return view('admin.jurusan.index', [
            'jurusans' => $jurusans,
        ]);
    }

    public function create()
    {
        return view('admin.jurusan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:jurusans,kode',
            'nama' => 'required'
        ], [
            'kode.required' => 'Kode Jurusan wajib diisi',
            'kode.unique' => 'Kode Jurusan sudah tersedia',
            'nama.required' => 'Nama Jurusan wajib diisi',
        ]);

        Jurusan::create($validated);

        return redirect()->route('data-jurusan.index')->with('success', 'Selamat ! Anda berhasil menambahkan data');
    }

    public function edit($id)
    {
        return view('admin.jurusan.edit', [
            'jurusans' => Jurusan::where('id', $id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:jurusans,kode',
            'nama' => 'required'
        ], [
            'kode.required' => 'Kode Jurusan wajib diisi',
            'kode.unique' => 'Kode Jurusan sudah tersedia',
            'nama.required' => 'Nama Jurusan wajib diisi',
        ]);

        Jurusan::where('id', $id)->update($validated);

        return redirect()->route('data-jurusan.index')->with('success', 'Selamat ! Anda berhasil memperbaharui data');
    }

    public function destroy($id)
    {
        $jurusans = Jurusan::where('id', $id)->first();
        $jurusans->delete();

        return redirect()->route('data-jurusan.index')->with('success', 'Selamat ! Anda berhasil menghapus data');
    }
}
