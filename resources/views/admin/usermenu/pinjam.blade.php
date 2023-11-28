@extends('layouts.master')
@section('activePinjam', 'active')

@section('content')
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Menu Peminjaman Buku
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card mt-2 card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Form Peminjaman Buku</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Riwayat Peminjaman Buku</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                        <form action="#" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="peminjam" class="form-label">Nama Peminjam</label>
                                        <input type="text" class="form-control" id="peminjam" name="peminjam" placeholder="Masukkan Nama Peminjam" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="judulbuku" class="form-label">Judul Buku</label>
                                        <input type="text" class="form-control" id="judulbuku" name="judulbuku" placeholder="Masukkan Judul Buku" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggalpinjam" class="form-label">Tanggal Peminjaman</label>
                                        <input type="date"  class="form-control" id="tanggalpinjam" name="tanggalpinjam" value="{{date('Y-m-d')}}" disabled/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggalkembali" class="form-label">Batas Peminjaman</label>
                                        <input type="date"  class="form-control" id="tanggalkembali" name="tanggalkembali" value="{{date('Y-m-d', strtotime('+7 day'))}}" disabled/>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="tsimpan">Tambahkan</button>
                                </div>
                            </form>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peminjam</th>
                                    <th>Judul Buku</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Batas Peminjaman</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Denda</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>J.K. Rowling</td>
                                    <td>Harry Potter and the Sorcerer's Stone</td>
                                    <td>{{date('Y-m-d')}}</td>
                                    <td>{{date('Y-m-d', strtotime('+7 day'))}}</td>
                                    <td>-</td>
                                    <td>0</td>
                            </tbody>
                        </table>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
    </div>
@endsection
