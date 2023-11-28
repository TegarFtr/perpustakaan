@extends('layouts.masteruser')
@section('activeListBuku', 'active')

@section('content')
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            List Buku
            <small>
                <script type='text/javascript'>
                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                    var date = new Date();
                    var day = date.getDate();
                    var month = date.getMonth();
                    var thisDay = date.getDay(),
                        thisDay = myDays[thisDay];
                    var yy = date.getYear();
                    var year = (yy < 1000) ? yy + 1900 : yy;
                    document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                    //
                </script>
            </small>
        </h1>
    </section>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12">
                <div class="card mt-2">
                    <div class="card-header">
                        <h1 class="card-title">List Buku</h1>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 680px;">
                        <div class="row row-cols-1 row-cols-md-6 g-4 ml-1 mr-1">
                            <div class="col">
                                <div class="card">
                                <img src="{{ asset('tesbuku/kedamaian.jpg') }}" class="card-img-top" alt="Gambar Buku">
                                <div class="card-body">
                                    <h5 class="card-title">Kedamaian</h5>
                                    <p class="card-text">Deskripsi singkat dari buku.</p>
                                    <div class="d-flex justify-content-between">
                                    <p class="card-stock">Stok: 10</p>
                                    <a href="#" class="btn btn-secondary">Pinjam</a>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                <img src="{{ asset('tesbuku/pulang.jpg') }}" class="card-img-top" alt="Gambar Buku">
                                <div class="card-body">
                                    <h5 class="card-title">Pulang</h5>
                                    <p class="card-text">Deskripsi singkat dari buku.</p>
                                    <div class="d-flex justify-content-between">
                                    <p class="card-stock">Stok: 5</p>
                                    <a href="#" class="btn btn-secondary">Pinjam</a>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                <img src="{{ asset('tesbuku/senja.jpg') }}" class="card-img-top" alt="Gambar Buku">
                                <div class="card-body">
                                    <h5 class="card-title">Senja</h5>
                                    <p class="card-text">Deskripsi singkat dari buku.</p>
                                    <div class="d-flex justify-content-between">
                                    <p class="card-stock">Stok: 3</p>
                                    <a href="#" class="btn btn-secondary">Pinjam</a>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        </div>
</div>
@endsection


