<?php

namespace App\Http\Controllers;

use App\Models\Item_checksheet;
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
        $active = 'master_item_checksheet';
        return view('master_checksheet.itemchecksheet.show', compact('active', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $active = 'master_checksheet';
        return view('master_checksheet.itemchecksheet.add', compact('active'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
