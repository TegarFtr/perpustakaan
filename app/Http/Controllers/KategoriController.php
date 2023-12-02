<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    // Awal Kategori Buku
    public function dataKategori(){
        $data = Kategori::get();
        return view('admin.mainmenu.katalog.kategoriBuku', compact('data'));
    }

    public function storeKategori(Request $request){
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
        return redirect()->route('kategori')->with('success', 'Kategori successfully added!');
    }

    public function updateKategori(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'nama' => 'required'
        ]);
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['nama'] = $request -> nama;;

        Kategori::whereId($id)->update($data);

        return redirect()->route('kategori');
    }

    public function hapusKategori(Request $request, $id){
        $data = Kategori::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('kategori');
    }
    // Akhir Kategori Buku\
}
