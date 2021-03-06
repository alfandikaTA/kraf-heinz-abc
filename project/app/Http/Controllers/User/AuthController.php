<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Schema\Blueprint;
//use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Schema;
use App\Models\User;


class AuthController extends Controller
{
    public function index()
    {
        return view('user.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('user')->attempt($credentials)) {
            return redirect()->route('user.dashboard')->with('message', 'Berhasil login');
        };
        return redirect()->route('user.login')->with('error', 'Gagal login, username / password salah');
    }


    public function indexRegister()
    {
        return view('user.register');
    }


    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama_toko' => 'required',
            'name' => 'required',
            'telephone' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validated) {
            User::create($request->all());
            return redirect()->route('user.login')->with('success', 'Berhasil register, silahkan login');
        } else {
            return redirect()->route('user.register')->with('error', 'Kesalahan mengisi data Toko');
        }
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('user.login');
    }
}