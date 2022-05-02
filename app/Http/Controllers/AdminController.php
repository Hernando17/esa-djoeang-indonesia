<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data = [
            'count_users' => User::count(),
        ];

        return view('admin.dashboard.index', compact('data'));
    }

    public function admin_profile($id)
    {
        $data = [
            'profile' => user::find($id),
        ];

        return view('admin.dashboard.profile', compact('data'));
    }

    public function user()
    {
        return view('admin.dashboard.user.index', [
            'title' => 'User | Data',
            'users' => User::all(),
        ]);
    }

    public function user_delete($id)
    {
        User::find($id)->delete();
        return redirect()->intended('admin/dashboard/user');
    }

    public function user_update(Request $request, $id)
    {
        // dump session name
        dd($request->session()->get('name'));


        // request
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'image|file',
            'email' => 'required|string|email|max:255',
            'is_admin' => 'required|boolean'
        ]);

        $data = [
            'name' => $request->name,
            'img' => $request->file('img'),
            'email' => $request->email,
            'is_admin' => $request->is_admin,
        ];



        // Update
        if ($request->file('img') != null) {
            $data['img'] = Storage::putFile('profile', $data['img']);
        } else {
            $data['img'] = User::find($id)->img;
        }

        $user = User::find($id);

        // Hapus 
        if ($user->img != 'profile/default.jpg') {
            if ($data['img'] != $user->img) {
                Storage::delete($user->img);
            }
        }

        User::find($id)->update($data);

        return redirect()->intended('admin/dashboard/user');
    }

    public function user_resetpassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|same:password_confirm',
            'password_confirm' => 'required|string|min:6',
        ]);

        $user = User::find($request->id);
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->intended('admin/dashboard/index');
    }
}
