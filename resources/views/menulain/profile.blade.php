@extends('layouts.master')
@section('activeProfile', 'active')

@section('content')
  <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Identitas Applikasi
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
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Edit Identitas Applikasi</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ route('profile.update', $data->first()->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <input name="id_identitas" type="hidden" value="1">
                            <div class="form-group">
                                <label for="nameApp">Nama Applikasi</label>
                                <input type="text" class="form-control" id="nameApp" value="{{ $data->first()->nama }}" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="alamaT">Alamat Lengkap</label>
                                <textarea class="form-control" style="height: 80px; resize: none;" name="alamat" required>{{ $data->first()->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="emaiL">Email</label>
                                <input type="email" class="form-control" id="emaiL" value="{{ $data->first()->email }}" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="telP">Nomor Telpon</label>
                                <input type="number" class="form-control" id="telP" value="{{ $data->first()->telepon }}" name="telepon" required>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-block btn-primary">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Identitas Applikasi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <img src="{{ asset('AdminLTE') }}/dist/img/tutwuri.png" style="width: 125px; height: 125px; display: block; margin-left: auto; margin-right: auto; margin-top: -10px; margin-bottom: 15px;">
                        <!-- Animasi -->
                        <!--<lottie-player src="../../assets/json/3151-books.json" background="transparent" speed="1" style="width: 125px; height: 125px; display: block; margin-left: auto; margin-right: auto; margin-top: -50px; margin-bottom: 15px;" loop autoplay></lottie-player>
                        -->
                        <p style="font-weight: bold;">Nama Applikasi : {{ $data->first()->nama }}</p>
                        <p style="font-weight: bold;">Alamat : {{ $data->first()->alamat }}</p>
                        <p style="font-weight: bold;">Email : {{ $data->first()->email }}</p>
                        <p style="font-weight: bold;">Nomor Telepon : {{ $data->first()->telepon }}</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.row -->
    </section>
@endsection
