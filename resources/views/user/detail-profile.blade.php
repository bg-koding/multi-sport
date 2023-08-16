@extends('user.layout.app')

@section('content')
    <div class="site-section mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                Data Profile
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Qty</th>
                                        <th>Harga Produk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_pesanan as $pesanan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img width="150px"
                                                    src="{{ url('gambar', json_decode($pesanan->produk->gambar_produk)[0]) }}"
                                                    class="img-fuild" alt="" srcset=""></td>
                                            <td>{{ $pesanan->produk->nama_produk }}</td>
                                            <td>{{ $pesanan->total }}</td>
                                            <td> Rp. {{ number_format($pesanan->produk->harga_produk, 2, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            Total :
                                        </td>
                                        <td colspan="2">
                                            Rp. {{ number_format($total, 2, ',', '.') }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
