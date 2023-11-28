@extends('layouts.masteruser')
@section('activeDashboard', 'active')

@section('content')
   <!-- Content Header (Page header) -->
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

    <!-- Main content -->
    <section class="content">
                        <div class="alert alert-secondary" style="color: #383d41; background-color: #e2e3e5; border-color: #d6d8db;">
            Selamat Siang, Selamat datang <b>Reza  Saputra</b> di Perpustakaan SMAN Pati.
        </div>
        <!-- -->

        <img src="{{ asset('AdminLTE') }}/dist/img/tutwuri.png" width="120px" height="120px" style="display: block; margin-left: auto; margin-right: auto; margin-top: 100px;">

        <h1 class="text-center">Perpustakaan SMAN Pati</h1>
        <p class="text-center">Alamat : Jl. P. Sudirman No.24, Puri, Plangitan, Kec. Pati, Kabupaten Pati, Jawa Tengah</p>
    </section>
    <!-- /.content -->
@endsection
