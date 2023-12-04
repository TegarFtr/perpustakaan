<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('search');
        $anggota = User::get()->where('role', 'user');
        $userRole = auth()->user()->role;
        $data = $query
            ? User::where('nama', 'LIKE', "%$query%")->get()
            : User::get();
        return view('mainmenu.masterdata.anggota', compact('data', 'userRole'));
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
        $data['password_login'] = $request->password;
        $data['password'] = bcrypt($request->password);

        User::create($data);

        // Redirect with a success message
        return redirect()->route('anggota.index')->with('success', 'Anggota successfully added!');
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
            'nis' => 'required|min:5',
            'nama' => 'required|min:2',
            'username' => "required|unique:users,username,$id",
            'password' => 'required'
        ]);
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['nis'] = $request->nis;
        $data['nama'] = $request->nama;
        $data['username'] = $request->username;
        $data['password_login'] = $request->password;
        $data['password'] = bcrypt($request->password);

        User::whereId($id)->update($data);

        return redirect()->route('anggota.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('anggota.index');
    }
}
