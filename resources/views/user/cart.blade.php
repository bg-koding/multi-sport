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
                                    <th class="product-price">Price</th>
                                    <th class="product-price">Add</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_cart as $cart)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="{{ url('gambar', json_decode($cart->produk->gambar_produk)[0]) }}"
                                                alt="Image" class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 cart-product-title text-black">{{ $cart->produk->nama_produk }}
                                            </h2>
                                        </td>
                                        <td>Rp. {{ $cart->produk->harga_produk }}</td>
                                        <td>
                                            <div class="my-3">
                                                <div class="input-group mb-3" style="max-width: 200px;">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-outline-primary js-btn-minus"
                                                            type="button">&minus;</button>
                                                    </div>
                                                    <input type="text" class="form-control text-center border mr-0"
                                                        value="1" placeholder=""
                                                        aria-label="Example text with button addon"
                                                        aria-describedby="button-addon1" name="total">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-primary js-btn-plus"
                                                            type="button">&plus;</button>
                                                    </div>
                                                </div>
                                            </div>
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
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <button class="btn btn-primary btn-md btn-block">Update Cart</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-outline-primary btn-md btn-block">Continue Shopping</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="text-black h4" for="coupon">Coupon</label>
                            <p>Enter your coupon code if you have one.</p>
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0">
                            <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-md px-4">Apply Coupon</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total Pesanan</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">{{ auth()->user()->cart->count() }}</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ url('checkout') }}" class="btn btn-primary btn-lg btn-block"> Proceed To
                                        Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
