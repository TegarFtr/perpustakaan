<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataAnggotaController;
use App\Http\Controllers\DataBukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use Illuminate\Support\Facades\Route;


Route::get('/login', function () { return view('login'); });
Route::get('/registrasi', function () { return view('register'); });

// Admin
// Main Menu
Route::get('/admin', [AdminController::class, 'index'])->name('index');
Route::get('/admin/laporan', function () { return view('admin.mainmenu.laporan'); });
// Master Data
Route::get('/admin/anggota', [DataAnggotaController::class, 'dataAnggota'])->name('anggota');
Route::post('/storeanggota', [DataAnggotaController::class, 'storeAnggota'])->name('storeAnggota');
Route::delete('/hapusanggota/{id}', [DataAnggotaController::class, 'hapus'])->name('hapusanggota');
Route::get('/admin/peminjaman', function () { return view('admin.mainmenu.masterdata.peminjaman'); });
// Katalog Buku
Route::resource('/admin/data-buku', DataBukuController::class);

Route::get('/admin/kategori-buku', [KategoriController::class, 'dataKategori'])->name('kategori');
Route::post('/storekategori', [KategoriController::class, 'storeKategori'])->name('storeKategori');
Route::put('/updatekategori/{id}', [KategoriController::class, 'updateKategori'])->name('updatekategori');
Route::delete('/hapuskategori/{id}', [KategoriController::class, 'hapusKategori'])->name('hapuskategori');

Route::get('/admin/penerbit', [PenerbitController::class, 'dataPenerbit'])->name('penerbit');
Route::post('/storepenerbit', [PenerbitController::class, 'storePenerbit'])->name('storePenerbit');
Route::put('/updatepenerbit/{id}', [PenerbitController::class, 'updatePenerbit'])->name('updatepenerbit');
Route::delete('/hapuspenerbit/{id}', [PenerbitController::class, 'hapusPenerbit'])->name('hapuspenerbit');
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
