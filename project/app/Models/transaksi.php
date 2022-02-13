<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $attributes = [
        'user_id',
        'update' => 0,
    ];

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
            ->format('d, M Y H:i');
    }

    public function transaksi_detail()
    {
        return $this->hasMany(detail_transaksi::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}