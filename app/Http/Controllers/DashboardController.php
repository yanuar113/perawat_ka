<?php

namespace App\Http\Controllers;

use App\Models\Checksheet;
use App\Models\Kereta;
use App\Models\Sparepart;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $active = 'dashboard';
        $keretas = Kereta::count();
        $spareparts = Sparepart::count();
        $checksheet = Checksheet::count();
        return view('dashboard.show', compact('active', 'keretas', 'spareparts', 'checksheet'));
    }
}
