<?php

use Illuminate\Support\Facades\Route;


Route::get('/login', function () { return view('login'); });
Route::get('/registrasi', function () { return view('register'); });

// Admin
// Main Menu
Route::get('/admin', function () { return view('admin.mainmenu.dashboard'); });
Route::get('/admin/laporan', function () { return view('admin.mainmenu.laporan'); });
// Master Data
Route::get('/admin/anggota', function () { return view('admin.mainmenu.masterdata.anggota'); });
Route::get('/admin/peminjaman', function () { return view('admin.mainmenu.masterdata.peminjaman'); });
// Katalog Buku
Route::get('/admin/data-buku', function () { return view('admin.mainmenu.katalog.dataBuku'); });
Route::get('/admin/kategori-buku', function () { return view('admin.mainmenu.katalog.kategoriBuku'); });
Route::get('/admin/penerbit', function () { return view('admin.mainmenu.katalog.penerbit'); });
// Menu User
Route::get('/admin/pinjam', function () { return view('admin.usermenu.pinjam'); });
Route::get('/admin/kembali', function () { return view('admin.usermenu.kembali'); });
Route::get('/admin/list-buku', function () { return view('admin.usermenu.listBuku'); });
// Menu Lain
Route::get('/admin/profile', function () { return view('admin.menulain.profile'); });
Route::get('/admin/petugas', function () { return view('admin.menulain.petugas'); });
// Akhir Admin

// Petugas
Route::get('/petugas', function () { return view('petugas.mainmenu.dashboard'); });
Route::get('/petugas/laporan', function () { return view('petugas.mainmenu.laporan'); });
// Master Data
Route::get('/petugas/anggota', function () { return view('petugas.mainmenu.masterdata.anggota'); });
Route::get('/petugas/peminjaman', function () { return view('petugas.mainmenu.masterdata.peminjaman'); });
// Katalog Buku
Route::get('/petugas/data-buku', function () { return view('petugas.mainmenu.katalog.dataBuku'); });
Route::get('/petugas/kategori-buku', function () { return view('petugas.mainmenu.katalog.kategoriBuku'); });
Route::get('/petugas/penerbit', function () { return view('petugas.mainmenu.katalog.penerbit'); });
// Akhir Petugas

// USer
Route::get('/user', function () { return view('user.usermenu.dashboard'); });
Route::get('/user/pinjam', function () { return view('user.usermenu.pinjam'); });
Route::get('/user/kembali', function () { return view('user.usermenu.kembali'); });
Route::get('/user/list-buku', function () { return view('user.usermenu.listBuku'); });
// Akhir User
