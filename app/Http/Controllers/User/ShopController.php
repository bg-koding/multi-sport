<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ShopController extends Controller
{
    public function cart()
    {
        return view('user.cart', [
            'list_cart' => auth()->user()->cart
        ]);
    }

    public function addCart(Request $request)
    {
        // dd($request->all());
        $cart = new Cart();
        $cart->user_id = request('user_id');
        $cart->produk_id = request('produk_id');
        $cart->status = 'checkout';
        $cart->save();

        return back();
    }

    public function index_checkOut()
    {
        $data['list_cart'] = auth()->user()->cart;
        $carts = auth()->user()->cart;
        foreach ($carts as $cart) {
            $h[] = $cart->produk->harga_produk;
        }
        $data['total'] = array_sum($h);
        $data['user'] = auth()->user();
        return view('user.checkout', $data);
    }

    public function store_checkOut(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'state_country' => 'required',
            'postal_zip' => 'required',
            'email_address' => 'required',
            'phone' => 'required',
            'order_notes' => 'required',
        ]);

        $carts = auth()->user()->cart;
        $pesanan = new Pesanan();
        $pesanan->user_id = auth()->user()->id;
        $pesanan->first_name = request('first_name');
        $pesanan->last_name = request('last_name');
        $pesanan->address = request('address');
        $pesanan->state_country = request('state_country');
        $pesanan->postal_zip = request('postal_zip');
        $pesanan->email_address = request('email_address');
        $pesanan->phone = request('phone');
        $pesanan->order_notes = request('order_notes');
        $pesanan->total = request('total');
        $pesanan->status = 'Menunggu Pembayaran';

        $files = [];

        foreach ($carts as $cart) {
            $files[] = $cart->produk->nama_produk;
        }

        $pesanan->produk = json_encode($files);

        $pesanan->save();


        foreach ($carts as $cart) {
            $cart->delete();
        }

        return redirect('invoce');
    }

    public function index_invoce()
    {
        $data['code'] = date('y') . Str::random(20);
        $data['list_pesanan'] = auth()->user()->pesanan;
        $pesanans = auth()->user()->pesanan;
        foreach ($pesanans as $p) {
            $d = $p->ongkir;
            $f = $p->total;
            $id = $p->id;
        }
        $data['total'] = $f + $d;
        $data['id_pesanan'] = $id;
        return view('user.invioce', $data);
    }
}
