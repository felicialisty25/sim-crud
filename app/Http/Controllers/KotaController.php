<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kota;

class KotaController extends Controller
{
    public function index()
    {
        $kota = kota::all()->toArray();
        return view('kota.index', compact('kota'));

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kota' => 'required'
        ]);

        $kota = new kota([
            'nama_kota' => $request->get('nama_kota')
        ]);

        $kota-> save();

        return redirect()->route('kota.index') -> with('success', 'Data Added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kota' => 'required'
        ]);
        
        $id_kota = $request->get('id_kota');
        
        $kota = kota::find($id_kota);
        $kota->nama_kota = $request->get('nama_kota');
        $kota->save();

        return redirect()->route('kota.index') -> with('success', 'Data has been updated!');
    }

    public function destroy(Request $request)
    {
        $id_kota = $request->get('id_kota');

        $kota = kota::find($id_kota);
        $kota->delete();

        return redirect()->route('kota.index') -> with('success', 'Data has been deleted!');
    }
}
