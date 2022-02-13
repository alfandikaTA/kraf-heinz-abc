<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id',
        'quantity',
    ];

    public function transaksi()
    {
        return $this->belongsTo(transaksi::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}