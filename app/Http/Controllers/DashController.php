<?php

namespace App\Http\Controllers;

use App\Models\Kp;
use App\Models\Ta;
use App\Models\Mahasiswa;
use App\Models\Seminarkp;
use App\Models\Dosen;
use App\Models\Tawaran;
use App\Models\Logbookta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    //Mengatur UI untuk Guest 
    public function dashboard(){

        $listkp = Kp::listkp();
        $listta = Ta::listtasetuju();
        // $pembimbing = Ta::pembimbing($listta->id);
        // dd($listta);
        $listseminarkp = Seminarkp::listseminarkp();
        
        $jumlahbimbingan = DB::table('pembimbing')
                ->join('ref_dosen','ref_dosen.id','=','pembimbing.pembimbing')
                ->select('nama_dosen','nip',DB::raw('count(*) as total'))
                ->groupBy('nama_dosen','nip')
                ->get();

        $tawaran = Tawaran::tawaran();
        $logbook = Logbookta::logbook();    
        $jumhs = Mahasiswa::jumhs();
        $mhsaktif = Mahasiswa::mhsaktif();
        $mhslulus = Mahasiswa::mhslulus();
        // dd($jumlahbimbingan);
        return view('dashboard',compact('listkp','jumhs','mhsaktif','mhslulus','listta','listseminarkp','jumlahbimbingan','tawaran','logbook'));

    } 
}
