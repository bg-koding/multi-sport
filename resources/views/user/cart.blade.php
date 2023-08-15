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
                                    <th class="product-price">Add</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_cart as $cart)
                                    <input type="hidden" id="hargaAwal" value="{{ $cart->produk[0]->harga_produk }}" readonly>
                                    <input type="hidden" id="hargaBaru" value="" readonly>
                                    <input type="hidden" id="jumlahAwal" value="{{ $cart->count() }}" readonly>

                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="{{ url('gambar', json_decode($cart->produk[0]->gambar_produk)[0]) }}"
                                                alt="Image" class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 cart-product-title text-black">{{ $cart->produk[0]->nama_produk }}
                                            </h2>
                                        </td>
                                        <td>
                                            <div class="my-3">

                                                <div class="input-group mb-3" style="max-width: 200px;">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-outline-primary js-btn-minus"
                                                            type="button">&minus;</button>
                                                    </div>
                                                    <input type="text" class="form-control text-center border mr-0"
                                                        value="1" id="banyak" name="total" readonly>
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
                <div class="col-md-6 pl-5">
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
                                <table class="table">
                                    <tr>
                                        <th> <span class="text-black">Jumlah Pesanan</span></th>
                                        <td>:</td>
                                        <td><strong class="text-black"
                                                id="totalJumlah">0</strong></td>
                                    </tr>
                                    <th> <span class="text-black">TOTAL</span></th>
                                    <td>:</td>
                                    <td><strong class="text-black" id="totalHarga"></strong></td>
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
                                        <input type="hidden" id="totalHarga2" name="total" >
                                        <button class="btn btn-primary btn-lg btn-block"> Proceed To
                                            Checkout</button>
                                    </form>
                                    {{-- <a href="{{ url('checkout') }}" class="btn btn-primary btn-lg btn-block"> Proceed To
                                        Checkout</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var ambilJumlah = $('#banyak');
            var hargaAwal = $('#hargaAwal').val();
            var jumlahAwal =  $('#jumlahAwal').val();

            var totalSementara = $('#jumlahAwal').val();
            $('#totalJumlah').html(totalSementara)
            $('#totalHarga').html(hargaAwal)
            $('#totalHarga2').val(hargaAwal)
            $('.js-btn-minus').on('click', function() {
                jumlahAwal--
                if (jumlahAwal <= 0) {

                    ambilJumlah.val(1)
                    alert('Minimal banyak barang adalah 1')
                } else {
                    $('#totalJumlah').html(jumlahAwal)
                    $('#hargaBaru').val(hargaAwal * jumlahAwal)
                    $('#totalHarga').html(hargaAwal * jumlahAwal)
                    $('#totalHarga2').val(hargaAwal * jumlahAwal)
                }
            })
            $('.js-btn-plus').on('click', function() {
                jumlahAwal++
                $('#totalJumlah').html(jumlahAwal)
                $('#hargaBaru').val(hargaAwal * jumlahAwal)
                $('#totalHarga').html(hargaAwal * jumlahAwal)
                $('#totalHarga2').val(hargaAwal * jumlahAwal)
            })

        });
    </script>
@endsection
