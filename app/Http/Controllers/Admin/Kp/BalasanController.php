<?php

namespace App\Http\Controllers\Admin\Kp;

use App\Models\Kp;
use App\Models\Suratkp;
use App\Models\Acckp;
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
    public function index()
    {
        $data = Kp::getwaiting()->join('dokumen_kp','dokumen_kp.kp_id','=','kp.id')->whereNotNull('file_balasan')->get();
        
        return view('admin.kp.balasan.list_balasan',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kp = Kp::where('kp.id', $id)
            ->join('dokumen_kp','dokumen_kp.kp_id','=','kp.id')
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
                KP::where('kp.id',$id)->update([
                    'tgl_mulai_kp' => $request->tgl_mulai_kp,
                    'tgl_selesai_kp' => $request->tgl_selesai_kp,
                    'status_kp' =>'SETUJU'
                ]);

                Acckp::where('kp_id',$id)->update([
                    'permohonan' => date('Y-m-d H:i:s'),
                ]);

                Suratkp::updateOrCreate(['kp_id' => $id],[
                    'no_surat' => $request->no_surat,
                    'tanggal_surat' => $request->tanggal_surat,
                ]);

                return redirect(route('admin.balasan.index'))->with('message','Pengajuan KP Berhasil di Update!');
                break;
    
            case 'tolak':
                KP::where('kp.id',$id)->update([
                    'status_kp' =>'TOLAK'
                ]);
                return redirect(route('admin.balasan.index'))->with('message','Pengajuan KP Berhasil di Update!');
                break;
        }
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