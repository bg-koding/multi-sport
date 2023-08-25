@extends('user.layout.app')

@section('content')
    <div class="site-section  pb-0">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-7 section-title text-center mb-5">
                    <h2 class="d-block">Cart</h2>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="site-blocks-table">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Qty</th>
                                    <th class="product-price">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_cart as $cart)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="{{ url('gambar', json_decode($cart->produk[0]->gambar_produk)[0]) }}"
                                                alt="Image" class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 cart-product-title text-black">
                                                {{ $cart->produk[0]->nama_produk }}
                                            </h2>
                                            {{ $cart->size_bola  }}
                                            {{ $cart->warna_bola }}
                                            {{ $cart->tipe_bola }}
                                            {{ $cart->size_sepatu }}
                                            {{ $cart->warna_sepatu }}
                                            {{ $cart->size_baju }}
                                            {{ $cart->warna_baju }}
                                        </td>
                                        <td>
                                            <h2 class="h5 cart-product-title text-black">
                                                {{ $cart->total }}
                                            </h2>
                                        </td>
                                        <td>
                                            <h2 class="h5 cart-product-title text-black">
                                                Rp.
                                                {{ number_format($cart->total * $cart->produk[0]->harga_produk, 2, ',', '.') }}
                                            </h2>
                                        </td>
                                        <td>
                                            <form action="{{ url('cart/delete', $cart->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-primary height-auto btn-sm"
                                                    onclick="return confirm('apakah hapus barang?')">X</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section pt-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4 pl-5">
                </div>
                <div class="col-md-8 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <table class="table">
                                    <tr>
                                        <th> <span class="text-black">Jumlah Pesanan</span></th>
                                        <td>:</td>
                                        <td><strong class="text-black">{{ $jumlah }}</strong></td>
                                    </tr>
                                    <th> <span class="text-black">TOTAL</span></th>
                                    <td>:</td>
                                    <td><strong class="text-black">
                                            Rp. {{ number_format($total, 2, ',', '.') }}
                                        </strong></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ url('cart/test') }}" method="post">
                                        @csrf
                                        @foreach ($list_cart as $c)
                                            @foreach ($c->produk as $p)
                                                <input name="produk_id[]" type="hidden" value="{{ $p->id }}">
                                            @endforeach
                                        @endforeach
                                        @foreach ($testi as $item)
                                            <input type="hidden" name="size_bola[]" value="{{ $item->size_bola }}">
                                            <input type="hidden" name="warna_bola[]" value="{{ $item->warna_bola }}">
                                            <input type="hidden" name="tipe_bola[]" value="{{ $item->tipe_bola }}">
                                            <input type="hidden" name="size_sepatu[]" value="{{ $item->size_sepatu }}">
                                            <input type="hidden" name="warna_sepatu[]" value="{{ $item->warna_sepatu }}">
                                            <input type="hidden" name="size_baj[]u" value="{{ $item->size_baju }}">
                                            <input type="hidden" name="warna_baju[]" value="{{ $item->warna_baju }}">
                                            <input type="hidden" name="total[]" value="{{ $item->total }}">
                                        @endforeach
                                        <button class="btn btn-primary btn-lg btn-block"> Proceed To
                                            Checkout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/libs/jquery/jquery.min.js"></script>
@endsection
