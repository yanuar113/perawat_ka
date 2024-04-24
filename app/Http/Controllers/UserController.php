<?php

namespace App\Http\Controllers;

use App\Models\Kereta;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $active = 'user';
        $users = User::select('users.*', 'master_kereta.nama_kereta')
            ->join('master_kereta','users.id_kereta','=','master_kereta.id')
            ->get();
            $keretas = Kereta::all();
        return view('master_user.index', compact('active', 'users','keretas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $active = 'user';
        $keretas = Kereta::all();
        return view('master_user.add', compact('active','keretas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'name' => 'required',
            'password' => 'required',
            'id_kereta' => 'required',
            'email' => 'required',
        ], [
            'nip.required' => 'NIP tidak boleh kosong',
            'name.required' => 'Nama tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'id_kereta.required' => 'Kereta tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
        ]);

        // dd($request->all());

        User::create($request->all());
        return redirect()->route('user.index')->with('status', 'Data berhasil ditambahkan');
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
        $active = 'user';
        $user = User::find($id);
        $keretas = Kereta::all();
        return view('master_user.edit', compact('active', 'user', 'keretas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nip' => 'required',
            'name' => 'required',
            'password' => 'required',
            'id_kereta' => 'required',
            'email' => 'required',
        ], [
            'nip.required' => 'NIP tidak boleh kosong',
            'name.required' => 'Nama tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'id_kereta.required' => 'Kereta tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
        ]);
        $user = User::find($id);
        $user->update($request->all());
        return redirect()->route('user.index')->with('status', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->route('user.index')->with('status', 'Data berhasil dihapus');
    }
}
