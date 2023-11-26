@extends('layouts.master')
@section('menuMaster', 'menu-open')
@section('activeMaster', 'active')
@section('activePinjaman', 'active')

@section('content')
    <div class="container-fluid ">
        <div class="row">
          <div class="col-12">
            <div class="card mt-2">
              <div class="card-header">
                <h3 class="card-title">Data Peminjaman Perpustakaan</h3>
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
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Peminjam</th>
                        <th>Juduk Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Denda</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>Berrrr</td>
                        <td>11/26/2023</td>
                        <td>11/29/2023</td>
                        <td>0</td>
                        <td>Dipinjam</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>

                    {{-- Modal Edit --}}
                    <div class="modal fade" id="modalEdit">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Mahasiswa</h1>
                            </div>
                            <form action="#" method="post">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama peminjam</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="John Doe" placeholder="Masukkan Nama Peminjam" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul Buku</label>
                                        <input type="text" class="form-control" id="judul" name="judul" value="Berrrr" placeholder="Masukkan NIM" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggalpinjam" class="form-label">Tanggal Pinjam</label>
                                        <input type="date"  class="form-control" id="tanggalpinjam" name="tanggalpinjam" value="{{date('Y-m-d')}}" disabled/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggalkembali" class="form-label">Tanggal Pengembalian</label>
                                        <input type="date"  class="form-control" id="tanggalkembali" name="tanggalkembali" value="{{date('Y-m-d', strtotime('+7 day'))}}" disabled/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="denda" class="form-label">Denda</label>
                                        <input type="text"  class="form-control" id="denda" name="denda" value="0" disabled"/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="dipinjam">Dipinjam</option>
                                            <option value="dikembalikan">Dikembalikan</option>
                                            <option value="terlambat">Terlambat</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="tsimpan">Tambahkan</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                    {{-- Modal Hapus --}}
                    <div class="modal fade" id="modalHapus">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                            </div>
                            <div class="modal-body">
                                <h5 class="text-center">Apakah anda yakin akan menghapus data ini? <br>
                                    <span class="text-danger">John Doe - Berrrr</span>
                                </h5>
                            </div>
                            <div class="modal-footer">
                                <form action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" name="hsimpan">Hapus</button>
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                  </tbody>
                </table>

              </div>
              <!-- /.card-body -->
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                        <i class="fa-solid fa-user-plus"></i>
                        Tambah Data
                    </button>
                </div>

                <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Mahasiswa</h1>
                            </div>
                            <form action="#" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="namapeminjam" class="form-label">Nama Peminjam</label>
                                        <input type="text" class="form-control" id="namapeminjam" name="namapeminjam" placeholder="Masukkan Nama Peminjam" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="judulbuku" class="form-label">Judul Buku</label>
                                        <input type="text" class="form-control" id="judulbuku" name="judulbuku" placeholder="Masukkan NIM" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggalpinjam" class="form-label">Tanggal Pinjam</label>
                                        <input type="date"  class="form-control" id="tanggalpinjam" name="tanggalpinjam" value="{{date('Y-m-d')}}" disabled/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggalkembali" class="form-label">Tanggal Pengembalian</label>
                                        <input type="date"  class="form-control" id="tanggalkembali" name="tanggalkembali" value="{{date('Y-m-d', strtotime('+7 day'))}}" disabled/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="denda" class="form-label">Denda</label>
                                        <input type="text"  class="form-control" id="denda" name="denda" value="0" disabled/>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="tsimpan">Tambahkan</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div>
@endsection
