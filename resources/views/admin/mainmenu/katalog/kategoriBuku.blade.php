@extends('layouts.master')
@section('menuKatalog', 'menu-open')
@section('activeKatalog', 'active')
@section('activeKategoriBuku', 'active') 

@section('content')
<h1 class="m-3">Menu Kategori Buku</h1> 
<div class="m-4">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th> 
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Novel</td> 
                <td>
                    <a href="#" class="btn btn-primary mr-2">Edit</a>
                    <a href="#" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
        </tbody>
    </table>

    <a href="#" class="btn btn-primary">Tambah Kategori Buku</a> 
</div>
@endsection
