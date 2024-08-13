<?php

namespace App\Http\Controllers\Alumni;

use App\Models\Donasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AlumniDonasiController extends Controller
{
    public function index()
    {
        $donasis = Donasi::where('alumni_id', Auth::user()->alumni_id)->latest()->get();
        return view('alumni.donasi.index', [
            'donasis' => $donasis,
        ]);
    }
}
