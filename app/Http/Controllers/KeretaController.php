<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kereta;
use Illuminate\Support\Facades\Hash;

class KeretaController extends Controller
{
 

    public function index()
    {
        $trains = Kereta::all();
        $active = 'master_kereta';
        return view('master_kereta.show', compact('trains', 'active'));
    }
    public function create()
    {
        //
        $active = 'master_kereta';
        return view('master_kereta.add',compact('active'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //save to database
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'nama_kereta' => 'required',
            'foto' => 'required',
        ], [
            'username.required' => 'Username tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'nama_kereta.required' => 'Nama kereta tidak boleh kosong',
            'foto.required' => 'Foto tidak boleh kosong',
        ]);
        // Kereta::create($request->all());

        $file = $request->file('foto');
        if ($file) {
            //generate random name and upload in folder public/img
            $file_name = time() . "_" . $file->getClientOriginalName();
            $file->move('img', $file_name);
            $foto = $file_name;
        }else{
            $foto = null;
        }

        $kereta = new Kereta;
        $kereta->username = $request->username;
        $kereta->password = Hash::make($request->password);
        // $kereta->password = $request->password;
        $kereta->nama_kereta = $request->nama_kereta;
        $kereta->foto = $foto;
        $kereta->save();
// dd($kereta);

        return redirect()->route('kereta.index')->with('status', 'Data Kereta berhasil ditambahkan!');
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
        Kereta::destroy($id);
        return redirect()->route('kereta.index')->with('status', 'Data Kereta berhasil dihapus!');
    }
}
