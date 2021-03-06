<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showFormLogin()
    {
        return view('admin.login.login');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $data = [
            'email' => $email,
            'password' => $password
        ];
        if (Auth::attempt($data)) {
            return redirect()->route('index');
        }
        return back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
