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
                                <th>Aksi</th>
                                <th>Nama Pemesan</th>
                                <th>Status Pesanan</th>
                                <th>Tanggal Pesanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_pesanan as $pesanan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ url('admin/pesanan-baru', $pesanan->id) }}" class="btn btn-dark"><i
                                                class="fa fa-info"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#dataedit-{{ $pesanan->id }}"
                                            class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    </td>
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


    @foreach ($list_pesanan as $pesanans => $pesanan)
        <div class="modal fade" id="dataedit-{{ $pesanan->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel2">Edit Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('admin/data-pesanan-baru/update', $pesanan->id) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="control-label">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="menunggu pengiriman">{{ $pesanan->status }}</option>
                                    <option value="di kirim">di kirim</option>
                                    <option value="di tolak">di tolak</option>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@endsection
