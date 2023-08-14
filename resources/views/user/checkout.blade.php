@extends('user.layout.app')

@section('content')
    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="bg-light rounded p-3">
                        {{-- <p class="mb-0">Returning customer? <a href="#" class="d-inline-block">Click here</a> to
                        login</p> --}}
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black font-heading-serif">Billing Details</h2>
                    <div class="p-3 p-lg-5 border">
                        <form action="{{ 'checkout' }}" method="post">
                            @csrf
                            <input type="hidden" name="total" value="{{ $total }}">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="c_fname" class="text-black">First Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_fname" name="first_name"
                                        value="{{ $user->frist_name }}">
                                    @error('first_name')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="c_lname" class="text-black">Last Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_lname" name="last_name"
                                        value="{{ $user->last_name }}">
                                    @error('last_name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_address" class="text-black">Address <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_address" name="address"
                                        value="{{ $user->alamat }}" placeholder="Street address">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="c_state_country" class="text-black">State / Country <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_state_country" name="state_country"
                                        value="{{ $user->state_country }}">
                                    @error('state_country')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="c_postal_zip" class="text-black">Posta / Zip <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_postal_zip" name="postal_zip"
                                        value="{{ $user->postal_zip }}">
                                    @error('postal_zip')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-5">
                                <div class="col-md-6">
                                    <label for="c_email_address" class="text-black">Email Address <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_email_address" name="email_address"
                                        value="{{ $user->email}}">
                                    @error('email_address')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="c_phone" class="text-black">Phone <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_phone" name="phone"
                                        value="{{ $user->phone }}" placeholder="Phone Number">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="c_order_notes" class="text-black">Order Notes</label>
                                <textarea name="order_notes" id="c_order_notes" cols="30" rows="5" class="form-control"
                                    placeholder="Write your notes here..."></textarea>
                                @error('order_notes')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-lg btn-block">Place
                                    Order</button>
                            </div>
                    </div>
                </div>

                {{-- <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <h2 class="h3 mb-3 text-black font-heading-serif">shipping</h2>
                        <div class="p-3 p-lg-5 border">
                                <div class="mb-3">
                                    <label for="c_order_notes" class="text-black">Provinsi</label>
                                    <select name="province" id="" class="form-control">
                                        <option value="" selected>Pilih Provinsi</option>
                                        @foreach ($list_provinsi as $provinsi)
                                            <option value="{{ $provinsi->province_id }}">{{ $provinsi->province }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="c_order_notes" class="text-black">City</label>
                                    <select name="destination" id="" class="form-control">
                                        <option value="" selected>Pilih City</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="c_order_notes" class="text-black">Kurir</label>
                                    <select name="courier" id="" class="form-control">
                                        <option value="" selected>Pilih Kurir</option>
                                        <option value="jne">Jne</option>
                                        <option value="tiki">Tiki</option>
                                        <option value="pos">Pos Indonesia</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-black">Service</label>
                                    <select name="layanan" id="" class="form-control">
                                        <option value="" selected>Pilih Service</option>
                                        <option value="OKE">Ongkos kirim ekonomis (OKE)</option>
                                        <option value="REG">Layanan Regular (REG)</option>
                                    </select>
                                </div>

                        </div>
                    </div>
                </div>
            </div> --}}

                </form>

            </div>

        </div>
    </div>
@endsection
