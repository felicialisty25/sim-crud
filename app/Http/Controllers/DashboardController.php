<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\kota;
use App\tempat_pembuatan;
use App\data_sim;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(){
        $sim=[];
        $sim_a = DB::table('data_sims')
            ->where('data_sims.kategori_sim', '=', 'SIM A')
            ->count();
        $sim_b1 = DB::table('data_sims')
            ->where('data_sims.kategori_sim', '=', 'SIM B I')
            ->count();
        $sim_b2 = DB::table('data_sims')
            ->where('data_sims.kategori_sim', '=', 'SIM B II')
            ->count();
        $sim_c = DB::table('data_sims')
            ->where('data_sims.kategori_sim', '=', 'SIM C')
            ->count();
        $sim_d = DB::table('data_sims')
            ->where('data_sims.kategori_sim', '=', 'SIM D')
            ->count();
        
        array_push($sim,$sim_a,$sim_b1,$sim_b2,$sim_c,$sim_d);

        $data_sim = array(
            'sim'=> $sim,
        );

        $kota = kota::all()->toArray();
        $jmlh_sim_kota = [];

        foreach ($kota as $k) {
            $jmlh = DB::table('data_sims')
                ->join('tempat_pembuatans', 'data_sims.id_tempat_pembuatan', '=', 'tempat_pembuatans.id_tempat_pembuatan')
                ->join('kotas', 'tempat_pembuatans.id_kota', '=', 'kotas.id_kota')
                ->where('kotas.nama_kota', '=', $k['nama_kota'])
                ->count();
            array_push($jmlh_sim_kota,$jmlh);
        }

        return view('dashboard.index')->with('sim',$sim)->with('kota',$kota)->with('jmlh_sim_kota',$jmlh_sim_kota);
    }
}
