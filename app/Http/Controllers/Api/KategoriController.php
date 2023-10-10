<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Checksheet;
use App\Models\Detail_checksheet;
use App\Models\Foto;
use App\Models\Item_checksheet;
use App\Models\Kategori_checksheet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use stdClass;

class KategoriController extends Controller
{
    public function getAll($id)
    {
        $authuser = auth()->user();
        $categories = Kategori_checksheet::where('id_kereta', $authuser->id)->get();
        $oldChecksheet = Checksheet::where('id_kereta', $authuser->id)->where('id', $id)->first();
        $checksheet = new stdClass();
        $checksheet->id = $oldChecksheet->id ?? null;
        $checksheet->is_so = $oldChecksheet->is_so ?? null;
        $checksheet->categories = $categories;
        return ResponseController::customResponse(true, 'Berhasil mendapakan Kategori!', $checksheet);
    }

    //cehecksheet
    public function getstatuschecksheet(Request $request)
    {
        $type = $request->type;
        $authuser = auth()->user();
        if ($type == 0) {
            $data = Checksheet::where('id_kereta', $authuser->id)->whereDate('date_time', Carbon::today()->setTimezone('Asia/Jakarta'))->where('tipe', $type);
        } else {
            //get by this mont and type == 1
            $data = Checksheet::where('id_kereta', $authuser->id)->whereMonth('date_time', Carbon::now()->setTimezone('Asia/Jakarta')->month)->where('tipe', $type);
        }
        $result = [];
        if ($data->count() == 0) {
            $result = [
                'found' => false,
                'data' => null
            ];
        } else {
            $result = [
                'found' => true,
                'data' => $data->first()
            ];
        }
        return ResponseController::customResponse(true, 'Berhasil mendapakan checksheet!', $result);
    }

    public function createChecksheet(Request $request)
    {
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

        if ($validator->fails()) {
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

    //list item checksheet
    public function getAllList()
    {
        $authuser = auth()->user();
        $categories = Item_checksheet::where('id_kereta', $authuser->id)->get();
        $categories = $categories->map(function ($item) {
            $detail = Detail_checksheet::where('id_item_checksheet', $item->id)->first();
            $item->dilakukan = $detail->dilakukan ?? null;
            $item->hasil = $detail->hasil ?? null;
            $item->keterangan = $detail->keterangan ?? null;
            $item->foto = Foto::where('id_detail', $detail->id)->get();
            return $item;
        });
        return ResponseController::customResponse(true, 'Berhasil mendapakan item checklist!', $categories);
    }

    public function getAllListById($id, $id_checksheet)
    {
        $authuser = auth()->user();
        $categories = Item_checksheet::where('id_kereta', $authuser->id)->where('id_kategori_checksheet', $id)->get();
        $categories = $categories->map(function ($item) use ($id_checksheet) {
            $detail = Detail_checksheet::where('id_item_checksheet', $item->id)->where('id_checksheet', $id_checksheet)->first();
            $item->dilakukan = $detail->dilakukan ?? null;
            $item->hasil = $detail->hasil ?? null;
            $item->keterangan = $detail->keterangan ?? null;
            if ($detail) {
                $item->foto = Foto::where('id_detail', $detail->id)->get();
                $item->foto = $item->foto->map(function ($item) {
                    $item->foto = asset('foto/' . $item->foto);
                    return $item;
                });
            } else {
                $item->foto = [];
            }
            $item->id_detail_checksheet = $detail->id ?? null;
            return $item;
        });
        return ResponseController::customResponse(true, 'Berhasil mendapakan item checklist!', $categories);
    }
}
