<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananBaruController extends Controller
{
    public function index()
    {
        return view('admin.pesanan-baru.index', [
            'list_pesanan' =>  Pesanan::where('status', 'menunggu pembayaran')->orwhere('status', 'menunggu pengiriman')->get()
        ]);
    }

    public function show(Pesanan $pesanan)
    {
        return view('admin.pesanan-baru.show', [
            'pesanan' => $pesanan,
            'list_produk' => json_decode($pesanan->produk)
        ]);
    }
}
