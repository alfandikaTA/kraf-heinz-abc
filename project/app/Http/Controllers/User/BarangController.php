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

        $product = Barang::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "nama" => $product->nama,
                "quantity" => 1,
                "harga" => $product->harga,
                "id" => $product->id
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function removeFromCart($id)
    {
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'berhasil menghapus barang dari keranjang!');
        }
        return redirect()->back();
    }

    public function updateFromCart(Request $request)
    {
        dd($request->quantity);
        session::flash('success', 'Item Cart is Updated Successfully !');
        return redirect()->back();
    }
}