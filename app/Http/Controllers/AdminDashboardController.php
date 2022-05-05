<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $data = [
            'count_users' => User::count(),
        ];

        return view('admin.dashboard.index', compact('data'));
    }
}
