<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Buku;
use Illuminate\Http\Request;

class ListBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('search');
        $buku = Buku::get();
        $userRole = auth()->user()->role;
        $data = $query
            ? Buku::where('judul', 'LIKE', "%$query%")->get()
            : Buku::get();

        return view('usermenu.listBuku', compact('buku', 'data', 'userRole'));
    }

    public function saveToSession(Request $request)
    {
        $judul = $request->input('judul');

        // Simpan judul ke dalam sesi
        $request->session()->put('judul_peminjaman', $judul);

        return response()->json(['success' => true]);
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
        //
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
