@extends('layout.app')

@section('konten')
    <div class="row justify-content-center">
        <div class="col-md-6">
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
                                <td>metode pembayaran</td>
                                <td>{{ $pesanan->metode_pembayaran }}</td>
                            </tr>

                            @if ($pesanan->file_pembayaran)
                                <tr>
                                    <td>invoce</td>
                                    <td><a href="{{ url($pesanan->file_pembayaran) }}" target="_blank" class="btn btn-sm btn-dark"><i
                                                class="fa fa-download"></i>
                                            download</a></td>
                                </tr>
                            @else
                                <tr>
                                    <td>invoce</td>
                                    <td>blm ada pembayaran</td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header">
                    Produk Baru
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_pesan as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img width="100px"
                                            src="{{ url('gambar', json_decode($product->produk->gambar_produk)[0]) }}"
                                            class="img-fluid" alt="" srcset="">
                                    </td>
                                    <td>{{ $product->produk->nama_produk }}</td>
                                    <td>{{ $product->total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">
                                    Total :  <td>Rp. {{ number_format($total, 2, ',', '.') }}</td>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    Ubah Status
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/update-status', $pesanan->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <select name="status" id="" class="form-control">
                            <option value="di kirim">Di kirim</option>
                            <option value="di tolak">Di tolak</option>
                        </select>

                        <div class="d-grid">
                            <button class="btn mt-2 btn-dark">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
