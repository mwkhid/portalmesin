<?php

namespace App\Http\Controllers\Admin\Kp;

use App\Models\Kp;
use App\Models\Jabatan;
use App\Models\Suratkp;
use App\Models\Acckp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class PenugasanController extends Controller
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
        $data = Kp::getsetuju()->get();
        
        return view('admin.kp.penugasan.list_penugasan',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Kp::cetakpenugasan($id);
        $jabatan = Jabatan::dekan();
        // dd($data);
        $config = [
            'format' => 'A4-P', // Portrait        
            // 'default_font'         => 'serif',
             'margin_left'          => 30,
             'margin_right'         => 25,
             'margin_top'           => 35,
             'margin_header'         => 5,
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
        $pdf = PDF::loadview('admin.kp.penugasan.cetak_penugasan',compact('data','jabatan','monthList'),[],$config);
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
        $data = Kp::getpenugasan($id);

        return view('admin.kp.penugasan.view_penugasan',compact('data'));
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
        $validatedData = $request->validate([
            'tgl_mulai_kp' => 'required',
            'tgl_selesai_kp' => 'required',
            'no_surat' => 'required',
            'tanggal_surat' => 'required',
        ]);
        // dd($validatedData);
        KP::where('kp.id',$id)->update([
            'tgl_mulai_kp' => $request->tgl_mulai_kp,
            'tgl_selesai_kp' => $request->tgl_selesai_kp,
            'status_kp' =>'SETUJU',
        ]);
        Suratkp::where('kp_id',$id)->update([
            'no_surat' => $request->no_surat,
            'tanggal_surat' => $request->tanggal_surat,
        ]);
        Acckp::where('kp_id',$id)->update([
            'permohonan' => date('Y-m-d H:i:s'),
        ]);
        return redirect(route('admin.penugasan.index'))->with('message','Pengajuan KP Berhasil di Update!');
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
