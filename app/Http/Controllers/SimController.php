<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\kota;
use App\tempat_pembuatan;
use App\data_sim;
use Illuminate\Support\Facades\Storage;
use PDF;

class SimController extends Controller
{
    public function index()
    {
        $data_sim = DB::table('data_sims')
        ->join('tempat_pembuatans', 'data_sims.id_tempat_pembuatan', '=', 'tempat_pembuatans.id_tempat_pembuatan')
        ->join('kotas', 'tempat_pembuatans.id_kota', '=', 'kotas.id_kota')
        ->get();
        return view('sim.index')->with('data_sim', $data_sim);
    }

    public function create()
    {
        $data_kota = kota::all();
        $data_tempat_pembuatan = DB::table('tempat_pembuatans')
            ->join('kotas', 'tempat_pembuatans.id_kota', '=', 'kotas.id_kota')
            ->get();
        return view('sim.create')->with('data_kota',$data_kota)->with('data_tempat_pembuatan',$data_tempat_pembuatan);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama'=>'required',
            'alamat'=> 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir'=> 'required',
            'pekerjaan' => 'required',
            'no_sim' => 'required',
            'kategori_sim'=> 'required',
            'id_tempat_pembuatan'=> 'required',
            'file_foto'=> 'image|nullable'
        ]);
  
  
        if($request->hasFile('file_foto')){
            // Get filename with the extension
            $filenameWithExt = $request->file('file_foto')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('file_foto')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('file_foto')->storeAs('public/image_foto', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $data_sim = new data_sim([
            'nama' => $request->get('nama'),
            'alamat' => $request->get('alamat'),
            'tempat_lahir' => $request->get('tempat_lahir'),
            'tanggal_lahir' => $request->get('tanggal_lahir'),
            'pekerjaan' => $request->get('pekerjaan'),
            'no_sim' => $request->get('no_sim'),
            'kategori_sim' => $request->get('kategori_sim'),
            'foto' => $fileNameToStore,
            'id_tempat_pembuatan' => $request->get('id_tempat_pembuatan'),
        ]);

        $data_sim->save();
    
        $id = DB::getPdo()->lastInsertId();

        $data_sim = DB::table('data_sims')
            ->join('tempat_pembuatans', 'data_sims.id_tempat_pembuatan', '=', 'tempat_pembuatans.id_tempat_pembuatan')
            ->join('kotas', 'tempat_pembuatans.id_kota', '=', 'kotas.id_kota')
            ->where('data_sims.id_sim', '=', $id)
            ->get();

        return view('sim.show')->with('data_sim',$data_sim)->with('success', 'Data Added');
    }

    public function show($id)
    {
        $data_sim = DB::table('data_sims')
            ->join('tempat_pembuatans', 'data_sims.id_tempat_pembuatan', '=', 'tempat_pembuatans.id_tempat_pembuatan')
            ->join('kotas', 'tempat_pembuatans.id_kota', '=', 'kotas.id_kota')
            ->where('data_sims.id_sim', '=', $id)
            ->get();

        return view('sim.show')->with('data_sim',$data_sim);
    }

    public function edit($id)
    {
        $data_sim = DB::table('data_sims')
            ->join('tempat_pembuatans', 'data_sims.id_tempat_pembuatan', '=', 'tempat_pembuatans.id_tempat_pembuatan')
            ->join('kotas', 'tempat_pembuatans.id_kota', '=', 'kotas.id_kota')
            ->where('data_sims.id_sim', '=', $id)
            ->get();

        $data_kota = kota::all();
        $data_tempat_pembuatan = DB::table('tempat_pembuatans')
            ->join('kotas', 'tempat_pembuatans.id_kota', '=', 'kotas.id_kota')
            ->get();

        return view('sim.edit')->with('data_sim',$data_sim)->with('data_kota',$data_kota)->with('data_tempat_pembuatan',$data_tempat_pembuatan);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama'=>'required',
            'alamat'=> 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir'=> 'required',
            'pekerjaan' => 'required',
            'no_sim' => 'required',
            'kategori_sim'=> 'required',
            'id_tempat_pembuatan'=> 'required',
            'file_foto'=> 'image|nullable'
        ]);
  
  
        $data_sim = data_sim::where('id_sim', $id)->get();
        foreach($data_sim as $record){
            $gambar=$record['foto'];
        }

        if($gambar!=$request->get('text_image')){
            if($request->hasFile('file_foto')){
                Storage::delete('public/image_foto/' . $gambar);

                // Get filename with the extension
                $filenameWithExt = $request->file('file_foto')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('file_foto')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $request->file('file_foto')->storeAs('public/image_foto', $fileNameToStore);
            } else {
                $fileNameToStore = 'noimage.jpg';
            }
        }else{
            $fileNameToStore=$gambar;
        }

        $data_sim = data_sim::find($id);
        $data_sim->nama = $request->get('nama');
        $data_sim->alamat = $request->get('alamat');
        $data_sim->tempat_lahir = $request->get('tempat_lahir');
        $data_sim->pekerjaan = $request->get('pekerjaan');
        $data_sim->no_sim = $request->get('no_sim');
        $data_sim->kategori_sim = $request->get('kategori_sim');
        $data_sim->foto = $fileNameToStore;
        $data_sim->id_tempat_pembuatan = $request->get('id_tempat_pembuatan');

        $data_sim->save();

        $data_sim = DB::table('data_sims')
            ->join('tempat_pembuatans', 'data_sims.id_tempat_pembuatan', '=', 'tempat_pembuatans.id_tempat_pembuatan')
            ->join('kotas', 'tempat_pembuatans.id_kota', '=', 'kotas.id_kota')
            ->where('data_sims.id_sim', '=', $id)
            ->get();

        return view('sim.show')->with('data_sim',$data_sim)->with('success', 'Data has been updated!');
    }

    public function destroy(Request $request)
    {
        $id_sim = $request->get('id_sim');

        // DELETE GAMBAR
        $data_sim = data_sim::where('id_sim', $id_sim)->get();
        foreach($data_sim as $record){
            $gambar=$record['foto'];
        }
        Storage::delete('public/image_foto/' . $gambar);

        $data_sim = data_sim::find($id_sim);
        $data_sim->delete();

        return redirect()->route('sim.index') -> with('success', 'Data has been deleted!');
    }

    public function export_pdf($id)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_pdf($id));
        return $pdf->stream('export_data_sim.pdf');
    }

    function convert_pdf($id)
    {
        $data_sim = DB::table('data_sims')
            ->join('tempat_pembuatans', 'data_sims.id_tempat_pembuatan', '=', 'tempat_pembuatans.id_tempat_pembuatan')
            ->join('kotas', 'tempat_pembuatans.id_kota', '=', 'kotas.id_kota')
            ->where('data_sims.id_sim', '=', $id)
            ->get();

        $output = 
        '
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <div class="work-progres">
        <div class="chit-chat-layer1">
            <div class="col-md-12 chit-chat-layer1-left">
           <h1><u>DATA SIM</u></h1>
            <br>
      
            <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="col-sm-12 col-md-offset-3">
                        <div class="imgwrapper" style="max-width: 180px;">
                               <img src="'.public_path().'/storage/image_foto/'.$data_sim[0]->foto.'" class="img-responsive">
                            </div>
                    </div>
                  </div>
                </div>
                <br>
                <div class="col-md-7">
                  <div class="row">
                      <label for="" class="col-md-5 control-label">No SIM</label>
                      <div class="col-md-6">
                          '.$data_sim[0]->no_sim.'
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <label class="col-md-5 control-label">Nama</label>
                      <div class="col-md-6">
                          '.$data_sim[0]->nama.'
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <label class="col-md-5 control-label">Alamat</label>
                      <div class="col-md-6">
                        ' .$data_sim[0]->alamat.'
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <label for="" class="col-md-5 control-label">Tempat & Tanggal Lahir</label>
                      <div class="col-md-6">
                          '.$data_sim[0]->tempat_lahir.', '.date('d-m-Y', strtotime($data_sim[0]->tanggal_lahir)).'
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <label for="" class="col-md-5 control-label">Pekerjan</label>
                      <div class="col-md-6">
                          '.$data_sim[0]->pekerjaan.'
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <label for="" class="col-md-5 control-label">Kategori SIM</label>
                      <div class="col-md-6">
                          '.$data_sim[0]->kategori_sim.'
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <label for="" class="col-md-5 control-label">Nama Tempat Pembuatan</label>
                      <div class="col-md-6">
                          '.$data_sim[0]->nama_tempat.'
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <label for="" class="col-md-5 control-label">Alamat Tempat Pembuatan</label>
                      <div class="col-md-6">
                          <p style="white-space: pre-wrap;">'.$data_sim[0]->alamat_tempat.'</p>
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <label for="" class="col-md-5 control-label">Kota Tempat Pembuatan</label>
                      <div class="col-md-6">
                          '.$data_sim[0]->nama_kota.'
                      </div>
                  </div>
                  <br>
              </div>
            </div>
            <br>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>';

      return $output;
    }
}
