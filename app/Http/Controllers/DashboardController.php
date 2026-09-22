<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'user' => Auth::user(),
        ]);
    }

    public function aulas()
    {
        $aulas = Aula::latest()->get();

        return view('aulas.index', [
            'user' => Auth::user(),
            'aulas' => $aulas,
        ]);
    }
}