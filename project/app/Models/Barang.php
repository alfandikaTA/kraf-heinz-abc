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
}