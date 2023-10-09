<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori_sparepart;
use App\Models\Sparepart;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       //join table kategori_sparepart dan sparepart
        $spareparts = Sparepart::select('sparepart.*', 'kategori_sparepart.nama_kategori')
        ->join('kategori_sparepart', 'sparepart.id_kategori_sparepart', '=', 'kategori_sparepart.id')
        ->get();

        $active = 'master_sparepart';
        return view('master_sparepart.sparepart.show', compact('spareparts', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $active = 'master_sparepart';
        $spareparts = Sparepart::all();
        $kategori_spareparts = Kategori_sparepart::all();

        return view('master_sparepart.sparepart.add',compact('spareparts','kategori_spareparts','active'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori_sparepart' => 'required',
            'nama_sparepart' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required'
        ], [
            'id_kategori_sparepart.required' => 'Nama kategori tidak boleh kosong',
            'nama_sparepart.required' => 'Nama sparepart tidak boleh kosong',
            'jumlah.required' => 'jumlah tidak boleh kosong',
            'satuan.required' => 'satuan tidak boleh kosong'
        ]);

        Sparepart::create($request->all());
        return redirect()->route('sparepart.index')->with('status', 'Data Sparepart berhasil ditambahkan!');
        
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
        $active = 'master_sparepart';
        $spareparts = Sparepart::findOrFail($id);
        $kategori_spareparts = Kategori_sparepart::all();
        return view('master_sparepart.sparepart.edit', compact('spareparts', 'kategori_spareparts', 'active'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'id_kategori_sparepart' => 'required',
            'nama_sparepart' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required'
        ], [
            'id_kategori_sparepart.required' => 'Nama kategori tidak boleh kosong',
            'nama_sparepart.required' => 'Nama sparepart tidak boleh kosong',
            'jumlah.required' => 'jumlah tidak boleh kosong',
            'satuan.required' => 'satuan tidak boleh kosong'
        ]);

        Sparepart::where('id', $id)
            ->update([
                'id_kategori_sparepart' => $request->id_kategori_sparepart,
                'nama_sparepart' => $request->nama_sparepart,
                'jumlah' => $request->jumlah,
                'satuan' => $request->satuan
            ]);
        return redirect()->route('sparepart.index')->with('status', 'Data Sparepart berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Sparepart::destroy($id);
        return redirect()->route('sparepart.index')->with('status', 'Data Checksheet berhasil dihapus!');
    }
}
