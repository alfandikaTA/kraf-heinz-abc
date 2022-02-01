<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['id_barang', 'id_header_transaksi', 'jumlah'];

    static function tambah_detail_transaksi($id_barang, $id_header_transaksi, $jumlah)
    {
        Detail_transaksi::create([
            "id_barang" => $id_barang,
            "id_header_transaksi" => $id_header_transaksi,
            "jumlah" => $jumlah,
        ]);
    }
}