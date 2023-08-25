<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    //
    public function index()
    {
        return view('dashboard', [
            'user' => User::all()->count(),
            'produk' => Produk::all()->count(),
            'pesanan_baru' => Pesanan::where('status', 'pesanan baru')->count(),
            'pesanan_selesai' => Pesanan::where('status', 'di kirim')->count(),
        ]);
    }
}
