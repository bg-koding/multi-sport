@extends('layout.app')

@section('konten')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-5">
                <div class="card-header">
                    Daftar Pesanan Baru
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pemesan</th>
                                <th>Status Pesanan</th>
                                <th>Tanggal Pesanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_pesanan as $pesanan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pesanan->user->username }}</td>
                                    <td>
                                        {{ $pesanan->status }}
                                    </td>
                                    <td>{{ $pesanan->created_at->format('F j, Y, g:i a') }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
