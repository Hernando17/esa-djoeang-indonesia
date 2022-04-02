<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainHomeController extends Controller
{
    public function index()
    {
        return view('main.home.index', [
            'title' => 'Esa Djoeang Indonesia Foundation'
        ]);
    }
}
