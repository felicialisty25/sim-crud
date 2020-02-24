<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\kota;
use App\tempat_pembuatan;

class TempatPembuatanController extends Controller
{
    public function index()
    {
        $tempat_pembuatan = DB::table('tempat_pembuatans')
            ->join('kotas', 'tempat_pembuatans.id_kota', '=', 'kotas.id_kota')
            ->get();
        $kota = kota::all();
        return view('tempat_pembuatan.index')->with('tempat', $tempat_pembuatan)->with('kota', $kota);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_tempat' => 'required',
            'alamat_tempat' => 'required',
            'id_kota' => 'required',
        ]);

        $tempat_pembuatan = new tempat_pembuatan([
            'nama_tempat' => $request->get('nama_tempat'),
            'alamat_tempat' => $request->get('alamat_tempat'),
            'id_kota' => $request->get('id_kota'),
        ]);

        $tempat_pembuatan-> save();

        return redirect()->route('tempatPembuatan.index') -> with('success', 'Data Added');
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
            'nama_tempat' => 'required',
            'alamat_tempat' => 'required',
            'id_kota' => 'required',
        ]);
         
        $id_tempat_pembuatan = $request->get('id_tempat_pembuatan');
        $tempat_pembuatan = tempat_pembuatan::find($id_tempat_pembuatan);
        $tempat_pembuatan->nama_tempat = $request->get('nama_tempat');
        $tempat_pembuatan->alamat_tempat = $request->get('alamat_tempat');
        $tempat_pembuatan->id_kota = $request->get('id_kota');
        $tempat_pembuatan->save();

        return redirect()->route('tempatPembuatan.index') -> with('success', 'Data has been updated!');
    }

    public function destroy(Request $request)
    {
        $id_tempat_pembuatan = $request->get('id_tempat_pembuatan');

        $tempat_pembuatan = tempat_pembuatan::find($id_tempat_pembuatan);
        $tempat_pembuatan->delete();

        return redirect()->route('tempatPembuatan.index') -> with('success', 'Data has been deleted!');
    }
}
