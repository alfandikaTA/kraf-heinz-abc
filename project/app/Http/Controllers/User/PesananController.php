<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\transaksi;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('user.dashboard.pesanan', ['transaksis' => $transaksi]);
        // return view('user.dashboard.pesanan');
    }
}