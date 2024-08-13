<?php

namespace App\Http\Controllers\Alumni;

use App\Models\Acara;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlumniAcaraController extends Controller
{
    public function index()
    {
        $acaras = Acara::latest()->get();
        return view('alumni.acara.index', [
            'acaras' => $acaras,
        ]);
    }
}
