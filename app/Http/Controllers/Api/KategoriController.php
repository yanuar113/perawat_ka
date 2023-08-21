<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kategori_checksheet;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function getAll(){
        $authuser = auth()->user();
        $categories = Kategori_checksheet::where('id_kereta', $authuser->id);
        return ResponseController::customResponse(true, 'Berhasil mendapakan Kategori!', $categories);
    }
}
