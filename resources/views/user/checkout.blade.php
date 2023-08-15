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
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black font-heading-serif">Billing Details</h2>
                    <div class="p-3 p-lg-5 border">
                        <form action="{{ 'checkout' }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="c_fname" class="text-black">First Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_fname" name="first_name"
                                        value="{{ auth()->user()->frist_name }}">
                                    @error('first_name')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="c_lname" class="text-black">Last Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_lname" name="last_name"
                                        value="{{ auth()->user()->last_name }}">
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
                                        value="{{ auth()->user()->alamat }}" placeholder="Street address">
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
                                        value="{{ auth()->user()->state_country }}">
                                    @error('state_country')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="c_postal_zip" class="text-black">Posta / Zip <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_postal_zip" name="postal_zip"
                                        value="{{ auth()->user()->postal_zip }}">
                                    @error('postal_zip')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-md-6">
                                    <label for="c_email_address" class="text-black">Email Address <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_email_address" name="email_address"
                                        value="{{ auth()->user()->email }}">
                                    @error('email_address')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="c_phone" class="text-black">Phone <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_phone" name="phone"
                                        value="{{ auth()->user()->phone }}" placeholder="Phone Number">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="text-black">Metode Pembayaran</label>
                                <select name="metode_pembayaran" id="" class="form-control">
                                    <option value="cod">Cod</option>
                                    <option value="transfer">Transfer</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="c_order_notes" class="text-black">Order Notes</label>
                                <textarea name="order_notes" id="c_order_notes" cols="30" rows="5" class="form-control"
                                    placeholder="Write your notes here..."></textarea>
                                @error('order_notes')
                                    {{ $message }}
                                @enderror
                            </div>

                            @foreach ($list_pesanan as $c)
                                @foreach ($c->produk as $p)
                                    <input name="produk_id[]" type="hidden" value="{{ $p->id }}">
                                @endforeach
                            @endforeach
                            @foreach ($testi as $item)
                                <input type="hidden" name="size_bola[]" value="{{ $item->size_bola }}">
                                <input type="hidden" name="warna_bola[]" value="{{ $item->warna_bola }}">
                                <input type="hidden" name="tipe_bola[]" value="{{ $item->tipe_bola }}">
                                <input type="hidden" name="size_sepatu[]" value="{{ $item->size_sepatu }}">
                                <input type="hidden" name="warna_sepatu[]" value="{{ $item->warna_sepatu }}">
                                <input type="hidden" name="size_baj[]u" value="{{ $item->size_baju }}">
                                <input type="hidden" name="warna_baju[]" value="{{ $item->warna_baju }}">
                                <input type="hidden" name="total[]" value="{{ $item->total }}">
                            @endforeach


                            <div class="form-group">
                                <button class="btn btn-primary btn-lg btn-block">Place
                                    Order</button>
                            </div>
                    </div>
                </div>
                <div class="col-md-6 mb-5 ">
                    <h2 class="h3 mb-3 text-black font-heading-serif">Cart</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_pesanan as $pesanan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pesanan->produk[0]->nama_produk }}</td>
                                    <td>{{ $pesanan->total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="text-black" colspan="3">
                                    Total : Rp. {{ number_format($total, 2, ',') }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>


            </div>

            </form>

        </div>

    </div>
    </div>
@endsection
