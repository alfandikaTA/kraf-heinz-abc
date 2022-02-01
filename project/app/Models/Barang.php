<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'nama', 'quantity', 'harga'];

    function image()
    {
        if ($this->image && file_exists(public_path('images/' . $this->image)))
            return asset('project/public/images/' . $this->image);
        else
            return asset('images/no_image.png');
    }

    function delete_image()
    {
        if ($this->image && file_exists(public_path('images/' . $this->image)))
            return unlink(public_path('images/' . $this->image));
    }

    static function list_barang()
    {
        $data = Barang::all();
        return $data;
    }

    static function tambah_barang($nama, $quantity, $harga)
    {
        Barang::create([
            "nama" => $nama,
            "quantity" => $quantity,
            "harga" => $harga,
        ]);
    }

    static function detail_barang($id)
    {
        $data = Barang::where("id", $id)->first();
        return $data;
    }
}