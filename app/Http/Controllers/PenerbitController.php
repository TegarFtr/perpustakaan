<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('search');
        $penerbit = Penerbit::get();
        $userRole = auth()->user()->role;
        $data = $query
            ? Penerbit::where('nama', 'LIKE', "%$query%")->get()
            : Penerbit::get();
        return view('mainmenu.katalog.penerbit', compact('data', 'userRole'));
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

        Penerbit::create($data);

        // Redirect with a success message
        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil ditambahkan!');
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

        Penerbit::whereId($id)->update($data);

        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Penerbit::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil dihapus!');
    }
}
