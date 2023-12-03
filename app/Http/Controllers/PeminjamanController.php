<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Peminjaman::get();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
