@extends('layouts.master')
@section('activeListBuku', 'active')

@section('content')
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12">
                <div class="card mt-2">
                    <div class="card-header">
                        <h1 class="card-title">List Buku</h1>
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
                        <div class="row row-cols-1 row-cols-md-6 g-4 ml-1 mr-1">
                            <div class="col">
                                <div class="card">
                                <img src="{{ asset('tesbuku/kedamaian.jpg') }}" class="card-img-top" alt="Gambar Buku">
                                <div class="card-body">
                                    <h5 class="card-title">Kedamaian</h5>
                                    <p class="card-text">Deskripsi singkat dari buku.</p>
                                    <div class="d-flex justify-content-between">
                                    <p class="card-stock">Stok: 10</p>
                                    <a href="#" class="btn btn-secondary">Pinjam</a>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                <img src="{{ asset('tesbuku/pulang.jpg') }}" class="card-img-top" alt="Gambar Buku">
                                <div class="card-body">
                                    <h5 class="card-title">Pulang</h5>
                                    <p class="card-text">Deskripsi singkat dari buku.</p>
                                    <div class="d-flex justify-content-between">
                                    <p class="card-stock">Stok: 5</p>
                                    <a href="#" class="btn btn-secondary">Pinjam</a>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                <img src="{{ asset('tesbuku/senja.jpg') }}" class="card-img-top" alt="Gambar Buku">
                                <div class="card-body">
                                    <h5 class="card-title">Senja</h5>
                                    <p class="card-text">Deskripsi singkat dari buku.</p>
                                    <div class="d-flex justify-content-between">
                                    <p class="card-stock">Stok: 3</p>
                                    <a href="#" class="btn btn-secondary">Pinjam</a>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
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
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Input Data Penerbit</h1>
                            </div>
                            <form action="#" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="namapenerbit" class="form-label">Nama Penerbit</label>
                                        <input type="text" class="form-control" id="namapenerbit" name="namapenerbit" placeholder="Masukkan Nama Penerbit" />
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


