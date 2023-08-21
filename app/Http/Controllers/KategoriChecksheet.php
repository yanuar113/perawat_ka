<?php

namespace App\Http\Controllers;

use App\Models\Kategori_checksheet;
use Illuminate\Http\Request;

class KategoriChecksheet extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategories = Kategori_checksheet::all();
        $active = 'master_checksheet';
        return view('master_checksheet.kategori.show', compact('kategories', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $active='master_checksheet';
        return view('master_checksheet.kategori.add',compact('active'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Nama kategori tidak boleh kosong',
        ]);
        
        Kategori_checksheet::create($request->all());
        return redirect()->route('kategori_checksheet.index')->with('status', 'Data Kategori Checksheet berhasil ditambahkan!');
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
    }
}
