<?php

namespace App\Http\Controllers;

use App\Models\Kp;
use App\Models\Ta;
use App\Models\Mahasiswa;
use App\Models\Seminarkp;
use App\Models\Dosen;
use App\Models\Tawaran;
use App\Models\Logbookta;
use App\Models\Pembimbing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashController extends Controller
{
    //Controller untuk Dashboard Guest
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

        //Menampilkan list kp
        $listkp = Kp::listkp();
        //Menampilkan list ta
        $listta = Ta::listtasetuju();
        //Menampilkan list Seminar kp
        $listseminarkp = Seminarkp::listseminarkp();
        //Menampilkan Bimbingan Dosen
        $jumlahbimbingan = Pembimbing::join('ref_dosen','ref_dosen.id','=','ta_pembimbing.pembimbing')
                ->select('ref_dosen.id','nama_dosen','nip',DB::raw('count(*) as total'))
                ->groupBy('ref_dosen.id','nama_dosen','nip')
                ->orderBy('ref_dosen.id','asc')
                ->get();
        //Menampilkan tawaran dosen
        $tawaran = Tawaran::tawaran();
        //Menampilkan logbook ta mahasiswa
        $logbook = Logbookta::logbook();
        //Menampilkan jumlah logbook ta mhs
        $jumlogbook = Logbookta::jumlahlogbook();
        //Menampilkan jumlah mhs
        $jumhs = Mahasiswa::jumhs();
        //Menampilkan jumlah mhs aktif
        $mhsaktif = Mahasiswa::mhsaktif();
        //Menampilkan jumlah mhs lulus
        $mhslulus = Mahasiswa::mhslulus();
        // dd($jumlogbook);
        return view('dashboard',compact('listkp','jumhs','mhsaktif','mhslulus','listta','listseminarkp','jumlahbimbingan','tawaran','logbook','jumlogbook'));
    } 
}
