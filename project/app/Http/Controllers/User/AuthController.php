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
        $credentials = $request->only(['username', 'password']);

        if (Auth::guard('user')->attempt($credentials)) {
            return redirect()->route('user.dashboard')->with('message', 'Berhasil login');
        };
        return redirect()->route('user.login')->with('error', 'Gagal login, username / password salah');
    }


    public function indexreq()
    {
        $register = User::all();
        return view('user.register', ['users' => $register]);
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
            return redirect()->route('user.register')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect()->route('user.register')->with('error', 'Kesalahan mengisi data Toko');
        }
    }
}