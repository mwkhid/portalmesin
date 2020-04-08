<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kp;
use App\Models\Rencanakp;
use App\Models\Dokumenkp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Carbon\Carbon;

class KpController extends Controller
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
        // $mhs = Mahasiswa::where('nim',$nim)->firstOrFail();
        // $kp = Mahasiswa::find($mhs->id)->kp;
        // $pending = Mahasiswa::has('kp')->with(['kp' => function($query){
        //         $query->where('status_kp','=','PENDING'); //you may use any condition here or manual select operation
        //         $query->select('*'); //select operation
        //     }])->where('id','=',$mhs->id)->first();
        $setuju = Kp::setuju($nim)->first();
        $pending = Kp::pending($nim)->first();
        $tolak = Kp::tolak($nim)->first();
        $waiting = Kp::waiting($nim)->first();
        $data = Mahasiswa::pemkp($nim)->first();
        // dd($data);
        
        if ($setuju != null) {
            return view('kp.kp_setuju',compact('setuju')); //Input pengajuan KP Disetujui
        }else if ($waiting != null) {
            return view('kp.kp_waiting',compact('waiting')); //Upload file balasan
        }else if ($pending != null) {
            return view('kp.kp_pending',compact('pending')); //Input pengajuan berhasil diajukan
        }else if ($tolak != null) {
            return view('kp.kp_tolak',compact('tolak')); //Input pengajuan KP Ditolak
        }else if($data != null){
            return view('kp.kp_pengajuan',compact('data')); //Belum mengajukan KP
        }else{
            return view('errors.errorpem'); //Belum mempunyai pembimbing
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
        $tgl = Carbon::createFromDate($request->rencana_mulai_kp)->addWeeks(4)->format('Y-m-d');
        // dd($tgl);
        $validatedKp = $request->validate([
    		'mahasiswa_id' => 'required|unique:kp',
    		'perusahaan_nama' => 'required',
    		'perusahaan_almt' => 'required',
    		'perusahaan_jenis' => 'required',
    		'pic' => 'required',
    		'rencana_mulai_kp' => 'required',
    		'rencana_selesai_kp' => 'required|date|after:'.$tgl,
    		'status_kp' => 'required',
        ]);

        $kp = Kp::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'perusahaan_nama' => $request->perusahaan_nama,
            'perusahaan_almt' => $request->perusahaan_almt,
            'perusahaan_jenis' => $request->perusahaan_jenis,
            'pic' => $request->pic,
            'status_kp' => $request->status_kp,
        ]);

        Rencanakp::create([
            'kp_id' => $kp->id,
            'rencana_mulai_kp' => $request->rencana_mulai_kp,
            'rencana_selesai_kp' => $request->rencana_selesai_kp,
        ]);

        Dokumenkp::create([
            'kp_id' => $kp->id,

        ]);
        
		// Kp::create($validatedKp);

    	return redirect(route('kp.pendaftaran.index'))->with('message','Terimakasih telah mengajukan Kerja Praktek!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tolak = Kp::find($id)
                ->select('*','kp.id')
                ->join('mahasiswa','mahasiswa.id','=','kp.mahasiswa_id')
                ->join('rencana_kp','rencana_kp.kp_id','=','kp.id')
                ->where('nim', Auth::user()->nim)
                ->where('status_kp','PENDING')
                ->firstOrFail();
        // dd($tolak);
        return view('kp.kp_edit', compact('tolak'));
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
        $tgl = Carbon::createFromDate($request->rencana_mulai_kp)->addWeeks(4)->format('Y-m-d');
        $validatedKp = $request->validate([
    		'perusahaan_nama' => 'required',
    		'perusahaan_almt' => 'required',
    		'perusahaan_jenis' => 'required',
    		'pic' => 'required',
    		'rencana_mulai_kp' => 'required',
    		'rencana_selesai_kp' => 'required|date|after:'.$tgl,
            'status_kp' => 'required',
        ]);
        $kp =  Kp::find($id);
        $kp->perusahaan_nama = $request->perusahaan_nama;
        $kp->perusahaan_almt = $request->perusahaan_almt;
        $kp->perusahaan_jenis = $request->perusahaan_jenis;
        $kp->pic = $request->pic;
        $kp->status_kp = $request->status_kp;
        $kp->save();
        
        Rencanakp::where('kp_id',$id)->update([
            'rencana_mulai_kp' => $request->rencana_mulai_kp,
            'rencana_selesai_kp' => $request->rencana_selesai_kp,
        ]);

		// Kp::where('id',$id)->update($validatedKp);

    	return redirect(route('kp.pendaftaran.index'))->with('message','Data Kerja Praktek Berhasil di Update!');
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

    //Fungsi untuk Cetak Form Konsultasi
    public function cetak_form(){
        $nim = Auth::user()->nim;
        $data = Kp::form($nim);
        $config = [
            'format' => 'A4-P', // Portrait
             'margin_left'          => 30,
             'margin_right'         => 25,
             'margin_top'           => 20,
             'margin_footer'         => 5,
            // 'margin_bottom'        => 25,
          ];
        $pdf = PDF::loadview('/kp/cetak_form',compact('data'),[],$config);
        return $pdf->stream();
    }

    //Fungsi untuk Cetak Lembar Tugas KP
    public function cetak_lmbr_tugas(){
        $nim = Auth::user()->nim;
        $data = Kp::cetak($nim)->first();
        if ($data != null) {
            $config = [
                'format' => 'A4-P', // Portrait
                 'margin_left'          => 30,
                 'margin_right'         => 25,
                 'margin_top'           => 35,
                 'margin_footer'         => 5,
                // 'margin_bottom'        => 25,
              ];
            $pdf = PDF::loadview('/kp/cetak_lmbrtugas',compact('data'),[],$config);
            return $pdf->stream();
        } else {
            return view('errors.errorkp');
        }
    }

    //Fungsi untuk Cetak Form Nilai KP
    public function cetak_form_nilai(){
        $nim = Auth::user()->nim;
        $data = Kp::cetak($nim)->first();
        if ($data != null) {
            $config = [
                'format' => 'A4-P', // Portrait
                 'margin_left'          => 30,
                 'margin_right'         => 25,
                 'margin_top'           => 35,
                 'margin_footer'         => 5,
                // 'margin_bottom'        => 25,
              ];
            $pdf = PDF::loadview('/kp/cetak_formnilai',compact('data'),[],$config);
            return $pdf->stream();
        } else {
            return view('errors.errorkp');
        }
    }

    //View Dari Upload File
    // public function uploadFile()
    // {
    //     $data = Kp::get()->first();
    //     //dd($data);
    //     return view('kp.kp_waiting',compact('data'));
    // }

    //Upload file balasan ke database dan storage
    public function StoreUpload(Request $request,$id)
    {
        $this->validate($request, [
			'file_balasan' => 'required|file|mimes:pdf|max:2048'
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file_balasan');
        //$id = $request->id;
		$nama_file = $request->nim."_Berkas_BalasanKP".".".$file->getClientOriginalExtension();
 
      	// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'file_balasankp';
        $file->move($tujuan_upload,$nama_file);

        Dokumenkp::where('kp_id', $id)->update([
            'file_balasan' => $nama_file,
        ]);
      
		return redirect()->back()->with('message','File Berhasil diupload!');
    }

    //Melihat File Upload
    public function viewFile($file){
        $kp = Kp::where('file_balasan', $file)->firstOrFail();
        return redirect(asset('file_balasankp/'.$kp->file_balasan));
    }
}
