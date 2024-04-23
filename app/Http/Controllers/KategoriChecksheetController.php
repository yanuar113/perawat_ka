<?php

namespace App\Http\Controllers;

use App\Models\Kategori_checksheet;
use App\Models\Kereta;
use Illuminate\Http\Request;

class KategoriChecksheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategories = Kategori_checksheet::select('kategori_checksheet.*',  'master_kereta.nama_kereta')
            ->join('master_kereta', 'kategori_checksheet.id_kereta', '=', 'master_kereta.id')
            ->get();
        $keretas = Kereta::all();
        // dd($keretas);
        $active = 'master_checksheet';
        return view('master_checksheet.kategori.index', compact('kategories', 'active', 'keretas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $active = 'master_checksheet';
        $keretas = Kereta::all();
        return view('master_checksheet.kategori.add', compact('active', 'keretas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required',
            'id_kereta' => 'required'
        ], [
            'nama.required' => 'Nama kategori tidak boleh kosong',
            'id_kereta.required' => 'Nama kereta tidak boleh kosong'
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
        $kategories = Kategori_checksheet::find($id);
        $keretas = Kereta::all();
        $active = 'master_checksheet';
        return view('master_checksheet.kategori.edit', compact('kategories', 'active', 'keretas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama' => 'required',
        ], [
            'nama.required' => 'Nama kategori tidak boleh kosong',
        ]);
        Kategori_checksheet::where('id', $id)
            ->update([
                'nama' => $request->nama,
            ]);

        return redirect()->route('kategori_checksheet.index')->with('status', 'Data Kategori Checksheet berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Kategori_checksheet::destroy($id);
        return redirect()->route('kategori_checksheet.index')->with('status', 'Data Kategori Checksheet berhasil dihapus!');
    }

    public function filter($id)
    {
        // $kategories = Kategori_checksheet::where('id_kereta', $keretaId)->get();
        $kategories = Kategori_checksheet::select('kategori_checksheet.*',  'master_kereta.nama_kereta')
        ->join('master_kereta', 'kategori_checksheet.id_kereta', '=', 'master_kereta.id')->where('kategori_checksheet.id_kereta', $id)
        ->get();
        $keretas = Kereta::all();
        $active = 'master_checksheet';
        return view('master_checksheet.kategori.index', compact('kategories', 'keretas', 'active'));
    }
}
