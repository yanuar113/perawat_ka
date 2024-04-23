<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    public function print(Request $request)
    {
        //get bulan & tahun in query params
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $datas = Foto::select('foto.*', 'item_checksheet.nama_item', 'master_kereta.nama_kereta', 'checksheet.date_time as datetime', 'checksheet.tipe as tipe_laporan')
            ->join('detail_checksheet', 'foto.id_detail', '=', 'detail_checksheet.id')
            ->join('item_checksheet', 'detail_checksheet.id_item_checksheet', '=', 'item_checksheet.id')
            ->join('checksheet', 'detail_checksheet.id_checksheet', '=', 'checksheet.id')
            ->join('master_kereta', 'checksheet.id_kereta', '=', 'master_kereta.id')
            ->whereMonth('checksheet.date_time', $bulan)
            ->whereYear('checksheet.date_time', $tahun)
            ->orderBy('item_checksheet.id', 'asc')
            ->get();

        return ResponseController::customResponse(true, 'Berhasil mengambil data!', $datas);
    }
}
