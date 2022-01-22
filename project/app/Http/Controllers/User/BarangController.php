<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('user.dashboard.barang', ['barangs' => $barang]);
    }
}