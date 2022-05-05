<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;

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

    public function user_update_parent(Request $request, $id)
    {
        // request
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'image|file',
            'email' => 'required|string|email|max:255',
            'is_admin' => 'boolean'
        ]);

        $data = [
            'name' => $request->name,
            'img' => $request->file('img'),
            'email' => $request->email,
            'is_admin' => $request->is_admin,
        ];

        if ($request->is_admin == null) {
            $data['is_admin'] = true;
        }

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
    }

    public function user_update(Request $request, $id)
    {
        $this->user_update_parent($request, $id);
        return redirect()->intended('admin/dashboard/user');
    }

    public function admin_profile(User $id)
    {
        if (auth()->user()->id != $id->id) {
            return redirect()->route('admin.profile', auth()->user()->id);
        }

        return view('admin.dashboard.profile', ['user' => $id]);
    }

    public function profile_update(Request $request, $id)
    {
        $this->user_update_parent($request, $id);
        return redirect()->intended('admin/profile/' . $id);
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
