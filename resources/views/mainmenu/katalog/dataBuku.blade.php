@extends('layouts.master')
@section('menuKatalog', 'menu-open')
@section('activeKatalog', 'active')
@section('activeDataBuku', 'active')
@section('title', 'Simpus | Data Buku')

@section('content')
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Data Buku
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
                    <div class="card-body table-responsive p-0" style="height: 620px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Buku</th>
                                    <th>Pengarang</th>
                                    <th>Kategori</th>
                                    <th>Penerbit</th>
                                    <th>Sampul</th>
                                    <th>Stock</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $book)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $book->judul }}</td>
                                    <td>{{ $book->pengarang }}</td>
                                    <td>{{ $book->kategori }}</td>
                                    <td>{{ $book->penerbit }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset($book->image) }}" alt="Cover Buku" style="max-width: 100px;">
                                    </td>
                                    <td>{{ $book->stok }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit{{ $book->id }}"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus{{ $book->id }}"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>

                                {{-- Modal Edit --}}
                                <div class="modal fade" id="modalEdit{{ $book->id }}">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Buku</h1>
                                        </div>
                                        <form action="{{ route('data-buku.update', $book->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="nis" class="form-label">Judul Buku</label>
                                                    <input type="text" class="form-control" id="nis" name="judul" value="{{ $book->judul }}" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Pengarang</label>
                                                    <input type="text" class="form-control" id="nama" name="pengarang" value="{{ $book->pengarang }}" placeholder="Masukkan NIM" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kategori" class="form-label">Kategori</label>
                                                    <select class="form-control" name="kategori" id="kategori">
                                                        <option value="">Pilih Kategori Buku</option>
                                                        @foreach ($kategori as $k)
                                                            <option value="{{ $k->nama }}" {{ $book->kategori == $k->nama ? 'selected' : '' }}>
                                                                {{ $k->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="penerbit" class="form-label">Penerbit</label>
                                                    <select class="form-control" name="penerbit" id="penerbit">
                                                        <option value="">Pilih Penerbit Buku</option>
                                                        @foreach ($penerbit as $pen)
                                                            <option value="{{ $pen->nama }}" {{ $book->penerbit == $pen->nama ? 'selected' : '' }}>
                                                                {{ $pen->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-3">
                                                    <label for="sampul" class="form-label">Sampul</label>
                                                    <input type="file"  class="form-control" id="sampul" name="sampul" accept="image/*" value="{{ $book->image }}"/>
                                                </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="stock" class="form-label">Stock</label>
                                                    <input type="number"  class="form-control" id="stock" name="stock" value="{{ $book->stok }}" placeholder="Masukkan Stock Buku"/>
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
                                <div class="modal fade" id="modalHapus{{ $book->id }}">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="text-center">Apakah anda yakin akan menghapus data ini? <br>
                                                <span class="text-danger">{{ $book->judul }}</span>
                                            </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('data-buku.destroy', $book->id) }}" method="POST">
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
                                @endforeach
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
                            <form action="{{ route('data-buku.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="judulbuku" class="form-label">Judul Buku</label>
                                        <input type="text" class="form-control" id="judulbuku" name="judul" placeholder="Masukkan Judul Buku" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="pengarang" class="form-label">Pengarang</label>
                                        <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Masukkan Pengarang" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">Kategori</label>
                                        <select class="form-control" name="kategori" id="kategori">
                                            <option value="">Pilih Kategori Buku</option>
                                            @foreach ($kategori as $k)
                                                <option value="{{ $k->nama }}">{{ $k->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="penerbit" class="form-label">Penerbit</label>
                                        <select class="form-control" name="penerbit" id="penerbit">
                                            <option value="">Pilih Penerbit Buku</option>
                                            @foreach ($penerbit as $pen)
                                                <option value="{{ $pen->nama }}">{{ $pen->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sampul" class="form-label">Sampul</label>
                                        <input type="file"  class="form-control" id="sampul" name="sampul" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"/>
                                    </div>
                                    <div class="mt-3"><img src="" id="output" alt="" width="100"></div>
                                    <div class="mb-3">
                                        <label for="stock" class="form-label">Stock</label>
                                        <input type="number"  class="form-control" id="stock" name="stock" value="" placeholder="Masukkan Stock Buku"/>
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
