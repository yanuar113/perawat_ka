<?php

namespace App\Http\Controllers;

use App\Models\Kereta;
use Illuminate\Http\Request;

class KategorisparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trains = Kereta::all();
        $active = 'master_sparepart';
        return view('master_sparepart.kategori.show', compact('trains', 'active'));
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
