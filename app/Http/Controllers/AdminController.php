<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\Penerbit;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $sekolah = Profile::get();
        $totalAnggota = User::count(); // Get the total count of users
        $totalBuku = Buku::count();
        $totalPeminjam = Peminjaman::where('status', 'Dipinjam')->count();
        $totalPengembalian = Peminjaman::where('status', 'Dikembalikan')->orWhere('status', 'Terlambat')->count();
        $userRole = auth()->user()->role;
        return view('mainmenu.dashboard', compact('sekolah', 'totalAnggota', 'totalBuku', 'userRole', 'totalPeminjam', 'totalPengembalian'));
    }

}
