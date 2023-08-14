@extends('layout.app')

@section('konten')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-5">
                <div class="card-header">
                    Pesanan Baru
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>first name</td>
                                <td>{{ $pesanan->first_name }}</td>
                            </tr>
                            <tr>
                                <td>last name</td>
                                <td>{{ $pesanan->last_name }}</td>
                            </tr>
                            <tr>
                                <td>address</td>
                                <td>{{ $pesanan->address }}</td>
                            </tr>
                            <tr>
                                <td>state country</td>
                                <td>{{ $pesanan->state_country }}</td>
                            </tr>
                            <tr>
                                <td>postal zip</td>
                                <td>{{ $pesanan->postal_zip }}</td>
                            </tr>
                            <tr>
                                <td>email address</td>
                                <td>{{ $pesanan->email_address }}</td>
                            </tr>
                            <tr>
                                <td>phone</td>
                                <td>{{ $pesanan->phone }}</td>
                            </tr>
                            <tr>
                                <td>status</td>
                                <td>{{ $pesanan->status }}</td>
                            </tr>
                            <tr>
                                <td>total harga</td>
                                <td>Rp. {{ number_format($pesanan->total, 2, ',', '.') }}</td>
                            </tr>

                            @if ($pesanan->invoce)
                                <tr>
                                    <td>invoce</td>
                                    <td><a href="{{ url($pesanan->invoce) }}" target="_blank" class="btn btn-sm btn-dark"><i
                                                class="fa fa-download"></i>
                                            download</a></td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-10">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>Produk</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_produk as $produk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $produk }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
