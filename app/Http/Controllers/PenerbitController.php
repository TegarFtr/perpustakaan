<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenerbitController extends Controller
{
    // Awal Penerbit Buku
    public function dataPenerbit(){
        $data = Penerbit::get();
        return view('admin.mainmenu.katalog.penerbit', compact('data'));
    }

    public function storePenerbit(Request $request){
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
        return redirect()->route('penerbit')->with('success', 'Penerbit successfully added!');
    }

    public function updatePenerbit(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'nama' => 'required'
        ]);
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['nama'] = $request -> nama;;

        Penerbit::whereId($id)->update($data);

        return redirect()->route('penerbit');
    }

    public function hapusPenerbit(Request $request, $id){
        $data = Penerbit::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('penerbit');
    }
    // Akhir Kategori Buku
}
