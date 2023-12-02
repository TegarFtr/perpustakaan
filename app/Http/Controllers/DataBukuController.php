<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class DataBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Buku::get();
        $penerbit = Penerbit::get();
        $kategori = Kategori::get();
        return view('admin.mainmenu.katalog.dataBuku', compact('data', 'penerbit', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|min:5',
            'pengarang' => 'required|min:2',
            'kategori' => 'required',
            'penerbit' => 'required',
            'sampul' => 'required',
            'stock' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator->errors()->first());
        }

        $requestData = $request->all();

        // Validate and store the image/sampul
        if ($request->hasFile('sampul')) {
            $fileName = time() . $request->file('sampul')->getClientOriginalName();
            $path = $request->file('sampul')->storeAs('images', $fileName, 'public');
            $requestData["sampul"] = '/storage/' . $path;
        } else {
            // Handle the case where no file is uploaded
            return redirect()
                ->back()
                ->withInput()
                ->withErrors('Please upload a valid file for the sampul.');
        }

        // Make sure 'stok' field is present in the $requestData array
        $requestData['stok'] = $requestData['stock'];
        $requestData['image'] = $requestData['sampul'];

        // Remove 'stock' from $requestData if it's not needed in the database
        unset($requestData['stock']);
        unset($requestData['sampul']);

        Buku::create($requestData);

        // Redirect with a success message
        return redirect()->route('data-buku.index')->with('success', 'Buku successfully added!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    }

public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'judul' => 'required|min:5',
        'pengarang' => 'required|min:2',
        'kategori' => 'required',
        'penerbit' => 'required',
        'sampul' => "required|unique:users,username, $id",
        'stock' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()
            ->back()
            ->withInput()
            ->withErrors($validator->errors()->first());
    }

    $requestData = $request->all();

    // Validate and keep the existing image
    if ($request->hasFile('sampul')) {
        $fileName = time() . $request->file('sampul')->getClientOriginalName();
        $path = $request->file('sampul')->storeAs('images', $fileName, 'public');
        $requestData["sampul"] = '/storage/' . $path;
    } else {
        // Keep the existing image if no new image is uploaded
        $requestData['sampul'] = Buku::findOrFail($id)->sampul;
    }

    // Make sure 'stok' field is present in the $requestData array
    $requestData['stok'] = $requestData['stock'];

    // Update the 'image' key in $requestData, not 'images'
    $requestData['image'] = isset($requestData['sampul']) ? $requestData['sampul'] : '';

    // Remove 'stock' from $requestData if it's not needed in the database
    unset($requestData['stock']);
    unset($requestData['sampul']);

    $book = Buku::findOrFail($id);
    $book->update($requestData);

    // Redirect with a success message
    return redirect()->route('data-buku.index')->with('success', 'Buku successfully updated!');
}




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Buku::findOrFail($id);

        //delete image
        Storage::delete('public/image/'. $post->image);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('data-buku.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
