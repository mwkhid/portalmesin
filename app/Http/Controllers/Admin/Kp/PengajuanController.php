<?php

namespace App\Http\Controllers\Admin\Kp;

use App\Models\Kp;
use App\Models\Jabatan;
use App\Models\Acckp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class PengajuanController extends Controller
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
        $data = Kp::getpending()->get();
        // dd($data);
        return view('admin.kp.pengajuan.list_pengajuan',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Kp::select('*','kp.id','kp.sks','kp.ipk')
            ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
            ->join('kp_rencana','kp_rencana.kp_id','=','kp.id')
            ->where('kp.id',$id)
            ->firstOrFail();
        $jabatan = Jabatan::kp();
        $config = [
            'format' => 'A4-P', // Portrait        
            // 'default_font'         => 'serif',
                'margin_left'          => 30,
                'margin_right'         => 25,
                'margin_top'           => 40,
                'margin_header'         => 5,
                'margin_footer'         => 5,
            // 'margin_bottom'        => 25,
            ];
        $pdf = PDF::loadview('admin.kp.pengajuan.cetak_pengajuankp',compact('data','jabatan'),[],$config);
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kp::getpengajuan($id);
        $riwayatkp = Kp::where('kp.mahasiswa_id',$data->mahasiswa_id)->select('*')->get();
        // dd($data);
        return view('admin.kp.pengajuan.view_pengajuan', compact('data','riwayatkp'));
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
                    'status_kp' =>'WAITING'
                ]);

                Acckp::updateOrCreate(['kp_id' => $id],[
                    'pengajuan' => date('Y-m-d H:i:s'),
                ]);

                return redirect(route('admin.pengajuan.index'))->with('message','Pengajuan KP Berhasil di Update!');
                break;
    
            case 'tolak':
                KP::where('kp.id',$id)->update([
                    'status_kp' =>'EDIT'
                ]);
                
                return redirect(route('admin.pengajuan.index'))->with('message','Pengajuan KP Berhasil di Update!');
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
