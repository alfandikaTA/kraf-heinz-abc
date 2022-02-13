<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use Session;
use \stdClass;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('user.dashboard.barang', ['barangs' => $barang]);
    }

    public function addToCart($id)
    {
        //Session::flush();
        $product = Barang::findOrFail($id);
        $cartItems = array();
        $cart = Session::get('cart');
        $dataItem = array(
            'nama' => $product->nama,
            'id' => $product->id,
            'harga' => $product->harga,
            'quantity' => 1
        );
        if (is_array($cart)) {
            $cartItems = $cart;
        }
        $indexItem = 0;
        $iscart = false;
        foreach ($cartItems as $item) {
            if ($item['id'] === $product->id) {
                $cartItems[$indexItem]['quantity'] = $item['quantity'] += 1;
                $iscart = true;
            };
            $indexItem++;
        }
        if ($iscart == false) {
            array_push($cartItems, $dataItem);
        }
        Session::put('cart', $cartItems);
        Session::flash('success', 'barang berhasil ditambah ke keranjang!');
        return redirect()->back();
    }

    public function removeFromCart($id)
    {
        $cart = Session::get('cart');
        $key = array_search($id, array_column($cart, 'id'));
        \array_splice($cart, $key, 1);
        Session::put('cart', $cart);
        Session::flash('success', 'barang berhasil menghapus data dari keranjang!');
        return redirect()->back();
    }

    public function updateFromCart(Request $request)
    {
        $cart = Session::get('cart');
        $cartItems = array();
        if (is_array($cart)) {
            $cartItems = $cart;
        }
        $indexItem = 0;
        foreach ($cartItems as $item) {
            if ($item['id'] == $request->id) {

                $cartItems[$indexItem]['quantity'] = $request->quantity;
            };
            $indexItem++;
        }
        Session::put('cart', $cartItems);
        session::flash('success', 'Item Cart is Updated Successfully !');
        return redirect()->back();
    }
}