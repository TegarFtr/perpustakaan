@extends('layouts.master')
@section('activeListBuku', 'active')

@section('content')
<div class="container">
    <h1 class="m-3">Menu List Buku</h1>
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <div class="col">
        <div class="card">
          <img src="..." class="card-img-top" alt="Gambar Buku">
          <div class="card-body">
            <h5 class="card-title">Judul Buku</h5>
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
          <img src="..." class="card-img-top" alt="Gambar Buku">
          <div class="card-body">
            <h5 class="card-title">Judul Buku</h5>
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
          <img src="..." class="card-img-top" alt="Gambar Buku">
          <div class="card-body">
            <h5 class="card-title">Judul Buku</h5>
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

@endsection
