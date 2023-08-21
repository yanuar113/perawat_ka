<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function getAll(){
        $authuser = auth()->user();
        return ResponseController::customResponse(true, 'Berhasil mendapakan Kategori!', $authuser);
    }
}
