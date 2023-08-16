<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\Pesanan;

class PesananBaruController extends Controller
{
    public function index()
    {
        return view('admin.pesanan-baru.index', [
            'list_pesanan' =>  Pesanan::where('status', 'pesanan baru')->get()
        ]);
    }

    public function show(Pesanan $pesanan)
    {

        $kode = $pesanan->kode_produk;
        $data['list_pesan'] = DetailPesanan::where('kode', $kode)->get();
        $data['pesanan'] = $pesanan;

        $kode = $pesanan->kode_produk;

        $cart = DetailPesanan::where('kode', $kode)->get();


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
        return view('admin.pesanan-baru.show', $data);
    }

    public function update(Pesanan $pesanan)
    {
        $pesanan->status = request('status');
        $pesanan->save();

        return redirect('admin/pesanan-baru');
    }
}
