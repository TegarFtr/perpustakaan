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
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>1</td>
                        <td>183</td>
                        <td>John Doe</td>
                        <td>1172014</td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, voluptates?</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                  </tbody>
                </table>

              </div>
              <!-- /.card-body -->
              <div class="card-footer text-right">
                <button type="button" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i> Tambah Data</button>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div>
@endsection
