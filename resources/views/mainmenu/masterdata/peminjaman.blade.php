@extends('layouts.master')
@section('menuMaster', 'menu-open')
@section('activeMaster', 'active')
@section('activePinjaman', 'active')
@section('title', 'Simpus | Data Peminjaman')

@section('content')
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Data Peminjaman
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
                <h3 class="card-title">Data Peminjaman Perpustakaan</h3>
                <div class="card-tools">
                    <form action="{{ url('rekap-peminjaman') }}" method="get" class="input-group input-group-sm" style="width: 150px;">
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
              <div class="card-body table-responsive p-0" style="height: 620px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Peminjam</th>
                        <th>Juduk Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Batas Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Denda</th>
                        <th>Status</th>
                    </tr>
                  </thead>
                    <tbody>
                        @foreach ($data as $pj)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pj->nama_peminjam }}</td>
                                <td>{{ $pj->judul }}</td>
                                <td>{{ $pj->tanggal_peminjaman }}</td>
                                <td>{{ $pj->batas_peminjaman }}</td>
                                <td>{{ $pj->tanggal_pengembalian }}</td>
                                <td>{{ $pj->denda }}</td>
                                <td class="text-center">
                                    @if($pj->status == 'Terlambat')
                                        <button type="button" class="btn btn-danger disabled" style="padding: 1px 5px; border-radius: 20px;">
                                            {{ $pj->status }}
                                        </button>
                                    @elseif($pj->status == 'Dipinjam')
                                        <button type="button" class="btn btn-primary disabled" style="padding: 1px 5px; border-radius: 20px;">
                                            {{ $pj->status }}
                                        </button>
                                    @elseif($pj->status == 'Dikembalikan')
                                        <button type="button" class="btn btn-success disabled" style="padding: 1px 5px; border-radius: 20px;">
                                            {{ $pj->status }}
                                        </button>
                                    @else
                                        <!-- Menangani status lain jika diperlukan -->
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                  </tbody>
                </table>

              </div>
              <!-- /.card-body -->
                <div class="card-footer text-right">
                </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div>
@endsection
