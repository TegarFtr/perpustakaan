<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;

class DataBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Book::get();
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

        Book::create($requestData);

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
        // If a new image is uploaded, you can add validation or handle it as needed
        // For now, we'll keep the existing image
        unset($requestData['sampul']);
    } else {
        // Keep the existing image if no new image is uploaded
        $requestData['sampul'] = Book::findOrFail($id)->sampul;
    }

    // Make sure 'stok' field is present in the $requestData array
    $requestData['stok'] = $requestData['stock'];

    // Update the 'image' key in $requestData, not 'images'
    $requestData['image'] = $requestData['sampul'];

    // Remove 'stock' from $requestData if it's not needed in the database
    unset($requestData['stock']);

    $book = Book::findOrFail($id);
    $book->update($requestData);

    // Redirect with a success message
    return redirect()->route('data-buku.index')->with('success', 'Buku successfully updated!');
}




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Book::findOrFail($id);

        //delete image
        Storage::delete('public/image/'. $post->image);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('data-buku.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
