<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kategori::get();
        $userRole = auth()->user()->role;
        return view('mainmenu.katalog.kategoriBuku', compact('data', 'userRole'));
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
            'nama' => 'required|min:2',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator->errors()->first()); // Passing the first error message as a string
        }

        $data['nama'] = $request->nama;

        Kategori::create($data);

        // Redirect with a success message
        return redirect()->route('kategori.index')->with('success', 'Kategori successfully added!');

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
        $validator = Validator::make($request->all(),[
            'nama' => 'required'
        ]);
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['nama'] = $request -> nama;;

        Kategori::whereId($id)->update($data);

        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Kategori::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('kategori');
    }
}
