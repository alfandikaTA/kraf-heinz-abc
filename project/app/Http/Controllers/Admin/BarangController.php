<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
                $barang = Barang::find($request->id);
                $barang->nama = $request->nama;
                $barang->quantity = $request->quantity;
                $barang->harga = $request->harga;
                if ($request->hasFile('image')) {
                    $barang->delete_image();
                    $image = $request->file('image');
                    $name = rand(1000, 9999) . $image->getClientOriginalName();
                    $image->move('project/public/images/', $name);
                    $barang->image = $name;
                }
                $barang->save();
                return redirect()->route('admin.barang')->with('success', 'Barang berhasil diubah');
            } else {
                $barang = new Barang();
                $barang->nama = $request->nama;
                $barang->quantity = $request->quantity;
                $barang->harga = $request->harga;
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $name = rand(1000, 9999) . $image->getClientOriginalName();
                    $image->move('project/public/images/', $name);
                    $barang->image = $name;
                }
                $barang->save();
                return redirect()->route('admin.barang')->with('success', 'Barang berhasil disimpan');
            }
        } else {
            return redirect()->route('admin.barang')->with('error', 'Kesalahan mengisi data barang');
        }
    }

    public function delete(Request $request, $id)
    {
        $bar = Barang::findOrFail($id);
        $bar->delete_image();
        $bar->delete();

        if ($bar) {
            return redirect()->route('admin.barang')->with('success', 'Barang berhasil di hapus');
        } else {
            return redirect()->route('admin.barang')->with('error', 'Kesalahan meghapus data barang');
        }
    }
}