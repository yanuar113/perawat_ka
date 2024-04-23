<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Checksheet;
use App\Models\Detail_checksheet;
use App\Models\Foto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
// use Intervention\Image\Image as Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Typography\FontFactory;

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

    public function uploadFotov2(Request $request)
    {
        $id_detail_checksheet = $request->id_detail_checksheet;
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();

        $timestamp = now()->timestamp;
        $filename = $timestamp . '.' . $extension;

        $file->move(public_path('foto'), $filename);

        // read image from file system
        $image = ImageManager::gd()->read('foto/' . $filename);

        $watermarkText = $request->date;
        $width = $image->width();
        $height = $image->height();
        $fontSize = 16;
        $margin = 20; // Margin from the edges
        $positionX = $width - strlen($watermarkText) - $margin;
        $positionY = $height - $margin;

        $watermarkText2 = $request->location;
        $positionX2 = $width - strlen($watermarkText) - $margin;
        $positionY2 = $height - ($margin * 2);


        $mark = $timestamp . '_mark.' . $extension;

        $image->text($watermarkText, $positionX2, $positionY2, function (FontFactory $font) use ($fontSize) {
            $font->filename('./fonts/ubuntu-medium.ttf');
            $font->size($fontSize);
            $font->color('fff');
            $font->align('right'); // Align the text to the right
            $font->valign('bottom'); // Align the text to the bottom
        });

        $image->text($watermarkText2, $positionX, $positionY, function (FontFactory $font) use ($fontSize) {
            $font->filename('./fonts/ubuntu-medium.ttf');
            $font->size($fontSize);
            $font->color('fff');
            $font->align('right'); // Align the text to the right
            $font->valign('bottom'); // Align the text to the bottom
        });

        // save modified image in new format
        $image->toPng()->save('foto/' . $mark);

        // dd($mark, $filename);

        Foto::create([
            'id_detail' => $id_detail_checksheet,
            'foto' => $mark,
        ]);

        return ResponseController::customResponse(true, 'Berhasil upload foto!', $mark);
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
            ->orderBy('id', 'desc');

        if ($request->tipe) {
            $datas = $datas->where('tipe', $request->tipe);
        }

        if ($request->tipe == 0) {
            $datas = $datas->whereMonth('created_at', $request->bulan)
                ->whereYear('created_at', $request->tahun);
        } else {
            $datas = $datas->whereYear('created_at', $request->tahun);
        }
        $datas = $datas->get();

        return ResponseController::customResponse(true, 'Berhasil mengambil data!', $datas);
    }

    public function getHistoryFoto(Request $request)
    {
        $authuser = auth()->user();
        $datas = Checksheet::where('id_user', $authuser->id);
        if ($request->tahun) {
            $datas = $datas->whereYear('created_at', $request->tahun);
        }
        $datas = $datas->get();
        //groupBy date_time checksheet by month
        $datas = $datas->map(function ($item) {
            $item->bulan = Carbon::parse($item->date_time)->translatedFormat('F Y');
            return $item;
        });
        //group by but return array example [{month:1,year:2021},{month:2,year:2021}]
        $datas = $datas->groupBy('bulan')->map(function ($item) {
            return [
                'id' => Str::uuid(),
                'month' => Carbon::parse($item[0]->date_time)->month,
                'year' => Carbon::parse($item[0]->date_time)->year,
                'nama_bulan' => $item[0]->bulan,
            ];
        });
        //remove keys
        $datas = array_values($datas->toArray());
        //change to stdClass
        $datas = json_decode(json_encode($datas));

        return ResponseController::customResponse(true, 'Berhasil mengambil data!', $datas);
    }

    public function changeSO(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $rules = [
            'so' => 'required',
        ];

        $messages = [
            'so.required' => 'Status SO/TSO tidak boleh kosong',
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            $response = $validator->messages();
            $response = [
                'validation' => true,
                'message' => [
                    'so' => $response->first('so') != '' ? $response->first('so') : null,
                ],
            ];
            return ResponseController::customResponse(false, 'Gagal mengubah status SO/TSO!', $response);
        }

        $data = Checksheet::where('id', $request->id_checksheet)
            ->update([
                'is_so' => $request->so,
            ]);

        return ResponseController::customResponse(true, 'Berhasil mengubah status SO/TSO!', $data);
    }
}
