@extends('user.layout.app')

@section('content')
    <div class="site-section mt-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 section-title text-center mb-5">
                    <h2 class="d-block">Our Products</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, perspiciatis!</p>
                    <form action="{{ url('cari') }}" method="get">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-8"> <input type="text" name="cari" class="form-control"> </div>
                            <div class="col-md-3"><button class="btn btn-primary"><i class="fa fa-search"></i>
                                    Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                @foreach ($list_produk as $produk)
                    <div class="col-lg-4 mb-5 col-md-6">
                        <div class="wine_v_1 text-center pb-4">
                            <a href="{{ url('shop', $produk->id) }}" class="thumbnail d-block mb-4"><img
                                    src="{{ url('gambar', json_decode ($produk->gambar_produk)[0]) }}"
                                    alt="Image" class="img-fluid"></a>
                            <div>
                                <h3 class="heading mb-1"><a
                                        href="{{ url('shop', $produk->id) }}">{{ $produk->nama_produk }}</a></h3>
                                <span class="price">Rp. {{ number_format($produk->harga_produk, 2, ',', '.') }}</span>
                            </div>
                            <div class="wine-actions">
                                <h3 class="heading-2"><a
                                        href="{{ url('shop', $produk->id) }}">{{ $produk->nama_produk }}</a></h3>
                                <span class="price d-block">Rp.
                                    {{ number_format($produk->harga_produk, 2, ',', '.') }}</span>
                                {{-- @if (!Auth::check())
                                    <a href="{{ url('login') }}"
                                        class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary"
                                        onclick="return alert('login dahulu')">Add To Cart</a>
                                @else
                                    <form action="{{ url('add-cart') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                                        <button class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Add To
                                            Cart</button>
                                    </form>
                                @endif --}}

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
