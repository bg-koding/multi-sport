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
                                <tbody>
                                    <tr>
                                        <td>Username</td>
                                        <td>{{ $user->username }}</td>
                                    </tr>
                                    <tr>
                                        <td>Made Since</td>
                                        <td>{{ $user->created_at->format('F j, Y, g:i a') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Frist name</td>
                                        <td>{{ $user->frist_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Last Name</td>
                                        <td>{{ $user->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>State Country</td>
                                        <td>{{ $user->state_country }}</td>
                                    </tr>
                                    <tr>
                                        <td>Postal Zip</td>
                                        <td>{{ $user->postal_zip }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td>{{ $user->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>{{ $user->alamat }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Aksi</th>
                                        <th>Status</th>
                                        <th>Di Pesan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesanan as $pesan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a href="{{ url('user-profile', $pesan->id) }}" class="btn btn-primary"><i
                                                        class="fa fa-info"></i></a>
                                            </td>
                                            <td>{{ $pesan->status }}</td>
                                            <td>{{ $pesan->created_at->format('F j, Y, g:i a') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
