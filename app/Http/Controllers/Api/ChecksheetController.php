<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Checksheet;
use App\Models\Detail_checksheet;
use App\Models\Foto;
use Illuminate\Http\Request;

class ChecksheetController extends Controller
{
    public function createDetailChecksheet(Request $request)
    {
        $dilakukan = $request->dilakukan;
        $hasil = $request->hasil;
        $id_checksheet = $request->id_checksheet;
        $id_item = $request->id_item_checksheet;
        $keterangan = $request->keterangan;

        $existing = Detail_checksheet::where('id_checksheet', $id_checksheet)->where('id_item_checksheet', $id_item)->first();

        if ($existing) {
            $existing->dilakukan = $dilakukan;
            $existing->hasil = $hasil;
            $existing->keterangan = $keterangan;
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

        Foto::create([
            'id_detail' => $id_detail_checksheet,
            'foto' => $filename
        ]);

        return ResponseController::customResponse(true, 'Berhasil upload foto!', $filename);
    }

    public function removeFoto(Request $request)
    {
        $id_foto = $request->id_foto;
        $foto = Foto::find($id_foto);

        $path = public_path('foto/' . $foto->foto);
        if (file_exists($path)) {
            unlink($path);
        }

        $foto->delete();
        return ResponseController::customResponse(true, 'Berhasil menghapus foto!', $foto);
    }

    public function getHistory(Request $request)
    {
        $authuser = auth()->user();
        $datas = Checksheet::where('id_user', $authuser->id)
            ->where('tipe', $request->tipe)
            ->orderBy('id', 'desc');

        if ($request->tipe == 0) {
            $datas = $datas->whereMonth('created_at', $request->bulan)
                ->whereYear('created_at', $request->tahun);
        } else {
            $datas = $datas->whereYear('created_at', $request->tahun);
        }
        $datas = $datas->get();

        return ResponseController::customResponse(true, 'Berhasil mengambil data!', $datas);
    }
}
