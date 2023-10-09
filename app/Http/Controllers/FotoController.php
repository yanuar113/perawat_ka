<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $active = 'Foto';
        return view('foto.show', compact('active'));
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

    /**
     * Export a PDF and return the print view.
     */
    public function print($id)
    {
        //
        $detail = Foto::select('foto.*', 'master_kereta.nama_kereta')
            ->join('master_kereta', 'foto.id_kereta', '=', 'master_kereta.id')
            ->where('foto.id', $id)
            ->first();
        $active = 'Foto';
        $pdf = Pdf::loadView('foto.print', compact('active', 'detail'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream();
    }
}

