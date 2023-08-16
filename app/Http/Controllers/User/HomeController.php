<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DetailPesanan;
use App\Models\Pesanan;
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

    public function profile()
    {
        return view('user.profile', [
            'user' => auth()->user(),
            'pesanan' => Pesanan::where('user_id', auth()->user()->id)->get()
        ]);
    }


    public function detailProfile(Pesanan $pesanan)
    {
        $kode = $pesanan->kode_produk;
        $data['list_pesanan'] = DetailPesanan::where('kode', $kode)->get();

        $cart = DetailPesanan::where('user_id', auth()->user()->id)->where('kode', $kode)->get();

        $test = []; // Simpan harga produk di sini
        $q = [];    // Simpan total produk di sini

        foreach ($cart as $c) {
            $test[] = $c->produk->harga_produk;
            $q[] = $c->total;
        }

        $result = 0; // Inisialisasi hasil perhitungan

        // Lakukan perhitungan perkalian dan penjumlahan
        for ($i = 0; $i < count($test); $i++) {
            $result += $test[$i] * $q[$i];
        }
        $data['total'] = $result;

        return view('user.detail-profile', $data);
    }
}
