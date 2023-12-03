<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $judulBuku = $judul;
        $data = Peminjaman::get()->where('nama_peminjam', Auth::user()->nama);
        $buku = Buku::get();
        $userRole = auth()->user()->role;
        return view('usermenu.pinjam', compact('data', 'buku', 'userRole'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama_peminjam' => 'required',
            'judul' => 'required',
            'tanggal_peminjaman' => 'required',
            'batas_peminjaman' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator->errors()->first());
        }

        // Validasi apakah buku tersedia atau tidak
        $book = Buku::where('judul', $request->judul)->first();

        if (!$book || $book->stok <= 0) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors('Buku tidak tersedia atau stok habis.');
        }

        // Mengurangi stok buku
        $book->stok -= 1;
        $book->save();

        // Menyiapkan data untuk disimpan
        $data = [
            'nama_peminjam' => $request->nama_peminjam,
            'judul' => $request->judul,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'batas_peminjaman' => $request->batas_peminjaman,
            'status' => 'Dipinjam',
        ];

        // Menyimpan data peminjaman
        Peminjaman::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan!');
        dd('Data berhasil disimpan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $peminjaman = Peminjaman::find($id);

        // Hitung selisih hari
        $tanggalPengembalian = \Carbon\Carbon::parse($request->tanggal_pengembalian);
        $batasPeminjaman = \Carbon\Carbon::parse($peminjaman->batas_peminjaman);
        $selisihHari = $tanggalPengembalian->diffInDays($batasPeminjaman);

        // Hitung denda jika terlambat
        $denda = $selisihHari > 0 ? $selisihHari * 1000 : 0;

        // Simpan data pengembalian
        $peminjaman->status = $selisihHari > 0 ? 'Terlambat' : 'Dikembalikan';
        $peminjaman->tanggal_pengembalian = $request->tanggal_pengembalian;
        $peminjaman->denda = $denda;
        $peminjaman->save();

        $data['status'] = $selisihHari > 0 ? 'Terlambat' : 'Dikembalikan';
        $data['tanggal_pengembalian'] = $request->tanggal_pengembalian;
        $data['denda'] = $denda;

        Peminjaman::whereId($id)->update($data);

        // Tambahkan stok buku kembali
        $book = Buku::where('judul', $peminjaman->judul)->first();
        $book->stok += 1;
        $book->save();

        return redirect()->back()->with('success', 'Buku berhasil dikembalikan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
