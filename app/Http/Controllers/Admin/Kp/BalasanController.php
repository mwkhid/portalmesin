<?php

namespace App\Http\Controllers\Admin\Kp;

use App\Models\Kp;
use App\Models\Suratkp;
use App\Models\Acckp;
use App\Models\Accpembimbingkp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class BalasanController extends Controller
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
    // public function index()
    // {
    //     $data = Kp::getwaiting()->join('kp_dokumen','kp_dokumen.kp_id','=','kp.id')->whereNotNull('file_balasan')->get();
        
    //     return view('admin.kp.balasan.list_balasan',compact('data'));
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kp = Kp::where('kp.id', $id)
            ->join('kp_dokumen','kp_dokumen.kp_id','=','kp.id')
            ->firstOrFail();
        // dd($kp);
        if($kp->file_balasan != null){
            return redirect(asset('file_balasankp/'.$kp->file_balasan));
        }
        return view('errors.belumupload');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kp::getbalasan($id);
        // dd($data);
        return view('admin.kp.balasan.view_balasan',compact('data'));
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
        switch ($request->input('action')) {
            case 'setuju':
                $request->validate([
                    'tgl_mulai_kp' => 'required',
                    'tgl_selesai_kp' => 'required',
                    'no_surat' => 'required',
                    'tanggal_surat' => 'required'
                ]);

                KP::where('kp.id',$id)->update([
                    'tgl_mulai_kp' => $request->tgl_mulai_kp,
                    'tgl_selesai_kp' => $request->tgl_selesai_kp,
                    'status_kp' =>'SETUJU'
                ]);

                Acckp::where('kp_id',$id)->update([
                    'penugasan' => date('Y-m-d H:i:s'),
                ]);

                Suratkp::updateOrCreate(['kp_id' => $id],[
                    'no_surat' => $request->no_surat,
                    'tanggal_surat' => $request->tanggal_surat,
                ]);

                return redirect(route('admin.permohonan.index'))->with('message','Pengajuan KP Berhasil di Update!');
                break;
    
            case 'tolak':
                $request->validate([
                    'no_surat' => 'required',
                    'tanggal_surat' => 'required'
                ]);

                KP::where('kp.id',$id)->update([
                    'status_kp' =>'TOLAK'
                ]);

                Suratkp::updateOrCreate(['kp_id' => $id],[
                    'no_surat' => $request->no_surat,
                    'tanggal_surat' => $request->tanggal_surat,
                ]);

                Accpembimbingkp::where('mahasiswa_id',$request->mhs_id)->update([
                    'tempat_kp' => 0,
                    'proposal_kp' => 0,
                    'penugasan_kp' => 0,
                    'seminar_kp' => 0,
                    'laporan_kp' => 0,
                ]);
                return redirect(route('admin.permohonan.index'))->with('message','Pengajuan KP Berhasil di Update!');
                break;
        }
    }

    public function lihatpermohonan($id){
        $kp = Kp::where('kp.id', $id)
            ->join('kp_dokumen','kp_dokumen.kp_id','=','kp.id')
            ->firstOrFail();
        // dd($kp);
        if($kp->file_permohonan != null){
            return redirect(asset('file_permohonan/'.$kp->file_permohonan));
        }
        return view('errors.permohonan');        
    }

    public function lihatpenugasan($id){
        $kp = Kp::where('kp.id', $id)
            ->join('kp_dokumen','kp_dokumen.kp_id','=','kp.id')
            ->firstOrFail();
        // dd($kp);
        if($kp->file_penugasan != null){
            return redirect(asset('file_penugasan/'.$kp->file_penugasan));
        }
        return view('errors.penugasan');        
    }
}
