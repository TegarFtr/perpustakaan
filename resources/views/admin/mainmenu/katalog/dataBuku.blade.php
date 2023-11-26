@extends('layouts.master')
@section('menuKatalog', 'menu-open')
@section('activeKatalog', 'active')
@section('activeDataBuku', 'active')

@section('content')
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
@endsection
