<?php

namespace App\Http\Controllers\Admin\Seminarkp;

use App\Models\Seminarkp;
use App\Models\Nilaikp;
use App\Models\Jabatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class NilaikpController extends Controller
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
        $data = Seminarkp::nilaikp();
        
        return view('admin.semkp.nilai.index',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Seminarkp::find($id)
        ->join('kp','kp.id','=','seminar_kp.kp_id')
        ->join('mahasiswa','kp.mahasiswa_id','=','mahasiswa.id')
        ->join('ref_ruang','ref_ruang.id','=','seminar_kp.ruang_id')
        ->join('ref_dosen','ref_dosen.id','=','mahasiswa.pem_kp')
        ->join('nilai_kp','nilai_kp.kp_id','=','kp.id')
        ->select('*','seminar_kp.id')
        ->where('seminar_kp.id',$id)
        ->firstOrFail();
        // dd($data);
        $jabatan = Jabatan::kp();
        $config = [
            'format' => 'B5', // Portrait        
            // 'default_font'         => 'serif',
             'margin_left'          => 30,
             'margin_right'         => 25,
             'margin_top'           => 35,
             'margin_header'         => 5,
             'margin_footer'         => 5,
            // 'margin_bottom'        => 25,
          ];
          
        $pdf = PDF::loadview('admin.semkp.nilai.cetak_nilai',compact('data','jabatan'),[],$config);
        return $pdf->stream();
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
