@extends('layout.app')

@section('konten')
    <div class="row">
        <div class="col">
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="text-center">
                        Total user
                    </h5>
                </div>
                <div class="card-body">
                    <h2 class="text-center">
                        {{ $user }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="text-center">
                        Total produk
                    </h5>
                </div>
                <div class="card-body">
                    <h2 class="text-center">
                        {{ $produk }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="text-center">
                        Total pesanan baru
                    </h5>
                </div>
                <div class="card-body">
                    <h2 class="text-center">
                        {{ $pesanan_baru }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="text-center">
                        Total pesanan selesai
                    </h5>
                </div>
                <div class="card-body">
                    <h2 class="text-center">
                        {{ $pesanan_selesai }}
                    </h2>
                </div>
            </div>
        </div>

    </div>
@endsection
