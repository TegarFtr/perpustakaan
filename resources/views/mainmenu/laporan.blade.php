@extends('layouts.master')
@section('activeLaporan', 'active')
@section('title', 'Simpus | Laporan')

@section('content')
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Laporan Perpustakaan
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

    <!-- Main content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card mt-2 card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Tanggal Peminjaman</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-yuk-tab" data-toggle="pill" href="#custom-tabs-four-yuk" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Anggota</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                    <section id="new">
                        <form action="{{ url('cetak-tanggal') }}" method="POST" target="_blank">
                            @csrf
                            <div class="form-group">
                                <label>Tanggal Peminjaman</label>
                                <input class="form-control" type="text" id="datepicker" name="datepicker" placeholder="Silahkan masukan tanggal peminjaman" readonly>
                            </div>
                            <div class=" form-group">
                                <button type="submit" target="_blank" class="btn btn-primary btn-block">Tampilkan Data</button>
                            </div>
                        </form>
                    </section>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-yuk" role="tabpanel" aria-labelledby="custom-tabs-four-yuk-tab">
                    <form action="{{ url('cetak-anggota') }}" method="POST" target="_blank">
                        @csrf
                        <div class="form-group">
                            <label>Nama Anggota</label>
                            <input type="text" class="form-control" name="nama_anggota" placeholder="Masukan Nama Anggota / Siswa" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Tampilkan Data</button>
                        </div>
                    </form>
                </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
    </div>
    <!-- /.content -->

    @push('scripts')
        <script>
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                showButtonPanel: true,
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:+0",
            });
        });
    </script>
    @endpush
@endsection
