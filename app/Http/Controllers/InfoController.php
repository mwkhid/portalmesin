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

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('info');
    }

    
    //Mengatur UI untuk Guest
    public function info(){

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
        return view('info',compact('listkp','jumhs','mhsaktif','mhslulus','listta','listseminarkp','jumlahbimbingan','tawaran','logbook','jumlogbook'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
