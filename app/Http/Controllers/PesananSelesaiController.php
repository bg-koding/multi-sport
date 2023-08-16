<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananSelesaiController extends Controller
{
    public function index()
    {
        $data['list_pesanan'] = Pesanan::where('status', 'di kirim')->orWhere('status', 'pesanan ditolak')->get();
        return view('admin.pesanan-selesai.index', $data);
    }
}
