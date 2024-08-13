<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class AdminPekerjaanController extends Controller
{
    public function index()
    {
        $pekerjaans = Pekerjaan::latest()->get();
        return view('admin.pekerjaan.index', [
            'pekerjaans' => $pekerjaans,
        ]);
    }

    public function create()
    {
        $alumnis = Alumni::latest()->get();
        return view('admin.pekerjaan.create', [
            'alumnis' => $alumnis,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'alumni_id' => 'required',
            'nama' => 'required',
            'tempat' => 'required',
            'alamat' => 'required',
            'jenis_pekerjaan' => 'required',
        ], [
            'alumni_id.required' => 'Alumni wajib diisi',
            'nama.required' => 'Nama Pekerjaan wajib diisi',
            'tempat.required' => 'Tempat Pekerjaan wajib diisi',
            'alamat.required' => 'Alamat Pekerjaan wajib diisi',
            'jenis_pekerjaan.required' => 'Jenis Pekerjaan wajib diisi',
        ]);

        Pekerjaan::create($validated);

        return redirect()->route('data-pekerjaan.index')->with('success', 'Selamat ! Anda berhasil menambahkan data');
    }

    public function edit($id)
    {
        $alumnis = Alumni::latest()->get();
        return view('admin.pekerjaan.edit', [
            'pekerjaans' => Pekerjaan::where('id', $id)->first(),
            'alumnis' => $alumnis,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'alumni_id' => 'required',
            'nama' => 'required',
            'tempat' => 'required',
            'alamat' => 'required',
            'jenis_pekerjaan' => 'required',
        ], [
            'alumni_id.required' => 'Alumni wajib diisi',
            'nama.required' => 'Nama Pekerjaan wajib diisi',
            'tempat.required' => 'Tempat Pekerjaan wajib diisi',
            'alamat.required' => 'Alamat Pekerjaan wajib diisi',
            'jenis_pekerjaan.required' => 'Jenis Pekerjaan wajib diisi',
        ]);

        Pekerjaan::where('id', $id)->update($validated);

        return redirect()->route('data-pekerjaan.index')->with('success', 'Selamat ! Anda berhasil memperbaharui data');
    }

    public function destroy($id)
    {
        $pekerjaans = Pekerjaan::where('id', $id)->first();
        $pekerjaans->delete();

        return redirect()->route('data-pekerjaan.index')->with('success', 'Selamat ! Anda berhasil menghapus data');
    }
}
