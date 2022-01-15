<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
<<<<<<< HEAD
}
=======
    public function login(Request $request)
    {
        $credentials = $request->only(['username','password']);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard')->with('message', 'Berhasil login');
        };
        return redirect()->route('admin.login')->with('error', 'Gagal login, username / password salah');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
>>>>>>> 2f5b05a93165cc49e08f040fb2ad4c8c863c6778
