<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\transaksi;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('admin.dashboard.pesanan', ['transaksis' => $transaksi]);
    }
    public function update(Request $request)
    {
        if ($request->id) {
            $tok = Transaksi::findOrFail($request->id);
            $tok->update($request->except(['id']));
            return redirect()->route('admin.pesanan')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->route('admin.pesanan')->with('error', 'Kesalahan mengisi data toko');
        }
    }
}