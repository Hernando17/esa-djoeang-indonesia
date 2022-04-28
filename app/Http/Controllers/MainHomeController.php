<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainHomeController extends Controller
{
    public function index()
    {
        return view('main.home.index', [
            'title' => 'Esa Juang Indonesia Foundation'
        ]);
    }

    public function login()
    {
        $data = [
            "title" => "Login"
        ];

        return view('main.login', $data);
    }
}
