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
            if ($request->id) {
                $bar = Barang::findOrFail($request->id);
                $bar->update($request->except(['id']));
                return redirect()->route('admin.barang')->with('success', 'Barang berhasil diubah');
            }else {
                Barang::create($request->all());
                return redirect()->route('admin.barang')->with('success', 'Barang berhasil disimpan');
            }
        }else {
            return redirect()->route('admin.barang')->with('error', 'Kesalahan mengisi data barang');
        }
    }

    public function delete(Request $request, $id)
    {
        $bar = Barang::findOrFail($id);
        $bar->delete();

        if ($bar) {
            return redirect()->route('admin.barang')->with('success', 'Barang berhasil di hapus');
        } else {
            return redirect()->route('admin.barang')->with('error', 'Kesalahan meghapus data barang');
        }
    }
}
