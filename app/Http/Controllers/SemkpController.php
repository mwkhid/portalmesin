<?php

namespace App\Http\Controllers;

use App\Models\Kp;
use App\Models\Seminarkp;
use App\Models\Ruang;
use App\Models\Jabatan;
use App\Models\Dokumenkp;
use App\Models\Klaimkp;
use App\Models\Accpembimbingkp;
use App\Models\Nilaikp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
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
            $klaim = Klaimkp::select('*')->where('kp_id',$setuju->kp_id)->get();
            return view('seminarkp.sem_setuju',compact('setuju','klaim'));
        } elseif ($pending != null) {
            $klaim = Klaimkp::select('*')->where('kp_id',$pending->kp_id)->get();
            return view('seminarkp.sem_pending',compact('pending','klaim'));
        } elseif ($tolak != null) {
            $klaim = Klaimkp::select('*')->where('kp_id',$tolak->kp_id)->get();
            return view('seminarkp.sem_tolak',compact('tolak','ruang','klaim'));
        } elseif ($data != null) {
            $dokumenkp = Dokumenkp::getdokumen($data->id)->first();
            if($dokumenkp->file_selesaikp && $dokumenkp->file_nilai){
                $accSeminarkp = Accpembimbingkp::where('mahasiswa_id','=',$data->mahasiswa_id)->first();
                return view('seminarkp.sem_pengajuan',compact('data','ruang','accSeminarkp'));
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
        // $validateSem = $request->validate([
    	// 	'kp_id' => 'required|unique:kp_seminar',
	    // 	'judul_seminar' => 'required',
	    // 	'tanggal_seminar' => 'required|date|after:tgl_selesai_kp',
	    // 	'jam_mulai' => 'required',
	    // 	'jam_selesai' => 'required|after:jam_mulai',
	    // 	'ruang_id' => 'required',
	    // 	'status_seminarkp' => 'required',
        // ]);
        
        $rules = array(
            'kp_id' => 'required|unique:kp_seminar',
	    	'judul_seminar' => 'required',
	    	'tanggal_seminar' => 'required|date|after:tgl_selesai_kp',
	    	'jam_mulai' => 'required',
	    	'jam_selesai' => 'required|after:jam_mulai',
	    	'ruang_id' => 'required',
	    	'status_seminarkp' => 'required',
            'klaim_nama.*'  => 'required',
            'klaim_nim.*'  => 'required',
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json([
                'error'  => $error->errors()->all()
            ]);
        }

        $klaim_nama = $request->klaim_nama;
        $klaim_nim = $request->klaim_nim;
        for($count = 0; $count < count($klaim_nim); $count++)
        {
            $data = array(
                'kp_id'      => $request->kp_id,
                'klaim_nama' => $klaim_nama[$count],
                'klaim_nim'  => $klaim_nim[$count]
            );
            $insert_data[] = $data; 
        }
        Klaimkp::insert($insert_data);
        Seminarkp::create([
            'kp_id' => $request->kp_id,
	    	'judul_seminar' => $request->judul_seminar,
	    	'tanggal_seminar' => $request->tanggal_seminar,
	    	'jam_mulai' => $request->jam_mulai,
	    	'jam_selesai' => $request->jam_selesai,
	    	'ruang_id' => $request->ruang_id,
	    	'status_seminarkp' => $request->status_seminarkp,
        ]);
        return response()->json([
            'success'  => 'Data Added successfully.'
        ]);
            
        // return redirect('kp/seminar')->with('message','Terimakasih telah mengajukan Seminar Kerja Praktek!');
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
            ->join('kp','kp.id','=','kp_seminar.kp_id')
            ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
            ->join('ref_ruang','kp_seminar.ruang_id','=','ref_ruang.id')
            ->where('nim',Auth::user()->nim)
            ->where('status_kp','SETUJU')
            ->where('status_seminarkp','PENDING')
            ->select('*','kp_seminar.id','kp.sks','kp.ipk')
            ->firstOrFail();
        $klaim = Klaimkp::select('*')->where('kp_id',$tolak->kp_id)->get();
        // dd($klaim);

        return view('seminarkp.sem_edit', compact('tolak','ruang','klaim'));
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
        $klaimkp = $request->validate([
            'klaim_nama0'  => 'required',
            'klaim_nim0'  => 'required',
            'klaim_nama1'  => 'required',
            'klaim_nim1'  => 'required',
            'klaim_nama2'  => 'required',
            'klaim_nim2'  => 'required',
            'klaim_nama3'  => 'required',
            'klaim_nim3'  => 'required',
            'klaim_nama4'  => 'required',
            'klaim_nim4'  => 'required',
        ]);
        $klaim = Klaimkp::where('kp_id',$request->kp_id)->count();
        // dd($data);
        Seminarkp::where('id',$id)->update($validateSem);
        for($count = 0; $count < $klaim; $count++)
        {
            $idklaim = 'idklaim'.$count;
            $klaim_nama = 'klaim_nama'.$count;
            $klaim_nim = 'klaim_nim'.$count;
            Klaimkp::where('id',$request->$idklaim)->update([
                'klaim_nama' => $request->$klaim_nama,
                'klaim_nim'  => $request->$klaim_nim
            ]);
        }

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

    //Cetak Nilai Pembimbing KP
    public function cetak_nilai_pembimbing(){
        $nim = Auth::user()->nim;
        $data= Seminarkp::daftarhadir($nim);
        $nilai_pembimbing = Nilaikp::where('kp_id',$data->kp_id)->first();
        // dd($data);
        if ($nilai_pembimbing != null) {
            $config = [
                'format' => 'A4-P', // Portrait
                 'margin_left'          => 30,
                 'margin_right'         => 25,
                 'margin_top'           => 35,
                 'margin_footer'         => 5,
                // 'margin_bottom'        => 25,
              ];
            $pdf = PDF::loadview('seminarkp.cetak_nilaipembimbing',compact('data','nilai_pembimbing'),[],$config);
            return $pdf->stream();
        } else {
            return view('seminarkp.error_beluminput');
        }
    }
}
