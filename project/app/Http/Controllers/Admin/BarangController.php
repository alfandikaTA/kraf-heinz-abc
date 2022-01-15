<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('admin.dashboard.barang', ['barangs' => $barang]);
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'quantity' => 'required',
            'harga' => 'required',
        ]);

        if ($validated) {
            Barang::create($request->all());
            return redirect()->route('admin.barang')->with('success', 'Barang berhasil disimpan');
        }else {
            return redirect()->route('admin.barang')->with('error', 'Kesalahan mengisi data barang');
        }
    }
}
