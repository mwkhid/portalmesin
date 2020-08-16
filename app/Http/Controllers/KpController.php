<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kp;
use App\Models\Rencanakp;
use App\Models\Dokumenkp;
use App\Models\Accpembimbingkp;
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
        //Fungsi untuk tampilan pendaftaran kerja praktek
        $nim = Auth::user()->nim;
        $setuju = Kp::setuju($nim)->get()->last();
        $pending = Kp::pending($nim)->get()->last();
        $tolak = Kp::tolak($nim)->get()->last();
        $edit = Kp::edit($nim)->get()->last();
        $waiting = Kp::waiting($nim)->get()->last();
        $data = Mahasiswa::pemkp($nim)->first();
        // dd($data);
        
        if ($setuju != null) {
            return view('kp.kp_setuju',compact('setuju')); //Input pengajuan KP Disetujui
        }else if ($waiting != null) {
            $accPenugasankp = Accpembimbingkp::where('mahasiswa_id','=',$waiting->mahasiswa_id)->first();
            return view('kp.kp_waiting',compact('waiting','accPenugasankp')); //KP menunggu balasan
        }else if ($pending != null) {
            return view('kp.kp_pending',compact('pending')); //Input pengajuan berhasil diajukan
        }else if ($edit != null) {
            $accTempatkp = Accpembimbingkp::where('mahasiswa_id','=',$edit->mahasiswa_id)->first();
            return view('kp.kp_tolak',compact('edit','accTempatkp')); //Input edit
        }else if ($tolak != null) {
            $accTempatkp = Accpembimbingkp::where('mahasiswa_id','=',$data->id)->first();
            return view('kp.kp_pengajuan',compact('data','accTempatkp')); //Input pengajuan KP Ditolak
        }else if($data != null){
            $accTempatkp = Accpembimbingkp::where('mahasiswa_id','=',$data->id)->first();
            // dd($accTempatkp);
            return view('kp.kp_pengajuan',compact('data','accTempatkp')); //Belum mengajukan KP
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
        //|unique:kp
        $tgl = Carbon::createFromDate($request->rencana_mulai_kp)->addWeeks(4)->format('Y-m-d');
        // dd($tgl);
        $validatedKp = $request->validate([
            'mahasiswa_id' => 'required',
            'sks' => 'required',
            'ipk' => 'required',
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
            'sks' => $request->sks,
            'ipk' => $request->ipk,
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
                ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
                ->join('kp_rencana','kp_rencana.kp_id','=','kp.id')
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
            'sks' => 'required',
            'ipk' => 'required',
    		'perusahaan_nama' => 'required',
    		'perusahaan_almt' => 'required',
    		'perusahaan_jenis' => 'required',
    		'pic' => 'required',
    		'rencana_mulai_kp' => 'required',
    		'rencana_selesai_kp' => 'required|date|after:'.$tgl,
            'status_kp' => 'required',
        ]);
        $kp =  Kp::find($id);
        $kp->sks = $request->sks;
        $kp->ipk = $request->ipk;
        $kp->tgl_ajuan = date('Y-m-d H:i:s');
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
        $data = Kp::form($nim)->get()->last();
        if($data != null){
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
        } else{
            return view('errors.belumdaftar');
        }
    }

    //Fungsi untuk Cetak Lembar Tugas KP
    public function cetak_lmbr_tugas(){
        $nim = Auth::user()->nim;
        $data = Kp::cetak($nim)->get()->last();
        if ($data->file_balasan != null) {
            $config = [
                'format' => 'A4-P', // Portrait
                 'margin_left'          => 30,
                 'margin_right'         => 25,
                 'margin_top'           => 35,
                 'margin_footer'         => 5,
                // 'margin_bottom'        => 25,
              ];
              $monthList = array(
                  'Jan' => 'Januari',
                  'Feb' => 'Februari',
                  'Mar' => 'Maret',
                  'Apr' => 'April',
                  'May' => 'Mei',
                  'Jun' => 'Juni',
                  'Jul' => 'Juli',
                  'Aug' => 'Agustus',
                  'Sep' => 'September',
                  'Oct' => 'Oktober',
                  'Nov' => 'November',
                  'Dec' => 'Desember',
              );
            $pdf = PDF::loadview('/kp/cetak_lmbrtugas',compact('data','monthList'),[],$config);
            return $pdf->stream();
        } else {
            return view('errors.belumupload');
        }
    }

    //Fungsi untuk Cetak Form Nilai KP
    public function cetak_form_nilai(){
        $nim = Auth::user()->nim;
        $data = Kp::cetak($nim)->get()->last();
        if ($data->file_balasan != null) {
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
            return view('errors.belumupload');
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
        switch ($request->input('action')) {
            case 'proposal':
                $data = $this->validate($request, [
                    'file_proposal' => 'required|file|mimes:pdf|max:2048',
                ]);
                
                // menyimpan data file yang diupload ke variabel $proposal
                $proposal = $request->file('file_proposal');
        
                $nama_proposal = $request->nim."_Berkas_ProposalKP_".$request->id.".".$proposal->getClientOriginalExtension();
         
                // isi dengan nama folder tempat kemana file diupload
                $proposal_upload = 'file_proposal';
                $proposal->move($proposal_upload,$nama_proposal);
        
                Dokumenkp::where('kp_id', $id)->update([
                    'file_proposal' => $nama_proposal,
                ]);
                return redirect()->back()->with('message','File Proposal KP Berhasil diupload!');
                break;
            case 'permohonan':
                $data = $this->validate($request, [
                    'file_permohonan' => 'required|file|mimes:pdf|max:2048',
                ]);
                
                // dd($data);
                // menyimpan data file yang diupload ke variabel $permohonan
                $permohonan = $request->file('file_permohonan');
        
                $nama_permohonan = $request->nim."_Berkas_PermohonanKP_".$request->id.".".$permohonan->getClientOriginalExtension();
         
                  // isi dengan nama folder tempat kemana file diupload
                $permohonan_upload = 'file_permohonan';
                $permohonan->move($permohonan_upload,$nama_permohonan);
        
                Dokumenkp::where('kp_id', $id)->update([
                    'file_permohonan' => $nama_permohonan,
                ]);
                return redirect()->back()->with('message','File Permohonan Berhasil diupload!');
                break;
            case 'balasan':
                $tgl = Carbon::createFromDate($request->tgl_mulai_kp)->addWeeks(4)->format('Y-m-d');
                $this->validate($request, [
                    'file_balasan' => 'required|file|mimes:pdf|max:2048',
                    'tgl_mulai_kp' => 'required',
                    'tgl_selesai_kp' => 'required|date|after:'.$tgl,
                ]);
         
                // menyimpan data file yang diupload ke variabel $file
                $file = $request->file('file_balasan');
                //$id = $request->id;
                $nama_file = $request->nim."_Berkas_BalasanKP_".$request->id.".".$file->getClientOriginalExtension();
         
                  // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'file_balasankp';
                $file->move($tujuan_upload,$nama_file);
        
                Dokumenkp::where('kp_id', $id)->update([
                    'file_balasan' => $nama_file,
                ]);
        
                KP::where('kp.id',$id)->update([
                    'tgl_mulai_kp' => $request->tgl_mulai_kp,
                    'tgl_selesai_kp' => $request->tgl_selesai_kp
                ]);
              
                return redirect()->back()->with('message','File Balasan Berhasil diupload!');
                break;
            case 'penugasan':
                $data = $this->validate($request, [
                    'file_penugasan' => 'required|file|mimes:pdf|max:2048',
                ]);
                
                // dd($data);
                // menyimpan data file yang diupload ke variabel $penugasan
                $penugasan = $request->file('file_penugasan');
        
                $nama_penugasan = $request->nim."_Berkas_PenugasanKP".".".$penugasan->getClientOriginalExtension();
         
                  // isi dengan nama folder tempat kemana file diupload
                $penugasan_upload = 'file_penugasan';
                $penugasan->move($penugasan_upload,$nama_penugasan);
        
                Dokumenkp::where('kp_id', $id)->update([
                    'file_penugasan' => $nama_penugasan,
                ]);
                return redirect()->back()->with('message','File Penugasan Berhasil diupload!');
                break;
        }
    }

    //Melihat File Upload
    public function viewFile($file){
        $kp = Kp::where('file_balasan', $file)->firstOrFail();
        return redirect(asset('file_balasankp/'.$kp->file_balasan));
    }
}
