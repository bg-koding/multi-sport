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
        return view('admin.pesanan-baru.show', $data);
    }

    public function update(Pesanan $pesanan)
    {
        $pesanan->status = request('status');
        $pesanan->save();

        return redirect('admin/pesanan-baru');
    }
}
