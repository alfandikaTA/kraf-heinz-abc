<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.dashboard.toko', ['users' => $users]);
    }

    public function update(Request $request)
    {
        if ($request->id) {
            $tok = User::findOrFail($request->id);
            $tok->update($request->except(['id']));
            return redirect()->route('admin.toko')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->route('admin.toko')->with('error', 'Kesalahan mengisi data toko');
        }
    }

    public function delete(Request $request, $id)
    {
        $tok = User::findOrFail($id);
        $tok->delete();

        if ($tok) {
            return redirect()->route('admin.toko')->with('success', 'Data Toko berhasil di hapus');
        } else {
            return redirect()->route('admin.toko')->with('error', 'Kesalahan meghapus data Toko');
        }
    }
}