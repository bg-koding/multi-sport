@extends('user.layout.app')

@section('content')
    <div class="site-section bg-primary py-5 page-title-wrap mt-5">
        <div class="container">
            <h1>{{ $produk->kategori_produk }}</h4>
        </div>
    </div>
    <div class="site-section mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    {{-- @foreach ($gambar as $produks) --}}
                        {{-- <img src="{{ url('gambar', $produks) }}" alt="Image" class="img-fluid"> --}}
                        <img src="{{ url('gambar', $gambar[0]) }}" alt="Image" class="img-fluid" id="gambar-sepatu">
                    {{-- @endforeach --}}
                </div>
                <div class="col-lg-5 ml-auto">
                    <h2 class="text-primary">{{ $produk->nama_produk }}</h2>
                    <h5 class="text-primary">Rp. {{ number_format($produk->harga_produk, 2, ',', '.') }}</h5>
                    <p>{!! $produk->deskripsi_produk !!}</p>
                    <div class="mb-2">
                        <p>Stok : {{ $produk->stok_produk }}</p>

                    </div>
                    <p>
                        @if (!Auth::check())
                            <a href="{{ url('login') }}" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary"
                                onclick="return alert('login dahulu')">Add To Cart</a>
                        @else
                            <form action="{{ url('add-cart') }}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                                <input type="hidden" name="category" value="{{ $produk->kategori_produk }}">

                                @if (!empty($size_bola))
                                    <div class="d-flex">
                                        Size Bola :
                                        @foreach ($size_bola as $index => $bola)
                                            <div class="form-check mx-2">
                                                <input class="form-check-input" type="radio" name="size_bola"
                                                    id="size-bola-{{ $index }}" value="{{ $bola }}">
                                                <label class="form-check-label" for="size-bola-{{ $index }}">
                                                    {{ $bola }}
                                                </label>
                                            </div>
                                        @endforeach
                                        @error('size_bola')
                                            {{ $message }}
                                        @enderror
                                    </div>

                                    <div class="d-flex">
                                        Tipe Bola :
                                        @foreach ($tipe_bola as $index => $bola)
                                            <div class="form-check mx-2">
                                                <input class="form-check-input" type="radio" name="tipe_bola"
                                                    id="tipe-bola-{{ $index }}" value="{{ $bola }}">
                                                <label class="form-check-label" for="tipe-bola-{{ $index }}">
                                                    {{ $bola }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="d-flex">
                                        Warna Bola :
                                        @foreach ($warna_bola as $index => $bola)
                                            <div class="form-check mx-2">
                                                <input class="form-check-input" type="radio" name="warna_bola"
                                                    id="warna-bola-{{ $index }}" value="{{ $bola }}">
                                                <label class="form-check-label" for="warna-bola-{{ $index }}">
                                                    {{ $bola }}
                                                </label>
                                            </div>
                                        @endforeach
                                        @error('warna_bola')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                @endif

                                @if (!empty($size_sepatu))
                                    <div class="d-flex">
                                        Size Sepatu :
                                        @foreach ($size_sepatu as $index => $sepatu)
                                            <div class="form-check mx-2">
                                                <input class="form-check-input" type="radio" name="size_sepatu"
                                                    id="size-sepatu-{{ $index }}" value="{{ $sepatu }}">
                                                <label class="form-check-label" for="size-sepatu-{{ $index }}">
                                                    {{ $sepatu }}
                                                </label>
                                            </div>
                                        @endforeach
                                        @error('size_sepatu')
                                            {{ $message }}
                                        @enderror
                                    </div>

                                    <div class="d-flex">
                                        Warna Sepatu :
                                        @foreach ($warna_sepatu as $index => $sepatu)
                                            <div class="form-check mx-2">
                                                <input class="form-check-input wr-sepatu" type="radio" name="warna_sepatu" id="warna-{{ $index }}" value="{{ $sepatu }}" data-id="{{ $index }}">
                                                <label class="form-check-label" for="warna-{{ $index }}">
                                                    {{ $sepatu }}
                                                </label>
                                            </div>
                                        @endforeach
                                        @error('warna_sepatu')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                @endif

                                @if (!empty($size_baju))
                                    <div class="d-flex">
                                        Size Baju :
                                        @foreach ($size_baju as $index => $baju)
                                            <div class="form-check mx-2">
                                                <input class="form-check-input" type="radio" name="size_baju"
                                                    id="size-baju-{{ $index }}" value="{{ $baju }}">
                                                <label class="form-check-label" for="size-baju-{{ $index }}">
                                                    {{ $baju }}
                                                </label>
                                            </div>
                                        @endforeach
                                        @error('size_baju')
                                            {{ $message }}
                                        @enderror
                                    </div>

                                    <div class="d-flex">
                                        Warna Baju :
                                        @foreach ($warna_baju as $index => $baju)
                                            <div class="form-check mx-2">
                                                <input class="form-check-input" type="radio" name="warna_baju"
                                                    id="warna-baju-{{ $index }}" value="{{ $baju }}">
                                                <label class="form-check-label" for="warna-baju-{{ $index }}">
                                                    {{ $baju }}
                                                </label>
                                            </div>
                                        @endforeach
                                        @error('warna_baju')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                @endif

                                <div class="my-3">
                                    <div class="input-group mb-3" style="max-width: 200px;">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-primary js-btn-minus"
                                                type="button">&minus;</button>
                                        </div>
                                        <input type="text" class="form-control text-center border mr-0" value="1"
                                            placeholder="" aria-label="Example text with button addon"
                                            aria-describedby="button-addon1" name="total">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary js-btn-plus"
                                                type="button">&plus;</button>
                                        </div>
                                    </div>
                                </div>
                                <button class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary mt-2">Add To
                                    Cart</button>
                            </form>
                        @endif
                </div>
            </div>
        </div>
    </div>
    <div class="hero-2"
        style="background-image: url('https://images.unsplash.com/photo-1489987707025-afc232f7ea0f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');">
        <div class="container">
            <div class="row justify-content-center text-center align-items-center">
                <div class="col-md-8">
                    <span class="sub-title">Welcome</span>
                    <h2>SIPAO</h2>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('frontend/wines') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ url('frontend/wines') }}/js/jquery-migrate-3.0.1.min.js"></script>
    <script>
         $(document).ready(function() {
        $('.wr-sepatu').click(function() {
            var id = $(this).data('id');
            var warnaSepatu = $(this).val();
            
           
            var gambarPath = "{{ url('gambar') }}/" + warnaSepatu + '.jpg';
            $('#gambar-sepatu').attr('src', gambarPath);
            
            // Lakukan sesuatu dengan ID dan warna sepatu yang telah diperoleh
        });
    });

    </script>
@endsection
