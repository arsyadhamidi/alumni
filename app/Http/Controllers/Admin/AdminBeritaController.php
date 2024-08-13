<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('admin.berita.index', [
            'beritas' => $beritas,
        ]);
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'tanggal' => 'required',
            'subjudul' => 'required',
            'keterangan' => 'required',
            'gambar_berita' => 'required|mimes:png,jpg,jpeg|max:2048',
        ], [
            'judul.required' => 'Judul Berita wajib diisi',
            'tanggal.required' => 'Tanggal Berita wajib diisi',
            'subjudul.required' => 'Sub Judul Berita wajib diisi',
            'keterangan.required' => 'Keterangan Berita wajib diisi',
            'gambar_berita.required' => 'Gambar Berita wajib diisi',
            'gambar_berita.mimes' => 'Gambar Berita harus memiliki format PNG, JPEG, JPG',
            'gambar_berita.max' => 'Gambar Berita maksimal 2 MB',
        ]);

        if($request->file('gambar_berita'))
        {
            $validated['gambar_berita'] = $request->file('gambar_berita')->store('gambar_berita');
        }

        Berita::create($validated);

        return redirect()->route('data-berita.index')->with('success', 'Selamat ! Anda berhasil menambahkan data');
    }

    public function edit($id)
    {
        return view('admin.berita.edit', [
            'beritas' => Berita::where('id', $id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'tanggal' => 'required',
            'subjudul' => 'required',
            'keterangan' => 'required',
        ], [
            'judul.required' => 'Judul Berita wajib diisi',
            'tanggal.required' => 'Tanggal Berita wajib diisi',
            'subjudul.required' => 'Sub Judul Berita wajib diisi',
            'keterangan.required' => 'Keterangan Berita wajib diisi',
        ]);

        $beritas = Berita::where('id', $id)->first();

        if($request->file('gambar_berita'))
        {
            if($beritas->gambar_berita){
                Storage::delete($beritas->gambar_berita);
            }
            $validated['gambar_berita'] = $request->file('gambar_berita')->store('gambar_berita');
        }else{
            $validated['gambar_berita'] = $beritas->gambar_berita;
        }

        $beritas->update($validated);

        return redirect()->route('data-berita.index')->with('success', 'Selamat ! Anda berhasil memperbaharui data');
    }

    public function destroy($id)
    {
        $beritas = Berita::where('id', $id)->first();
        if($beritas->gambar_berita){
            Storage::delete($beritas->gambar_berita);
        }
        $beritas->delete();

        return redirect()->route('data-berita.index')->with('success', 'Selamat ! Anda berhasil menghapus data');
    }
}
