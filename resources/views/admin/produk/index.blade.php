@extends('layout.app')

@section('konten')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-5">
                <div class="card-header">
                    <a href="{{ url('admin/produk/create') }}" class="btn btn-dark float-end i fa fa-plus"> Create</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Aksi</th>
                                <th>Nama Produk</th>
                                <th>Stok Produk</th>
                                <th>Harga Produk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_produk as $produk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ url('admin/produk', $produk->id) }}" class="btn btn-dark"><i
                                                class="fa fa-info"></i></a>
                                        <a href="{{ url('admin/produk', $produk->id) }}/edit" class="btn btn-warning"><i
                                                class="fa fa-edit"></i></a>
                                        <form action="{{ url('admin/produk/delete', $produk->id) }}" class="d-inline" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger"
                                                onclick="return confirm('apakah ingin menghapus?')"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                    <td>{{ $produk->nama_produk }}</td>
                                    <td>{{ $produk->stok_produk }}</td>
                                    <td>Rp. {{ $produk->harga_produk }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
