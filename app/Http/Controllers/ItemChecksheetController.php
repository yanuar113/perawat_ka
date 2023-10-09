<?php

namespace App\Http\Controllers;

use App\Models\Item_checksheet;
use App\Models\Kategori_checksheet;
use App\Models\Kereta;
use Illuminate\Http\Request;

class ItemChecksheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $items = Item_checksheet::select('item_checksheet.*', 'master_kereta.nama_kereta', 'kategori_checksheet.nama')
            ->join('kategori_checksheet', 'item_checksheet.id_kategori_checksheet', '=', 'kategori_checksheet.id')
            ->join('master_kereta', 'kategori_checksheet.id_kereta', '=', 'master_kereta.id')
            ->get();
        $keretas = Kereta::all();
        $active = 'master_checksheet';
        return view('master_checksheet.itemchecksheet.show', compact('active', 'items', 'keretas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $active = 'master_checksheet';
        $keretas = Kereta::all();
        $kategories = Kategori_checksheet::all();
        return view('master_checksheet.itemchecksheet.add', compact('active','keretas','kategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_item' => 'required',
            'id_kereta' => 'required',
            'id_kategori_checksheet' => 'required'
        ], [
            'nama_item.required' => 'Uraian Pekerjaan tidak boleh kosong',
            'id_kereta.required' => 'Nama kereta tidak boleh kosong',
            'id_kategori_checksheet.required' => 'Nama kategori tidak boleh kosong'
        ]);
        Item_checksheet::create($request->all());
        return redirect()->route('item_checksheet.index')->with('success', 'Data Item Checksheet berhasil ditambahkan!');
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
        $items = Item_checksheet::find($id);
        $keretas = Kereta::all();
        $kategories = Kategori_checksheet::all();
        $active = 'master_checksheet';
        return view('master_checksheet.itemchecksheet.edit', compact('active', 'items','keretas','kategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama_item' => 'required',
            'id_kereta' => 'required',
            'id_kategori_checksheet' => 'required'
        ], [
            'nama_item.required' => 'Nama item tidak boleh kosong',
            'id_kereta.required' => 'Nama kereta tidak boleh kosong',
            'id_kategori_checksheet.required' => 'Nama kategori tidak boleh kosong'
        ]);
        Item_checksheet::where('id', $id)
            ->update([
                'nama_item' => $request->nama_item,
                'id_kereta' => $request->id_kereta,
                'id_kategori_checksheet' => $request->id_kategori_checksheet
            ]);
        return redirect()->route('item_checksheet.index')->with('success', 'Data Item Checksheet berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Item_checksheet::destroy($id);
        return redirect()->route('item_checksheet.index')->with('status', 'Data Item Checksheet berhasil dihapus!');
    }

    public function filter($id)
    {
        // $kategories = Kategori_checksheet::where('id_kereta', $keretaId)->get();
        $items = Item_checksheet::select('item_checksheet.*', 'master_kereta.nama_kereta', 'kategori_checksheet.nama')
        ->join('kategori_checksheet', 'item_checksheet.id_kategori_checksheet', '=', 'kategori_checksheet.id')
        ->join('master_kereta', 'kategori_checksheet.id_kereta', '=', 'master_kereta.id')->where('kategori_checksheet.id_kereta', $id)
        ->get();
        $keretas = Kereta::all();
        $active = 'master_checksheet';
        return view('master_checksheet.itemchecksheet.show', compact('items', 'keretas', 'active'));
    }
}
