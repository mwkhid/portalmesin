<?php

namespace App\Http\Controllers\Admin\Reportkp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kp;
use App\Models\Jabatan;
use PDF;

class ReportpengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kp::join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')->select('*','kp.id')->get();
        return view('admin.reportkp.pengajuan.index',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Kp::select('*','kp.id')
            ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
            ->orWhere('status_kp','WAITING')
            ->orWhere('status_kp','SETUJU')
            ->where('kp.id',$id)
            ->firstOrFail();
        // dd($data);
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
        $pdf = PDF::loadview('admin.reportkp.pengajuan.cetak_pengajuan',compact('data','jabatan'),[],$config);
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
