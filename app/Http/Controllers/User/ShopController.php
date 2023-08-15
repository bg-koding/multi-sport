<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CheckOut;
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

        return view('user.cart', $data);
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


    public function index_invoce()
    {
        $data['pesanan'] = auth()->user()->pesanan;

        $id =  json_decode(auth()->user()->pesanan[0]->produk_id);
        // return Produk::where('id', $id)->get();

        foreach ($id as $id) {
            $products[] = Produk::where('id', $id)->get();
        }
        $data['products'] = $products;
        // return $products;
        return view('user.invioce', $data);
    }

    public function cartTest(Request $request)
    {
        $silogin = Auth::user()->id;

        foreach ($request->produk_id as $produk) {
            $CheckOut = new CheckOut();
            $CheckOut->user_id = $silogin;
            $CheckOut->produk_id = $produk;
            $CheckOut->total = $request->total;
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
        $data['total'] = CheckOut::where('user_id', $silogin)->get('total')->first();
        return view('user.checkout', $data);
    }


    public function store_checkOut(Request $request)
    {
        // return $request->all();
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
        $produk = [];
        foreach ($request->produk_id as $p) {
            $produk[] = $p;
            CheckOut::where('produk_id', $p)->delete();
        }
        $pesanan->produk_id = json_encode($produk);
        $pesanan->total_harga = $request->total_harga;
        $pesanan->save();


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
}
