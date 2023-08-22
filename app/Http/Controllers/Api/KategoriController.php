<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Checksheet;
use App\Models\Kategori_checksheet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function getAll(){
        $authuser = auth()->user();
        $categories = Kategori_checksheet::where('id_kereta', $authuser->id)->get();
        return ResponseController::customResponse(true, 'Berhasil mendapakan Kategori!', $categories);
    }

    //cehecksheet
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

    public function createChecksheet(Request $request){
        $data = json_decode($request->getContent(), true);
        $authuser = auth()->user();

        $data = json_decode($request->getContent(), true);
        $rules = [
            'no_kereta' => 'required',
            'jam_engine' => 'required'
        ];

        $messages = [
            'no_kereta.required' => 'No kereta tidak boleh kosong',
            'jam_engine.required' => 'Jam engine tidak boleh kosong'
        ];

        $validator = Validator::make($data, $rules, $messages);

        if($validator->fails()){
            $response = $validator->messages();
            $response = [
                'validation' => true,
                'message' => [
                    'no_kereta' => $response->first('no_kereta') != '' ? $response->first('no_kereta') : null,
                    'jam_engine' => $response->first('jam_engine') != '' ? $response->first('jam_engine') : null
                ],
            ];
            return ResponseController::customResponse(false, 'Gagal menambahkan Checksheet!', $response);
        }

        $data = Checksheet::create([
            'id_kereta' => $authuser->id,
            'date_time' => Carbon::now()->setTimezone('Asia/Jakarta'),
            'no_kereta' => $request->no_kereta,
            'tipe' => $request->tipe,
            'jam_engine' => $request->jam_engine,
        ]);

        return ResponseController::customResponse(true, 'Berhasil menambahkan Checksheet!', $data);

    }
}


