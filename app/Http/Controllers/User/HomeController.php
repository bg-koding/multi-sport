<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.home', [
            'list_produk' => Produk::all()
        ]);
    }
    public function shop()
    {
        return view('user.shop', [
            'list_produk' => Produk::all()
        ]);
    }

    public function detail(Produk $produk)
    {
        return view('user.detail-shop', [
            'produk' => $produk,
            'gambar' => json_decode($produk->gambar_produk),
            'size_bola' => json_decode($produk->size_bola),
            'warna_bola' => json_decode($produk->warna_bola),
            'tipe_bola' => json_decode($produk->tipe_bola),
            'size_baju' => json_decode($produk->size_baju),
            'warna_baju' => json_decode($produk->warna_baju),
            'size_sepatu' => json_decode($produk->size_sepatu),
            'warna_sepatu' => json_decode($produk->warna_sepatu),
        ]);
    }
}
