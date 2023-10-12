<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ResponseController;
use App\Models\Detail_checksheet;
use App\Models\Foto;
use App\Models\Item_checksheet;
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
            ->get();

        // $detail = Foto::select('foto.*', 'detail_checksheet.*')
        //     ->join('detail_checksheet', 'foto.id_detail', '=', 'detail_checksheet.id')
        //    ->get();
           

            // $categories = Item_checksheet::where('id_kereta')->where('id_kategori_checksheet', $id)->get();
            // $categories = $categories->map(function ($item) use ($id_checksheet) {
            //     $detail = Detail_checksheet::where('id_item_checksheet', $item->id)->where('id_checksheet', $id_checksheet)->first(); 
            //     if ($detail) {
            //         $item->foto = Foto::where('id_detail', $detail->id)->get();
            //         $item->foto = $item->foto->map(function ($item) {
            //             $item->foto = asset('foto/' . $item->foto);
            //             return $item;
            //         });
            //     } else {
            //         $item->foto = [];
            //     }
            //     $item->id_detail_checksheet = $detail->id ?? null;
            //     return $item;
            // });
            // return ResponseController::customResponse(true, 'Berhasil mendapakan item checklist!', $categories);
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
         $detail = Foto::select('foto.*', 'detail_checksheet.*', 'item_checksheet.*', 'checksheet.*', 'master_kereta.nama_kereta', 'checksheet.date_time as datetime')
            ->join('detail_checksheet', 'foto.id_detail', '=', 'detail_checksheet.id')
            ->join('item_checksheet', 'detail_checksheet.id_item_checksheet', '=', 'item_checksheet.id')
            ->join('checksheet', 'detail_checksheet.id_checksheet', '=', 'checksheet.id')
            ->join('master_kereta', 'checksheet.id_kereta', '=', 'master_kereta.id')
            ->get();

        // dd($detail);
        // foreach ($detail as $item) {
        //     $item->formatted_date = Carbon::parse($item->date_time)->translatedFormat('d F Y');
        // }

        $active = 'Foto';
        $pdf = Pdf::loadView('foto.print', compact('active', 'detail'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream();
    }
}
