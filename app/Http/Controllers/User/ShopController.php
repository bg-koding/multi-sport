<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CheckOut;
use App\Models\DetailPesanan;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class ShopController extends Controller
{
    public function cart()
    {

        $silogin = Auth::user()->id;

        $data['list_cart'] = Cart::where('user_id', $silogin)->with('user')->with('produk')->get();

        $cart = Cart::where('user_id', $silogin)->with('user')->with('produk')->get();

        $test = []; // Simpan harga produk di sini
        $q = [];    // Simpan total produk di sini

        foreach ($cart as $c) {
            $test[] = $c->produk[0]->harga_produk;
            $q[] = $c->total;
        }

        $result = 0; // Inisialisasi hasil perhitungan

        // Lakukan perhitungan perkalian dan penjumlahan
        for ($i = 0; $i < count($test); $i++) {
            $result += $test[$i] * $q[$i];
        }

        $data['total'] = $result;
        $data['jumlah'] = array_sum($q);

        $data['testi'] = Cart::where('user_id', $silogin)->get();


        return view('user.cart', $data);
    }

    public function cart2()
    {

        $silogin = Auth::user()->id;

        $data['list_cart'] = Cart::where('user_id', $silogin)->with('user')->with('produk')->get();

        return view('user.cart-test', $data);
    }

    public function addCart(Request $request)
    {
        if ($request->category == 'bola') {
            $request->validate([
                'size_bola' => 'required',
                'warna_bola' => 'required',
            ]);
        }

        if ($request->category == 'sepatu') {
            $request->validate([
                'size_sepatu' => 'required',
                'warna_sepatu' => 'required',
            ]);
        }

        if ($request->category == 'baju') {
            $request->validate([
                'size_baju' => 'required',
                'warna_baju' => 'required',
            ]);
        }

        $cart = new Cart();
        $cart->user_id = $request->user_id;
        $cart->produk_id = $request->produk_id;

        if ($request->category == 'bola') {
            $cart->size_bola = $request->size_bola;
            $cart->warna_bola = $request->warna_bola;
            $cart->tipe_bola = $request->tipe_bola;
        }

        if ($request->category == 'sepatu') {
            $cart->size_sepatu = $request->size_sepatu;
            $cart->warna_sepatu = $request->warna_sepatu;
        }

        if ($request->category == 'baju') {
            $cart->size_baju = $request->size_baju;
            $cart->warna_baju = $request->warna_baju;
        }

        $cart->status = 'checkout';
        $cart->total = $request->total;
        $cart->save();

        return back();
    }


    public function index_invoce()
    {
        $isLogin = auth()->user()->id;
        $data['list_pesanan'] = DetailPesanan::where('user_id', $isLogin)->get();

        $cart = DetailPesanan::where('user_id', $isLogin)->get();

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
        $data['code'] = date('y') . Str::random(20);

        return view('user.invioce', $data);
    }

    public function cartTest(Request $request)
    {


        $silogin = Auth::user()->id;

        foreach ($request->produk_id as $index => $produk) {
            $CheckOut = new CheckOut();
            $CheckOut->user_id = $silogin;
            $CheckOut->produk_id = $produk;
            $CheckOut->total = $request->total[$index] ?? null;
            $CheckOut->size_bola = $request->size_bola[$index] ?? null;
            $CheckOut->warna_bola = $request->warna_bola[$index] ?? null;
            $CheckOut->tipe_bola = $request->tipe_bola[$index] ?? null;
            $CheckOut->size_sepatu = $request->size_sepatu[$index] ?? null;
            $CheckOut->warna_sepatu = $request->warna_sepatu[$index] ?? null;
            $CheckOut->size_baju = $request->size_baju[$index] ?? null;
            $CheckOut->warna_baju = $request->warna_baju[$index] ?? null;
            $CheckOut->status = "Baru";
            $simpanData = $CheckOut->save();
        }


        if ($simpanData == 1) {
            foreach ($request->produk_id as $x) {
                $hapusCart = Cart::where('produk_id', $x)->delete();
            }
            return redirect('checkout')->with('success', 'Pesanan berhasil dibuat');
        }
        return back()->with('danger', 'Pesanan gagal dibuat');
    }

    function cekStok(Produk $produk)
    {
        return $produk;
    }


    public function index_checkOut()
    {
        $silogin = auth()->user()->id;
        $data['list_pesanan'] = CheckOut::where('user_id', $silogin)->with('produk')->get();
        $cart = CheckOut::where('user_id', $silogin)->get();

        $test = []; // Simpan harga produk di sini
        $q = [];    // Simpan total produk di sini

        foreach ($cart as $c) {
            $test[] = $c->produk[0]->harga_produk;
            $q[] = $c->total;
        }

        $result = 0; // Inisialisasi hasil perhitungan

        // Lakukan perhitungan perkalian dan penjumlahan
        for ($i = 0; $i < count($test); $i++) {
            $result += $test[$i] * $q[$i];
        }

        $data['total'] = $result;
        $data['testi'] = CheckOut::where('user_id', $silogin)->get();

        return view('user.checkout', $data);
    }


    public function store_checkOut(Request $request)
    {

        $pesanan = new Pesanan();
        $pesanan->first_name = $request->first_name;
        $pesanan->user_id = auth()->user()->id;
        $pesanan->last_name = $request->last_name;
        $pesanan->address = $request->address;
        $pesanan->state_country = $request->state_country;
        $pesanan->postal_zip = $request->postal_zip;
        $pesanan->email_address = $request->email_address;
        $pesanan->phone = $request->phone;
        $pesanan->metode_pembayaran = $request->metode_pembayaran;
        $pesanan->order_notes = $request->order_notes;
        $pesanan->kode_produk = auth()->user()->id;
        $pesanan->status = 'pesanan baru';
        $pesanan->save();

        $silogin = Auth::user()->id;

        foreach ($request->produk_id as $index => $produk) {
            $detailPesanan = new DetailPesanan();
            $detailPesanan->user_id = $silogin;
            $detailPesanan->produk_id = $produk;
            $detailPesanan->total = $request->total[$index] ?? null;
            $detailPesanan->size_bola = $request->size_bola[$index] ?? null;
            $detailPesanan->warna_bola = $request->warna_bola[$index] ?? null;
            $detailPesanan->tipe_bola = $request->tipe_bola[$index] ?? null;
            $detailPesanan->size_sepatu = $request->size_sepatu[$index] ?? null;
            $detailPesanan->warna_sepatu = $request->warna_sepatu[$index] ?? null;
            $detailPesanan->size_baju = $request->size_baju[$index] ?? null;
            $detailPesanan->warna_baju = $request->warna_baju[$index] ?? null;
            $detailPesanan->kode = $silogin;
            $simpanData = $detailPesanan->save();
        }

        if ($simpanData == 1) {
            foreach ($request->produk_id as $x) {
                CheckOut::where('produk_id', $x)->delete();
            }
        }

        if ($request->metode_pembayaran == 'transfer') {
            return redirect('invoce');
        } else {
            return redirect('thanks');
        }
    }

    public function index_thanks()
    {
        return view('user.thanks');
    }

    public function cart_delete(Cart $cart)
    {
        $cart->delete();
        return back();
    }
}
