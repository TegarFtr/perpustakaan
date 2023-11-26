@extends('layouts.master')
@section('menuMaster', 'menu-open')
@section('activeMaster', 'active')
@section('activeAnggota', 'active')


@section('content')
    <div class="container-fluid ">
        <div class="row">
          <div class="col-12">
            <div class="card mt-2">
              <div class="card-header">
                <h3 class="card-title">Data Anggota Perpustakaan</h3>
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
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>1</td>
                        <td>183</td>
                        <td>John Doe</td>
                        <td>admin</td>
                        <td>admin</td>
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
                                        <label for="nis" class="form-label">NIS</label>
                                        <input type="text" class="form-control" id="nis" name="nis" value="183" placeholder="Masukkan Nama Peminjam" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="John Doe" placeholder="Masukkan NIM" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text"  class="form-control" id="username" name="username" value="admin" placeholder="Masukkan Username"/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text"  class="form-control" id="password" name="password" value="admin" placeholder="Masukkan Password"/>
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
                                    <span class="text-danger">John Doe - 183</span>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                        <i class="fa-solid fa-user-plus"></i>
                        Tambah Data
                    </button>
                </div>

                <div class="modal fade" id="modalTambah">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Mahasiswa</h1>
                            </div>
                            <form action="#" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nis" class="form-label">NIS</label>
                                        <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan Nama Peminjam" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan NIM" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text"  class="form-control" id="username" name="username" placeholder="Masukkan Username"/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text"  class="form-control" id="password" name="password" placeholder="Masukkan Password"/>
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
