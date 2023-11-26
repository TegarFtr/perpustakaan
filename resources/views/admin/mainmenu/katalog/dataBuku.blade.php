@extends('layouts.master')
@section('menuKatalog', 'menu-open')
@section('activeKatalog', 'active')
@section('activeDataBuku', 'active')

@section('content')
<<<<<<< HEAD
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12">
                <div class="card mt-2">
                    <div class="card-header">
                        <h1 class="card-title">Data Buku Perpustakaan</h1>
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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Buku</th>
                                    <th>Pengarang</th>
                                    <th>Kategori</th>
                                    <th>Penerbit</th>
                                    <th>Sampul</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Harry Potter and the Sorcerer's Stone</td>
                                    <td>J.K. Rowling</td>
                                    <td>Fiksi Fantasi</td>
                                    <td>KIWKIW</td>
                                    <td>
                                        <img src="path_to_image.jpg" alt="Cover Buku" style="max-width: 100px;">
                                    </td>
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
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Buku</h1>
                                        </div>
                                        <form action="#" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="nis" class="form-label">Judul Buku</label>
                                                    <input type="text" class="form-control" id="nis" name="judulbuku" value="Harry Potter and the Sorcerer's Stone" placeholder="Masukkan Nama Peminjam" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Pengarang</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="J.K. Rowling" placeholder="Masukkan NIM" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Kategori</label>
                                                    <input type="text"  class="form-control" id="username" name="username" value="Fiksi Fantasi" placeholder="Masukkan Username"/>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Sampul</label>
                                                    <input type="file"  class="form-control" id="password" name="password" value="" placeholder=""/>
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
                                                <span class="text-danger">Harry Potter and the Sorcerer's Stone</span>
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
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Input Data Buku</h1>
                            </div>
                            <form action="#" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="judulbuku" class="form-label">Judul Buku</label>
                                        <input type="text" class="form-control" id="judulbuku" name="judulbuku" placeholder="Masukkan Judul Buku" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="pengarang" class="form-label">Pengarang</label>
                                        <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Masukkan Pengarang" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">Kategori</label>
                                        <input type="text"  class="form-control" id="kategori" name="kategori" placeholder="Masukkan Kategori"/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sampul" class="form-label">Sampul</label>
                                        <input type="file"  class="form-control" id="sampul" name="sampul"/>
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
=======
<div class="d-flex justify-content-between">
    <h1 class="m-3">Menu Buku</h1> 
    <div class="mr-5 mt-4">
        <a href="#" class="btn btn-primary">Tambah Buku</a>
    </div>
</div>

<div class="m-4">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th> 
                <th>Pengarang</th> 
                <th>Kategori</th> 
                <th>Gambar</th> 
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Harry Potter and the Sorcerer's Stone</td> 
                <td>J.K. Rowling</td> 
                <td>Fiksi Fantasi</td> 
                <td>
                    <img src="path_to_image.jpg" alt="Cover Buku" style="max-width: 100px;">
                </td>
                <td>
                    <a href="#" class="btn btn-primary mr-2">Edit</a>
                    <a href="#" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
>>>>>>> 0dcab1965e8b2cfe7ab3a35557124848e50a2fa6
@endsection
