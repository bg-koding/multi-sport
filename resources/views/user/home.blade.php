@extends('user.layout.app')

@section('content')
    <div class="owl-carousel hero-slide owl-style">
        <div class="intro-section container"
            style="background-image: url('frontend/cr/1.jpg');">
            <div class="row justify-content-center text-center align-items-center">
                <div class="col-md-12">
                    <span class="sub-title">MULTI</span>
                    <h1>SPORT</h1>
                </div>
            </div>
        </div>
        <div class="intro-section container"
            style="background-image: url('frontend/cr/2.jpg');">
            <div class="row justify-content-center text-center align-items-center">
                <div class="col-md-12">
                    <span class="sub-title">Welcome</span>
                    <h1>MULTI</h1>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="owl-carousel hero-slide owl-style">
        <div class="intro-section container"
            style="background-image: url('https://images.unsplash.com/photo-1611099144078-5596e87ef54c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');">
            <div class="row justify-content-center text-center align-items-center">
                <div class="col-md-8">
                    <span class="sub-title">Jarga id</span>
                    <h1>Fashion</h1>
                </div>
            </div>
        </div>
        <div class="intro-section container"
            style="background-image: url('https://images.unsplash.com/photo-1551488831-00ddcb6c6bd3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');">
            <div class="row justify-content-center text-center align-items-center">
                <div class="col-md-8">
                    <span class="sub-title">Welcome</span>
                    <h1>Jarga id</h1>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="site-section mt-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 section-title text-center mb-5">
                    <h2 class="d-block">Our Products</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, perspiciatis!</p>
                    <p><a href="{{ url('shop') }}">View All Products <span class="icon-long-arrow-right"></span></a></p>
                </div>
            </div>
            <div class="row">
                @foreach ($list_produk as $produk)
                    <div class="col-lg-4 mb-5 col-md-6">
                        <div class="wine_v_1 text-center pb-4">
                            <a href="{{ url('shop', $produk->id) }}" class="thumbnail d-block mb-4"><img
                                    src="{{ url('gambar', json_decode($produk->gambar_produk)[0]) }}"
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
    <div class="hero-2"
        style="background-image: url('https://images.unsplash.com/photo-1489987707025-afc232f7ea0f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');">
        <div class="container">
            <div class="row justify-content-center text-center align-items-center">
                <div class="col-md-8">
                    <span class="sub-title">Welcome</span>
                    <h2>Multi Sport</h2>
                </div>
            </div>
        </div>
    </div>
@endsection
