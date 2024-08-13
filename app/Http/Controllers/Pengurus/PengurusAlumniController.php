<?php

namespace App\Http\Controllers\Pengurus;

use App\Models\User;
use App\Models\Alumni;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengurusAlumniController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::latest()->get();
        return view('pengurus.alumni.index', [
            'jurusans' => $jurusans,
        ]);
    }

    public function alumni($id)
    {
        $jurusans = Jurusan::where('id', $id)->first();
        $alumnis = Alumni::where('jurusan_id', $id)->latest()->get();
        return view('pengurus.alumni.alumni', [
            'jurusans' => $jurusans,
            'alumnis' => $alumnis,
        ]);
    }

    public function create($id)
    {
        $jurusans = Jurusan::where('id', $id)->first();
        return view('pengurus.alumni.create', [
            'jurusans' => $jurusans,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jurusan_id' => 'required',
            'nisn' => 'required',
            'nama' => 'required',
            'jekel' => 'required',
            'tahunlulus' => 'required',
            'telp' => 'required',
        ], [
            'jurusan_id.required' => 'Jurusan wajib diisi',
            'nisn.required' => 'NISN wajib diisi',
            'nama.required' => 'Nama Lengkap wajib diisi',
            'jekel.required' => 'Jenis Kelamin wajib diisi',
            'tahunlulus.required' => 'Tahun Lulus wajib diisi',
            'telp.required' => 'Telepon wajib diisi',
        ]);

        $alumnis = Alumni::create($validated);

        $users = User::where('username', $request->nisn)->first();
        if(!empty($users)){
            return back()->with('error', 'Username sudah tersedia di users registrasi');
        }

        User::create([
            'name' => $request->nama ?? '-',
            'username' => $request->nisn,
            'password' => bcrypt('12345678'),
            'level_id' => '3',
            'telp' => $request->telp ?? '-',
            'alumni_id' => $alumnis->id
        ]);

        return redirect()->route('pengurus-alumni.alumni', $request->jurusan_id)->with('success', 'Selamat ! Anda berhasil menambahkan data');
    }

    public function edit($id)
    {
        return view('pengurus.alumni.edit', [
            'alumnis' => Alumni::where('id', $id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'jurusan_id' => 'required',
            'nisn' => 'required',
            'nama' => 'required',
            'jekel' => 'required',
            'tahunlulus' => 'required',
            'telp' => 'required',
        ], [
            'jurusan_id.required' => 'Jurusan wajib diisi',
            'nisn.required' => 'NISN wajib diisi',
            'nama.required' => 'Nama Lengkap wajib diisi',
            'jekel.required' => 'Jenis Kelamin wajib diisi',
            'tahunlulus.required' => 'Tahun Lulus wajib diisi',
            'telp.required' => 'Telepon wajib diisi',
        ]);

        Alumni::where('id', $id)->update($validated);

        return redirect()->route('pengurus-alumni.alumni', $request->jurusan_id)->with('success', 'Selamat ! Anda berhasil memperbaharui data');
    }

    public function destroy($id)
    {
        $alumnis = Alumni::where('id', $id)->first();
        $alumnis->delete();

        return back()->with('success', 'Selamat ! Anda berhasil menghapus data');
    }
}
