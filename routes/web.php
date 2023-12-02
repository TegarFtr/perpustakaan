<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataAnggotaController;
use App\Http\Controllers\DataBukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ListBukuController;
use App\Http\Controllers\PenerbitController;
use Illuminate\Support\Facades\Route;


Route::get('/login', function () { return view('login'); });
Route::get('/registrasi', function () { return view('register'); });

// Admin
// Main Menu
Route::get('/admin', [AdminController::class, 'index'])->name('index');
Route::get('/admin/laporan', function () { return view('admin.mainmenu.laporan'); });
// Master Data
Route::resource('anggota', DataAnggotaController::class);
Route::get('/admin/peminjaman', function () { return view('admin.mainmenu.masterdata.peminjaman'); });
// Katalog Buku
Route::resource('data-buku', DataBukuController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('penerbit', PenerbitController::class);

// Menu User
Route::get('/admin/pinjam', function () { return view('admin.usermenu.pinjam'); });
Route::get('/admin/kembali', function () { return view('admin.usermenu.kembali'); });
Route::resource('list-buku', ListBukuController::class);
// Menu Lain
Route::get('/admin/profile', function () { return view('admin.menulain.profile'); });
Route::get('/admin/petugas', function () { return view('admin.menulain.petugas'); });
// Akhir Admin

