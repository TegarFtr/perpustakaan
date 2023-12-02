<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataAnggotaController extends Controller
{
    // Awal Data ANggota
    public function dataAnggota(){
        $data = User::get();
        return view('admin.mainmenu.masterdata.anggota', compact('data'));
    }

    public function storeAnggota(Request $request){
        $validator = Validator::make($request->all(), [
            'nis' => 'required|min:5',
            'nama' => 'required|min:2',
            'username' => 'required|unique:users,username',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator->errors()->first()); // Passing the first error message as a string
        }

        $data['nis'] = $request->nis;
        $data['nama'] = $request->nama;
        $data['username'] = $request->username;
        $data['password'] = $request->password;

        User::create($data);

        // Redirect with a success message
        return redirect()->route('anggota')->with('success', 'Anggota successfully added!');
    }

    public function hapus(Request $request, $id){
        $data = User::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('anggota');
    }
    // Akhir Data Anggota
}
