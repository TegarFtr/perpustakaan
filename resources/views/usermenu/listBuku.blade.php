@extends('layouts.master')
@section('activeListBuku', 'active')
@section('title', 'Simpus | List Buku')

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
                </script>
            </small>
        </h1>
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-2">
                    <div class="card-header">
                        <h1 class="card-title">List Buku</h1>
                        <div class="card-tools">
                            <form action="{{ route('list-buku.index') }}" method="get" class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" id="searchInput" name="search" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 680px;">
                        <div class="row row-cols-1 row-cols-md-6 g-4 ml-1 mr-1" id="bookList">
                            @foreach ($data as $ls)
                                <div class="col">
                                    <div class="card">
                                        <img src="{{ asset("$ls->image") }}" class="card-img-top" alt="Gambar Buku">
                                        <div class="card-body">
                                            <h3 class="card-title"><strong>{{ $ls->judul }}</strong></h3>
                                            <p class="card-text">{{ $ls->pengarang }}</p>
                                            <p class="card-stock">Stok : {{ $ls->stok }}</p>
                                            <a href="" class="btn btn-secondary btn-pinjam" data-toggle="modal" data-target="#modalTambah{{ $ls->id }}" data-judul="{{ $ls->judul }}">Pinjam</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="modalTambah{{ $ls->id }}" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog position-absolute top-50 start-50 translate-middle">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Anggota</h1>
                                            </div>
                                            <form action="{{ route('peminjaman.store') }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="peminjam" class="form-label">Nama Peminjam</label>
                                                        <input type="text" class="form-control" id="peminjam" name="nama_peminjam" placeholder="Masukkan Nama Peminjam" value="{{ Auth::user()->nama }}" readonly/>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="judulbuku" class="form-label">Judul Buku</label>
                                                        <input type="text" class="form-control" id="judulbuku" name="judul" value="{{ $ls->judul }}" placeholder="Masukkan Judul Buku"/>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="tanggalpinjam" class="form-label">Tanggal Peminjaman</label>
                                                        <input type="date"  class="form-control" id="tanggalpinjam" name="tanggal_peminjaman" value="{{date('Y-m-d')}}" readonly/>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="tanggalkembali" class="form-label">Batas Peminjaman</label>
                                                        <input type="date"  class="form-control" id="tanggalkembali" name="batas_peminjaman" value="{{date('Y-m-d', strtotime('+7 day'))}}" readonly/>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" name="tsimpan">Tambahkan</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
