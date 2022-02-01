<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header_transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['tanggal_transaksi'];

    static function tambah_header_transaksi()
    {
        $data = Header_transaksi::create([
            "tanggal_transaksi" => date("Y-m-d"),
        ]);

        return $data->id_header_transaksi;
    }
}