<?php

namespace App\Http\Controllers\Pengurus;

use App\Models\Acara;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengurusAcaraController extends Controller
{
    public function index()
    {
        $acaras = Acara::latest()->get();
        return view('pengurus.acara.index', [
            'acaras' => $acaras,
        ]);
    }

    public function create()
    {
        return view('pengurus.acara.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'jumlah' => 'required',
            'jadwal' => 'required',
        ], [
            'nama.required' => 'Nama Acara wajib diisi',
            'jumlah.required' => 'Jumlah Acara wajib diisi',
            'jadwal.required' => 'Jadwal Acara wajib diisi',
        ]);

        Acara::create($validated);

        return redirect()->route('pengurus-acara.index')->with('success', 'Selamat ! Anda berhasil menambahkan data');
    }

    public function edit($id)
    {
        return view('pengurus.acara.edit', [
            'acaras' => Acara::where('id', $id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'jumlah' => 'required',
            'jadwal' => 'required',
        ], [
            'nama.required' => 'Nama Acara wajib diisi',
            'jumlah.required' => 'Jumlah Acara wajib diisi',
            'jadwal.required' => 'Jadwal Acara wajib diisi',
        ]);

        Acara::where('id', $id)->update($validated);

        return redirect()->route('pengurus-acara.index')->with('success', 'Selamat ! Anda berhasil memperbaharui data');
    }

    public function destroy($id)
    {
        $acaras = Acara::where('id', $id)->first();
        $acaras->delete();

        return redirect()->route('pengurus-acara.index')->with('success', 'Selamat ! Anda berhasil menghapus data');
    }
}
