<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainAkademikAbdiNegaraController extends Controller
{
    public function index()
    {
        return view('main.akademik-abdi-negara.index', [
            'title' => 'Akademik Abdi Negara'
        ]);
    }
}
