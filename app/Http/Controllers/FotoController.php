<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ResponseController;
use App\Models\Checksheet;
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
        $detail = Checksheet::all();
        //groupBy date_time checksheet by month
        $detail = $detail->map(function ($item) {
            $item->bulan = Carbon::parse($item->date_time)->translatedFormat('F Y');
            return $item;
        });
        //group by but return array example [{month:1,year:2021},{month:2,year:2021}]
        $detail = $detail->groupBy('bulan')->map(function ($item) {
            return [
                'month' => Carbon::parse($item[0]->date_time)->month,
                'year' => Carbon::parse($item[0]->date_time)->year,
                'nama_bulan' => $item[0]->bulan,
            ];
        });
        //remove keys
        $detail = array_values($detail->toArray());
        //change to stdClass
        $detail = json_decode(json_encode($detail));
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
    public function print(Request $request)
    {
        //get bulan & tahun in query params
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $detail = Foto::select('foto.*', 'item_checksheet.*', 'master_kereta.nama_kereta', 'checksheet.date_time as datetime', 'checksheet.tipe as tipe_laporan')
            ->join('detail_checksheet', 'foto.id_detail', '=', 'detail_checksheet.id')
            ->join('item_checksheet', 'detail_checksheet.id_item_checksheet', '=', 'item_checksheet.id')
            ->join('checksheet', 'detail_checksheet.id_checksheet', '=', 'checksheet.id')
            ->join('master_kereta', 'checksheet.id_kereta', '=', 'master_kereta.id')
            ->whereMonth('checksheet.date_time', $bulan)
            ->whereYear('checksheet.date_time', $tahun)
            ->get();

        $bulan = strtoupper(Carbon::parse($detail[0]->datetime)->translatedFormat('F'));
        $tahun = strtoupper(Carbon::parse($detail[0]->datetime)->year);

        $active = 'Foto';
        $pdf = Pdf::loadView('foto.print', compact('active', 'detail', 'bulan', 'tahun'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('foto.pdf');
    }
}
