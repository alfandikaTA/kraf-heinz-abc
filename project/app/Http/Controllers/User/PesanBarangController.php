<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\transaksi;
use App\Models\detail_transaksi;
use App\Models\User;
use Session;

class PesanBarangController extends Controller
{

    public function indexbarang()
    {
        $barang = Barang::all();
        return view('user.dashboard.pesanbarang', ['barangs' => $barang]);
    }


    public function index()
    {
        $transaksi = Auth::guard('user')->user()->transaksi;
        return view('user.dashboard.nota', ['transaksis' => $transaksi]);
    }

    public function bayar()
    {
        // Pengecekan apakah di dalam keranjang ada barang ?
        if ($carts = Session::get('cart')) {

            // Buat transaksi
            // $transaksiId = User::find(1)->transaksi()->create();
            $transaksiId = Auth::guard('user')->user()->transaksi()->create();

            // Mengambil semua data barang, dan memasukkan nya ke dalam array
            $data = array();
            foreach ($carts as $barang) {
                $item = [
                    "barang_id" => $barang['id'],
                    "quantity" => $barang['quantity']
                ];
                array_push($data, $item);
            }

            // Masukan data barang yang ada di kerjangan kedalam detail transaksi 
            $transaksiId->transaksi_detail()->createMany($data);
            Session::flash('success', 'Berhasil membayar');
            return redirect()->route('user.nota');
        }

        return redirect()->back();
    }

    public function cart()
    {
        return view('user.dashboard.cart');
    }

    public function nota()
    {
        // $transaksi = User::find(1)->transaksi()->get();
        $transaksi = Auth::guard('user')->user->transaksi()->get();
        return view('user.dashboard.nota', ['transaksis' => $transaksi]);
    }
}