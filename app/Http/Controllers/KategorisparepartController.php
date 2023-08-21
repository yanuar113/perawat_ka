<?php

namespace App\Http\Controllers;

use App\Models\Kategori_sparepart;
use App\Models\Kereta;
use Illuminate\Http\Request;

class KategorisparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori_sparepart::all();
        $active = 'master_sparepart';
        return view('master_sparepart.kategori.show', compact('kategoris', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $active = 'master_sparepart';
        return view('master_sparepart.kategori.add',compact('active'));
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
        Kategori_sparepart::create($request->all());
        return redirect()->route('kategori.index')->with('status', 'Data Kategori Sparepart berhasil ditambahkan!');
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
        $kategoris = Kategori_sparepart::find($id);
        $active = 'master_sparepart';
        return view('master_sparepart.kategori.edit', compact('kategoris', 'active'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Nama kategori tidak boleh kosong',
        ]);
        Kategori_sparepart::where('id', $id)
            ->update([
                'nama_kategori' => $request->nama_kategori,
            ]);
        return redirect()->route('kategori.index')->with('status', 'Data Kategori Sparepart berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete kategori with id
        Kategori_sparepart::destroy($id);
        return redirect()->route('kategori.index')->with('status', 'Data Kategori Sparepart berhasil dihapus!');
    }
}
