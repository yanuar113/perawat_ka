<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Checksheet;
use App\Models\Kategori_checksheet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function getAll(){
        $authuser = auth()->user();
        $categories = Kategori_checksheet::where('id_kereta', $authuser->id)->get();
        return ResponseController::customResponse(true, 'Berhasil mendapakan Kategori!', $categories);
    }
    public function getstatuschecksheet(){
        $authuser = auth()->user();
        $data = Checksheet::where('id_kereta', $authuser->id)->whereDate('date_time', Carbon::today());
        $result = [];
        if ($data->count()==0){
            $result=[
                'found'=>false,
                'data'=> null
            ];
        }else{
            $result=[
                'found'=>true,
                'data'=> $data->first()
            ];
        }
        return ResponseController::customResponse(true, 'Berhasil mendapakan Kategori!', $result);
    }
}


