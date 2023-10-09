<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Detail_checksheet;
use Illuminate\Http\Request;

class ChecksheetController extends Controller
{
    public function createDetailChecksheet(Request $request)
    {
        $dilakukan = $request->dilakukan;
        $hasil = $request->hasil;
        $id_checksheet = $request->id_checksheet;
        $id_item = $request->id_item_checksheet;

        $existing = Detail_checksheet::where('id_checksheet', $id_checksheet)->where('id_item_checksheet', $id_item)->first();

        if ($existing) {
            $existing->dilakukan = $dilakukan ?? $existing->dilakukan;
            $existing->hasil = $hasil ?? $existing->hasil;
            $existing->save();
            return ResponseController::customResponse(true, 'Berhasil mengubah detail checksheet!', $existing);
        } else {
            $detail = new Detail_checksheet();
            $detail->id_checksheet = $id_checksheet;
            $detail->id_item_checksheet = $id_item;
            $detail->dilakukan = $dilakukan;
            $detail->hasil = $hasil;
            $detail->save();
            return ResponseController::customResponse(true, 'Berhasil menambah detail checksheet!', $detail);
        }
    }

    public function uploadFoto(Request $request)
    {
        $id_detail_checksheet = $request->id_detail_checksheet;
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();

        $timestamp = now()->timestamp;
        $filename = $timestamp . '.' . $extension;

        $file->move(public_path('foto'), $filename);

        return ResponseController::customResponse(true, 'Berhasil upload foto!', $filename);
    }
}
