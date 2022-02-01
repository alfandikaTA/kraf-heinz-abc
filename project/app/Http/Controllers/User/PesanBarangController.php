<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Detail_transaksi;
use App\Models\Header_transaksi;

class PesanBarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('user.dashboard.pesanbarang', ['barangs' => $barang]);

        // session()->forget("cart");
    }

    function do_tambah_cart($id)
    {
        $cart = session("cart");
        $barang = Barang::detail_barang($id);

        $cart["id"] = [
            "nama" => $barang->nama,
            "harga" => $barang->harga,
            "jumlah" => 1
        ];

        session(["cart" => $cart]);
        return redirect("/cart");
    }

    function cart()
    {
        //  session()->forget("cart");
        $cart = session("cart");
        return view("user.dashboard.cart")->with("cart", $cart);
    }

    function do_hapus_cart($id)
    {
        $cart = session("cart");
        unset($cart[$id]);
        session(["cart" => $cart]);
        return redirect("/cart");
    }

    function do_tambah_transaksi()
    {
        $cart = session("cart");
        $id_header_transaksi = Header_transaksi::tambah_header_transaksi();
        foreach ($cart as $ct => $val) {
            $id_barang = $ct;
            $jumlah = $val["jumlah"];
            Detail_transaksi::tambah_detail_transaksi($id_barang, $id_header_transaksi, $jumlah);
        }
        session()->forget("cart");
        return redirect("/cart");
    }
}