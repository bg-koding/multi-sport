@extends('layout.app')

@section('konten')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-5">
                <div class="card-header">
                    Edit Produk
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/produk', $produk->id) }}/edit" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="" class="control-label">Nama Produk</label>
                                    <input type="text"
                                        class="form-control @error('nama_produk')
                                        is-invalid
                                    @enderror"
                                        name="nama_produk" value="{{ $produk->nama_produk }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="" class="control-label">Harga Produk</label>
                                    <input type="number"
                                        class="form-control @error('harga_produk')
                                        is-invalid
                                    @enderror"
                                        name="harga_produk" value="{{ $produk->harga_produk }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="" class="control-label">Stok Produk</label>
                                    <input type="text"
                                        class="form-control @error('stok_produk')
                                        is-invalid
                                    @enderror"
                                        name="stok_produk" value="{{ $produk->stok_produk }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="" class="control-label">Kategori Produk</label>
                                    <select name="kategori_produk" id="kategori-produk" class="form-control">
                                        <option value="kosong">Pilih Kategori</option>
                                        <option value="sepatu">Sepatu</option>
                                        <option value="bola">Bola</option>
                                        <option value="baju">Baju</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div style="display: none" id="bola">
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="" class="control-label">Size Bola</label>
                                        <div class="input-group" id="size-grp">
                                            <input type="text" name="size_bola[]" class="form-control">
                                            <button type="button" class="btn btn-primary" id="btn2"
                                                style="border-radius: 0 0"><i class="fas fa-plus"></i></button>
                                        </div>
                                        <div id="size-2" hidden>
                                            <div class="input-group inpt2 mt-2">
                                                <input type="text" name="size_bola[]" class="form-control">
                                                <button id="remv2" type="button" class="btn btn-danger"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="" class="control-label">Warna Bola</label>
                                        <div class="input-group" id="size-grp3">
                                            <input type="text" name="warna_bola[]" class="form-control">
                                            <button type="button" class="btn btn-primary" id="btn3"
                                                style="border-radius: 0 0"><i class="fas fa-plus"></i></button>
                                        </div>
                                        <div id="size-3" hidden>
                                            <div class="input-group inpt3 mt-2">
                                                <input type="text" name="warna_bola[]" class="form-control">
                                                <button id="remv3" type="button" class="btn btn-danger"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="" class="control-label">Tipe Bola</label>
                                        <div class="input-group" id="size-grp4">
                                            <input type="text" name="tipe_bola[]" class="form-control">
                                            <button type="button" class="btn btn-primary" id="btn4"
                                                style="border-radius: 0 0"><i class="fas fa-plus"></i></button>
                                        </div>
                                        <div id="size-4" hidden>
                                            <div class="input-group inpt4 mt-2">
                                                <input type="text" name="tipe_bola[]" class="form-control">
                                                <button id="remv4" type="button" class="btn btn-danger"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div id="sepatu" style="display: none">
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="" class="control-label">Size Sepatu</label>
                                        <div class="input-group" id="size-grp5">
                                            <input type="text" name="size_sepatu[]" class="form-control">
                                            <button type="button" class="btn btn-primary" id="btn5"
                                                style="border-radius: 0 0"><i class="fas fa-plus"></i></button>
                                        </div>
                                        <div id="size-5" hidden>
                                            <div class="input-group inpt5 mt-2">
                                                <input type="text" name="size_sepatu[]" class="form-control">
                                                <button id="remv5" type="button" class="btn btn-danger"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="" class="control-label">Warna Sepatu</label>
                                        <div class="input-group" id="size-grp6">
                                            <input type="text" name="warna_sepatu[]" class="form-control">
                                            <button type="button" class="btn btn-primary" id="btn6"
                                                style="border-radius: 0 0"><i class="fas fa-plus"></i></button>
                                        </div>
                                        <div id="size-6" hidden>
                                            <div class="input-group inpt6 mt-2">
                                                <input type="text" name="warna_sepatu[]" class="form-control">
                                                <button id="remv6" type="button" class="btn btn-danger"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="baju" style="display: none">
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="" class="control-label">Size Baju</label>
                                        <div class="input-group" id="size-grp7">
                                            <input type="text" name="size_baju[]" class="form-control">
                                            <button type="button" class="btn btn-primary" id="btn7"
                                                style="border-radius: 0 0"><i class="fas fa-plus"></i></button>
                                        </div>
                                        <div id="size-7" hidden>
                                            <div class="input-group inpt7 mt-2">
                                                <input type="text" name="size_baju[]" class="form-control">
                                                <button id="remv7" type="button" class="btn btn-danger"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="" class="control-label">Warna Baju</label>
                                        <div class="input-group" id="size-grp8">
                                            <input type="text" name="warna_baju[]" class="form-control">
                                            <button type="button" class="btn btn-primary" id="btn8"
                                                style="border-radius: 0 0"><i class="fas fa-plus"></i></button>
                                        </div>
                                        <div id="size-8" hidden>
                                            <div class="input-group inpt8 mt-2">
                                                <input type="text" name="warna_baju[]" class="form-control">
                                                <button id="remv8" type="button" class="btn btn-danger"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="" class="control-label">Foto Produk</label>
                            <div class="input-group inpt2" id="inpt-grp">
                                <input type="file" name="gambar_produk[]" accept=".pdf, .doc, .jpg, .jpeg, .png"
                                    class="form-control">
                                <button type="button" class="btn btn-primary" id="btn-add"
                                    style="border-radius: 0 0"><i class="fas fa-plus"></i></button>
                            </div>
                            <div id="clone" hidden>
                                <div class="input-group mt-2">
                                    <input type="file" name="gambar_produk[]" accept=".pdf, .doc, .jpg, .jpeg, .png"
                                        class="form-control">
                                    <button id="remv" type="button" class="btn btn-danger"><i
                                            class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="" class="control-label">Deskripsi</label>
                            <textarea name="deskripsi_produk"
                                class="form-control  @error('deskripsi_produk')
                            is-invalid
                             @enderror"
                                id="" cols="30" rows="10">
                                {{ $produk->deskripsi_produk }}
                            </textarea>
                        </div>


                        <div class="d-grid">
                            <button class="btn btn-dark">Edit Produk </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            // foto

            $("#btn-add").click(function() {
                var lsthtml = $("#clone").html();
                $("#inpt-grp").after(lsthtml);
            });


            $("body").on("click", "#remv", function() {
                $(this).closest(".input-group").remove();
            });

            // bola

            $("#btn2").click(function() {
                // console.log('click');
                var lsthtml = $("#size-2").html();
                $("#size-grp").after(lsthtml);
            });


            $("body").on("click", "#remv2", function() {
                $(this).closest(".inpt2").remove();
            });


            $("#btn3").click(function() {
                // console.log('click');
                var lsthtml = $("#size-3").html();
                $("#size-grp3").after(lsthtml);
            });


            $("body").on("click", "#remv3", function() {
                $(this).closest(".inpt3").remove();
            });

            $("#btn4").click(function() {
                // console.log('click');
                var lsthtml = $("#size-4").html();
                $("#size-grp4").after(lsthtml);
            });


            $("body").on("click", "#remv4", function() {
                $(this).closest(".inpt4").remove();
            });

            // sepatu

            $("#btn5").click(function() {
                // console.log('click');
                var lsthtml = $("#size-5").html();
                $("#size-grp5").after(lsthtml);
            });


            $("body").on("click", "#remv5", function() {
                $(this).closest(".inpt5").remove();
            });


            $("#btn6").click(function() {
                // console.log('click');
                var lsthtml = $("#size-6").html();
                $("#size-grp6").after(lsthtml);
            });


            $("body").on("click", "#remv6", function() {
                $(this).closest(".inpt6").remove();
            });


            // baju

            $("#btn7").click(function() {
                // console.log('click');
                var lsthtml = $("#size-7").html();
                $("#size-grp7").after(lsthtml);
            });


            $("body").on("click", "#remv7", function() {
                $(this).closest(".inpt7").remove();
            });


            $("#btn8").click(function() {
                // console.log('click');
                var lsthtml = $("#size-8").html();
                $("#size-grp8").after(lsthtml);
            });


            $("body").on("click", "#remv8", function() {
                $(this).closest(".inpt8").remove();
            });



            $('#kategori-produk').change(function() {
                var data = $(this).val();

                if (data == 'bola') {
                    $('#bola').show();
                    $('#baju').hide()
                    $('#sepatu').hide()

                } else if (data == 'baju') {
                    $('#baju').show()
                    $('#bola').hide()
                    $('#sepatu').hide()
                } else if (data == 'sepatu') {
                    $('#sepatu').show()
                    $('#baju').hide()
                    $('#bola').hide()
                } else if (data == 'kosong') {
                    $('#sepatu').hide()
                    $('#baju').hide()
                    $('#bola').hide()
                }
            })
        });
    </script>
@endsection
