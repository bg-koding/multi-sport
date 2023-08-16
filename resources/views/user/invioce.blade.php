@extends('user.layout.app')

@section('content')
    <div class="site-section">
        <div class="container">
            <div class="col-md-12">
                <h2 class="h3 mb-3 text-black font-heading-serif">Your Invoce</h2>
                <div class="p-3 p-lg-5 border">
                    <table class="table site-block-order-table mb-5">
                        <thead>

                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Qty</th>
                        </thead>
                        <tbody>
                            @foreach ($list_pesanan as $product)
                                <tr>
                                    <td>{{ $product->produk->nama_produk }}</td>
                                    <td>Rp. {{ number_format($product->produk->harga_produk, 2, ',', '.') }}</td>
                                    <td>{{ $product->total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>
                                    Total :
                                </td>
                                <td>
                                    Rp. {{ number_format($total, 2, ',') }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="border mb-3 p-3 rounded">
                        <label for="">Kode pembayaran</label>
                        <h2>{{ $code }}</h2>
                        <small>Total yang di bayarkan : Rp. {{ number_format($total, 2, ',') }}</small>
                    </div>

                    <div class="border mb-3 p-3 rounded">
                        <form action="{{ url('invoce/update', $pesanan[0]->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_address" class="text-black">Invoce Tf<span
                                            class="text-danger">*</span></label>
                                    @error('invoce')
                                        {{ $message }}
                                    @enderror
                                    <input type="file" class="form-control" id="" name="invoce"
                                        accept=".png , .jpg , .jpeg">
                                </div>
                            </div>
                            <button class="btn btn-primary btn-lg btn-block">Upload</button>
                        </form>
                    </div>

                    <div class="border mb-3 p-3 rounded">
                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button"
                                aria-expanded="false" aria-controls="collapsebank">Direct Bank
                                Transfer</a></h3>
                        <div class="collapse" id="collapsebank">
                            <div class="py-2 pl-0">
                                <p class="mb-0">Make your payment directly into our bank account. Please
                                    use your Order ID as the
                                    payment reference. Your order won’t be shipped until the funds have
                                    cleared in our account.</p>
                            </div>
                        </div>
                    </div>
                    <div class="border mb-3 p-3 rounded">
                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button"
                                aria-expanded="false" aria-controls="collapsecheque">Cheque
                                Payment</a></h3>
                        <div class="collapse" id="collapsecheque">
                            <div class="py-2 pl-0">
                                <p class="mb-0">Make your payment directly into our bank account. Please
                                    use your Order ID as the
                                    payment reference. Your order won’t be shipped until the funds have
                                    cleared in our account.</p>
                            </div>
                        </div>
                    </div>
                    <div class="border mb-5 p-3">
                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button"
                                aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>
                        <div class="collapse" id="collapsepaypal">
                            <div class="py-2 pl-0">
                                <p class="mb-0">Make your payment directly into our bank account. Please
                                    use your Order ID as the
                                    payment reference. Your order won’t be shipped until the funds have
                                    cleared in our account.</p>
                            </div>
                        </div>
                    </div>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Logo_dana_blue.svg/2560px-Logo_dana_blue.svg.png"
                        alt="" width="150px" class="img-fluid mr-3">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/86/Gopay_logo.svg/2560px-Gopay_logo.svg.png"
                        alt="" width="150px" class="img-fluid mr-3">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/2560px-PayPal.svg.png"
                        alt="" width="150px" class="img-fluid mr-3">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/68/BANK_BRI_logo.svg/1200px-BANK_BRI_logo.svg.png"
                        alt="" width="150px" class="img-fluid mr-3">
                    <img src="https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1634025439/1081027ebaed20dc6155d99946411a8721f1de6224d0b646a5c767072dfb1afb.png"
                        alt="" width="150px" class="img-fluid mr-3">



                </div>
            </div>

        </div>
    </div>
@endsection
