@extends('layouts.master')
@section('activeDashboard', 'active')
@section('title', 'Simpus | Dashboard')

@section('content')
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Dashboard
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

    @if(in_array($userRole, ['admin', 'petugas']))
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h3>{{ $totalAnggota }}</h3>

                        <p>Anggota</p>
                        </div>
                        <div class="icon">
                        <i class="fa-solid fa-users"></i>
                        </div>
                        <a href="{{ route('anggota.index') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="small-box bg-success">
                        <div class="inner">
                        <h3>{{ $totalBuku }}</h3>

                        <p>Buku</p>
                        </div>
                        <div class="icon">
                        <i class="fa-solid fa-book-open"></i>
                        </div>
                        <a href="{{ route('data-buku.index') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3" >
                    <div class="small-box bg-warning" >
                        <div class="inner">
                        <h3 style="color: white">{{ $totalPeminjam }}</h3>

                        <p style="color: white">Peminjaman</p>
                        </div>
                        <div class="icon">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        </div>
                        <a href="{{ url('/admin/pinjam') }}" class="small-box-footer" >
                        <span style="color: white">More info</span> <i class="fas fa-arrow-circle-right" style="color: white"></i>
                        </a>
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="small-box bg-danger">
                        <div class="inner text-white">
                        <h3>{{ $totalPengembalian }}</h3>

                        <p>Pengembalian</p>
                        </div>
                        <div class="icon">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        </div>
                        <a href="{{ url('/admin/kembali') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->


        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    @endif

    @if(in_array($userRole, ['admin', 'user', 'petugas']))
    <!-- Main content -->
    <section class="content">
        <div class="alert alert-secondary" style="color: #383d41; background-color: #e2e3e5; border-color: #d6d8db;">
            Selamat datang <b>{{ Auth::user()->nama }}</b> di {{ $sekolah->first()->nama }}.
        </div>
        <!-- -->

        <img src="{{ asset('AdminLTE') }}/dist/img/tutwuri.png" width="120px" height="120px" style="display: block; margin-left: auto; margin-right: auto; margin-top: 100px;">

        <h1 class="text-center">{{ $sekolah->first()->nama }}</h1>
        <p class="text-center">{{ $sekolah->first()->alamat }}</p>
    </section>
    <!-- /.content -->
    @endif
@endsection
