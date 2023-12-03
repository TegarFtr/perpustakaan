<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function cetakTanggal(Request $request){
        $tanggalPeminjaman = $request->datepicker;

        $data = Peminjaman::whereDate('tanggal_peminjaman', $tanggalPeminjaman)->get();

        return view('mainmenu.cetak.cetak-tanggal', compact('data', 'tanggalPeminjaman'));
    }

    public function cetakAnggota(Request $request){
        $namaAnggota = $request->nama_anggota;

        $data = Peminjaman::where('nama_peminjam', $namaAnggota)->get();

        return view('mainmenu.cetak.cetak-anggota', compact('data', 'namaAnggota'));
    }
}
