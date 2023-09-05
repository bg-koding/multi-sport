<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $KeyType = 'string';
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            $item->id = (string) Str::orderedUuid();
        });
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, 'produk_id');
    }

    public function CheckOut()
    {
        return $this->hasMany(CheckOut::class, 'produk_id');
    }


    public function DetailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'produk_id');
    }

    public function Galeri()
    {
        return $this->hasMany(Galeri::class, 'produk_id');
    }

}
