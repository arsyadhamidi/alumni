<?php

namespace App\Http\Controllers\Pengurus;

use App\Models\Alumni;
use App\Models\Donasi;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PengurusDonasiController extends Controller
{
    public function index()
    {
        $donasis = Donasi::latest()->get();
        $last = Donasi::latest()->first();
        $sumDonasis = Donasi::sum('jumlah_donasi');
        return view('pengurus.donasi.index', [
            'donasis' => $donasis,
            'last' => $last,
            'sumDonasis' => $sumDonasis,
        ]);
    }

    public function create()
    {
        $alumnis = Alumni::latest()->get();
        $pengurus = Pengurus::latest()->get();
        return view('pengurus.donasi.create', [
            'alumnis' => $alumnis,
            'pengurus' => $pengurus,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'alumni_id' => 'required',
            'nama' => 'required',
            'tanggal' => 'required',
            'jumlah_donasi' => 'required',
        ], [
            'alumni_id.required' => 'Alumni wajib diisi',
            'nama.required' => 'Nama Donasi wajib diisi',
            'tanggal.required' => 'Tanggal Donasi wajib diisi',
            'jumlah_donasi.required' => 'Jumlah Donasi wajib diisi',
        ]);

        $pengurus = Pengurus::where('users_id', Auth()->user()->id)->first();
        $validated['pengurus_id'] = $pengurus->id;

        Donasi::create($validated);

        return redirect()->route('pengurus-donasi.index')->with('success', 'Selamat ! Anda berhasil menambahkan data');
    }

    public function edit($id)
    {
        $alumnis = Alumni::latest()->get();
        $pengurus = Pengurus::latest()->get();
        return view('pengurus.donasi.edit', [
            'donasis' => Donasi::where('id', $id)->first(),
            'alumnis' => $alumnis,
            'pengurus' => $pengurus,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'alumni_id' => 'required',
            'nama' => 'required',
            'tanggal' => 'required',
            'jumlah_donasi' => 'required',
        ], [
            'alumni_id.required' => 'Alumni wajib diisi',
            'nama.required' => 'Nama Donasi wajib diisi',
            'tanggal.required' => 'Tanggal Donasi wajib diisi',
            'jumlah_donasi.required' => 'Jumlah Donasi wajib diisi',
        ]);

        Donasi::where('id', $id)->update($validated);

        return redirect()->route('pengurus-donasi.index')->with('success', 'Selamat ! Anda berhasil memperbaharui data');
    }

    public function destroy($id)
    {
        $donasis = Donasi::where('id', $id)->first();
        $donasis->delete();

        return redirect()->route('pengurus-donasi.index')->with('success', 'Selamat ! Anda berhasil menghapus data');
    }
}
