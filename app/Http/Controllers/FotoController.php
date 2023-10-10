<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Kereta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detail = Foto::select('foto.*', 'detail_checksheet.*', 'item_checksheet.*', 'checksheet.*', 'master_kereta.nama_kereta', 'checksheet.date_time as datetime')
        ->join('detail_checksheet', 'foto.id_detail', '=', 'detail_checksheet.id')
        ->join('item_checksheet', 'detail_checksheet.id_item_checksheet', '=', 'item_checksheet.id')
        ->join('checksheet', 'detail_checksheet.id_checksheet', '=', 'checksheet.id')
        ->join('master_kereta', 'checksheet.id_kereta', '=', 'master_kereta.id')
        // ->where('checksheet.id', '=', 'detail_checksheet.id_checksheet')  
        ->get();
        // dd($detail);
        $keretas = Kereta::all();
        $active = 'photo';
        return view('foto.show', compact('active', 'detail', 'keretas'));
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
    public function print()
    {
        //
        $detail = Foto::select('foto.*', 'detail_checksheet.*', 'item_checksheet.*', 'checksheet.*', 'master_kereta.nama_kereta', 'checksheet.date_time')
            ->join('detail_checksheet', 'foto.id_detail', '=', 'detail_checksheet.id')
            ->join('item_checksheet', 'detail_checksheet.id_item_checksheet', '=', 'item_checksheet.id')
            ->join('checksheet', 'detail_checksheet.id_checksheet', '=', 'checksheet.id')
            ->join('master_kereta', 'checksheet.id_kereta', '=', 'master_kereta.id')
            ->get();
        // $detail->datetime = date('d-m-Y', strtotime($detail->date_time));
        //tampilkan bulan dalam format Indonesia
        // $detail->datetime = Carbon::parse($detail->date_time)->translatedFormat('d F Y');
        foreach ($detail as $item) {
            $item->formatted_date = Carbon::parse($item->date_time)->translatedFormat('d F Y');
        }

        $active = 'Foto';
        // dd($detail);
        $pdf = Pdf::loadView('foto.print', compact('active', 'detail'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream();
    }
}

