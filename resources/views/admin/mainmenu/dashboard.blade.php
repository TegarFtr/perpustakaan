@extends('layouts.master')
@section('activeDashboard', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v2</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h3>150</h3>

                        <p>Anggota</p>
                        </div>
                        <div class="icon">
                        <i class="fa-solid fa-users"></i>
                        </div>
                        <a href="{{ url('/admin/anggota') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="small-box bg-success">
                        <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                        <p>Buku</p>
                        </div>
                        <div class="icon">
                        <i class="fa-solid fa-book-open"></i>
                        </div>
                        <a href="{{ url('/admin/data-buku') }}" class="small-box-footer">
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
                        <h3 style="color: white">44</h3>

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
                        <h3>65</h3>

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
@endsection
