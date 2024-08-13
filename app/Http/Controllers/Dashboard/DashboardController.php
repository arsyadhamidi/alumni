<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Alumni;
use App\Models\Donasi;
use App\Models\Jurusan;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $auth = Auth::user();
        $users = User::where('level_id', '!=', '1')->count();
        $alumnis = Alumni::count();
        $pengurus = Pengurus::count();
        $donasis = Donasi::sum('jumlah_donasi');
        $jurusans = Jurusan::latest()->get();

        $biodatas = Alumni::where('id', $auth->alumni_id)->first();
        $penguruss = Pengurus::where('users_id', $auth->id)->first();
        return view('admin.dashboard.index', [
            'users' => $users,
            'alumnis' => $alumnis,
            'pengurus' => $pengurus,
            'donasis' => $donasis,
            'biodatas' => $biodatas,
            'jurusans' => $jurusans,
            'penguruss' => $penguruss,
        ]);
    }

    public function biodata($id)
    {
        $jurusans = Jurusan::latest()->get();
        $biodatas = Alumni::where('id', $id)->first();
        return view('alumni.edit', [
            'biodatas' => $biodatas,
            'jurusans' => $jurusans,
        ]);
    }

    public function updatebiodata(Request $request)
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

        Alumni::where('id', Auth()->user()->alumni_id)->update($validated);

        return redirect('dashboard')->with('success', 'Selamat ! Anda berhasil memperbaharui data');
    }
}
