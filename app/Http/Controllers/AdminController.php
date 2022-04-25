<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard.index', [
            'title' => 'Dashboard Admin',
        ]);
    }

    public function user()
    {
        return view('admin.dashboard.user.index', [
            'title' => 'User | Data',
            'users' => User::all(),
        ]);
    }

    public function user_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'is_admin' => 'required|boolean'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => $request->is_admin,
        ];

        User::find($id)->update($data);
    }

    public function user_delete($id)
    {
        User::find($id)->delete();
        return redirect()->intended('admin/dashboard/user/index');
    }
}
