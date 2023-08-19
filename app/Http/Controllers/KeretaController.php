<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kereta;

class KeretaController extends Controller
{
 

    public function index()
    {
        $trains = Kereta::all();
        return view('master_kereta.show', compact('trains'));
    }
    public function create()
    {
        //
        return view('master_kereta.add');
    }
}
