<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataAnggotaController;
use App\Http\Controllers\DataBukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ListBukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SesiController;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});


    // Logout route
    Route::get('/logout', [SesiController::class, 'logout']);

    // Redirect /home to /dashboard
    Route::get('/home', function () {
        return redirect('dashboard');
    });
    Route::get('dashboard', [AdminController::class, 'index']);

    // Admin routes
    Route::middleware(['auth','admin'])->group(function () {
        Route::get('profile', function () {
            $userRole = auth()->user()->role;
            return view('menulain.profile', compact('userRole'));
        });
        Route::resource('petugas', PetugasController::class);
    });

    // Petugas routes
    Route::middleware(['auth','petugas'])->group(function () {

        Route::get('laporan', function () {
            $userRole = auth()->user()->role;
            return view('mainmenu.laporan', compact('userRole'));
        });

        Route::resource('anggota', DataAnggotaController::class);
        Route::get('rekap-peminjaman', function () {
            $data = Peminjaman::get();
            $userRole = auth()->user()->role;
            return view('mainmenu.masterdata.peminjaman', compact('data', 'userRole'));
        });

        Route::resource('data-buku', DataBukuController::class);
        Route::resource('kategori', KategoriController::class);
        Route::resource('penerbit', PenerbitController::class);
    });

    // User routes
    Route::middleware(['auth','user'])->group(function () {
        Route::resource('peminjaman', PeminjamanController::class);
        Route::get('kembali', function () {
            $userRole = auth()->user()->role;
            return view('usermenu.kembali', compact('userRole'));
        });
        Route::resource('list-buku', ListBukuController::class);
    });
