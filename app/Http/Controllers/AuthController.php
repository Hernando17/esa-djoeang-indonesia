<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json(['status' => 'success'], 200);
        }
        return response()->json(['status' => 'fail'], 200);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function register_act(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'same:confirm_password'],
            'confirm_password' => ['required', 'string', 'min:8'],
        ]);

        $data = [
            'is_admin' => 0,
            'img' => "profile/default.jpg",
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];

        if (!empty($request->is_admin)) {
            if ($request->is_admin == true) {
                $data['is_admin'] = 1;
            } else {
                $data['is_admin'] = 0;
            }
        }

        User::create($data);
    }

    public function user_add(Request $request)
    {
        $this->register_act($request);
        return redirect()->intended('admin/dashboard/user');
    }

    public function register(Request $request)
    {
        $this->register_act($request);
        return redirect()->intended('/');
    }
}
