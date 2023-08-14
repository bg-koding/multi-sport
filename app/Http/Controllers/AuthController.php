<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->frist_name = $request->frist_name;
        $user->last_name = $request->last_name;
        $user->state_country = $request->state_country;
        $user->postal_zip = $request->postal_zip;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->password = bcrypt($request->password);
        $user->level = 'user';
        $user->save();

        return redirect('login');
    }

    public function login(Request $request)
    {
        $credentials =  $request->validate([
            'username' => 'required',
            'password' => 'required',

        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->level == 'admin') {
                return redirect()->intended('admin/dashboard');
            } else {
                return redirect()->intended('/');
            }
        }

        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
