<?php

namespace App\Http\Controllers\Secure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecureAccessController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('authout');

        $this->url = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]";
    }

    public function login()
    {
        return view('pages.auth.login');
    }

    public function login_post(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'status' => '1'])) {
            $code = "200";
            $message = "Sukses";
            $redirect = $this->url;
        } else {
            $code = "201";
            $message = "Gagal, Akses ditolak karena tidak sesuai";
            $redirect = null;
        }

        return [
            'code' => $code,
            'message' => $message,
            'redirect' => $redirect
        ];
    }

    public function authout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    }
}
