<?php

namespace App\Http\Controllers;

use App\Models\Kp;
use App\Models\Seminarkp;
use App\Models\Ruang;
use App\Models\Jabatan;
use App\Models\Dokumenkp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class SemkpController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nim = Auth::user()->nim;
        $ruang = Ruang::all();
        $data = Kp::setuju($nim)->first();
        $setuju = Seminarkp::setuju($nim)->first();
        $pending = Seminarkp::pending($nim)->first();
        $tolak = Seminarkp::tolak($nim)->first();
        // dd($tolak);
        if ($setuju != null) {
            return view('seminarkp.sem_setuju',compact('setuju'));
        } elseif ($pending != null) {
            return view('seminarkp.sem_pending',compact('pending'));
        } elseif ($tolak != null) {
            return view('seminarkp.sem_tolak',compact('tolak','ruang'));
        } elseif ($data != null) {
            $dokumenkp = Dokumenkp::getdokumen($data->id)->first();
            if($dokumenkp->file_selesaikp != null){
                return view('seminarkp.sem_pengajuan',compact('data','ruang'));
            }
            return view('errors.selesaikp');
        } else {
            return view('errors.errorkp');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateSem = $request->validate([
    		'kp_id' => 'required|unique:seminar_kp',
	    	'judul_seminar' => 'required',
	    	'tanggal_seminar' => 'required|date|after:tgl_selesai_kp',
	    	'jam_mulai' => 'required',
	    	'jam_selesai' => 'required|after:jam_mulai',
	    	'ruang_id' => 'required',
	    	'status_seminarkp' => 'required',
        ]);
        
    	Seminarkp::create($validateSem);

        return redirect('kp/seminar')->with('message','Terimakasih telah mengajukan Seminar Kerja Praktek!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ruang = Ruang::all();
        $tolak = Seminarkp::find($id)
            ->join('kp','kp.id','=','seminar_kp.kp_id')
            ->join('mahasiswa','mahasiswa.id','=','kp.mahasiswa_id')
            ->join('ref_ruang','seminar_kp.ruang_id','=','ref_ruang.id')
            ->where('nim',Auth::user()->nim)
            ->where('status_kp','SETUJU')
            ->where('status_seminarkp','PENDING')
            ->select('*','seminar_kp.id')
            ->firstOrFail();
        
        return view('seminarkp.sem_edit', compact('tolak','ruang'));
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
        $validateSem = $request->validate([
	    	'judul_seminar' => 'required',
	    	'tanggal_seminar' => 'required|date|after:tgl_selesai_kp',
	    	'jam_mulai' => 'required',
	    	'jam_selesai' => 'required|after:jam_mulai',
	    	'ruang_id' => 'required',
	    	'status_seminarkp' => 'required',
        ]);
        
    	Seminarkp::where('id',$id)->update($validateSem);

        return redirect('kp/seminar')->with('message','Update Seminar Kerja Praktek Berhasil!');
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

    //Cetak Pendaftaran Seminar KP
    public function cetak_pengajuansemkp(){
        $nim = Auth::user()->nim;
        $data = Seminarkp::pengajuan($nim);
        $kp = Jabatan::kp();
        if($data != null){
            $config = [
                'format' => 'A4-P', // Portrait
                 'margin_left'          => 30,
                 'margin_right'         => 25,
                 'margin_top'           => 35,
                 'margin_footer'         => 5,
                // 'margin_bottom'        => 25,
              ];
            $pdf = PDF::loadview('seminarkp.cetak_seminarkp',compact('data','kp'),[],$config);
            return $pdf->stream();
        } else{
            return view('errors.semkpbelumdaftar');
        }
    }

    //Cetak Daftar Hadir Seminar KP
	public function cetak_daftarhadir()
	{
        $nim = Auth::user()->nim;
        $data= Seminarkp::daftarhadir($nim);
        if($data != null){
            $config = [
                'format' => 'A4-P', // Portrait
                 'margin_left'          => 30,
                 'margin_right'         => 25,
                 'margin_top'           => 40,
                 'margin_footer'         => 5,
                // 'margin_bottom'        => 25,
              ];
            $pdf = PDF::loadview('seminarkp.cetak_daftarhadir',compact('data'),[],$config);
            return $pdf->stream();
        } else {
            return view('erorrs.semkpbelumsetuju');
        }
	}
}
