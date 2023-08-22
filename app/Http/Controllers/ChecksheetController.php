<?php

namespace App\Http\Controllers;

use App\Models\Checksheet;
use App\Models\Kereta;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ChecksheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $active = 'master_checksheet';
        $checksheets = Checksheet::select('checksheet.*', 'master_kereta.nama_kereta')
            ->join('master_kereta', 'checksheet.id_kereta', '=', 'master_kereta.id')
            ->get();
        return view('master_checksheet.checksheet.show', compact('active', 'checksheets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $active = 'master_checksheet';
        $keretas = Kereta::all();
        return view('master_checksheet.checksheet.add', compact('active', 'keretas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'id_kereta' => 'required',
            'date_time' => 'required',
            'no_kereta' => 'required',
            'tipe' => 'required',
            'jam_engine' => 'required'
        ], [
            'id_kereta.required' => 'Nama kereta tidak boleh kosong',
            'date_time.required' => 'Tanggal tidak boleh kosong',
            'no_kereta.required' => 'No kereta tidak boleh kosong',
            'tipe.required' => 'Tipe tidak boleh kosong',
            'jam_engine.required' => 'Jam engine tidak boleh kosong'
        ]);

        Checksheet::create($request->all());
        return redirect()->route('checksheet.index')->with('status', 'Data Checksheet berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $detail = Checksheet::select('checksheet.*', 'master_kereta.nama_kereta')
        ->join('master_kereta', 'checksheet.id_kereta', '=', 'master_kereta.id')
        ->where('checksheet.id', $id)
        ->first();
        $active = 'master_checksheet';

        return view('master_checksheet.checksheet.detail', compact('active','detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $active = 'master_checksheet';
        $keretas = Kereta::all();
        $checksheets = Checksheet::find($id);
        return view('master_checksheet.checksheet.edit', compact('active', 'keretas', 'checksheets'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'id_kereta' => 'required',
            'date_time' => 'required',
            'no_kereta' => 'required',
            'tipe' => 'required',
            'jam_engine' => 'required'
        ], [
            'id_kereta.required' => 'Nama kereta tidak boleh kosong',
            'date_time.required' => 'Tanggal tidak boleh kosong',
            'no_kereta.required' => 'No kereta tidak boleh kosong',
            'tipe.required' => 'Tipe tidak boleh kosong',
            'jam_engine.required' => 'Jam engine tidak boleh kosong'
        ]);

        Checksheet::where('id', $id)
            ->update([
                'id_kereta' => $request->id_kereta,
                'date_time' => $request->date_time,
                'no_kereta' => $request->no_kereta,
                'tipe' => $request->tipe,
                'jam_engine' => $request->jam_engine
            ]);
        return redirect()->route('checksheet.index')->with('status', 'Data Checksheet berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Checksheet::destroy($id);
        return redirect()->route('checksheet.index')->with('status', 'Data Checksheet berhasil dihapus!');
    }
}
