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
        ->join('kp','kp.id','=','kp_seminar.kp_id')
        ->join('ref_mahasiswa','kp.mahasiswa_id','=','ref_mahasiswa.id')
        ->join('ref_ruang','ref_ruang.id','=','kp_seminar.ruang_id')
        ->join('ref_dosen','ref_dosen.id','=','ref_mahasiswa.pem_kp')
        ->join('kp_nilai','kp_nilai.kp_id','=','kp.id')
        ->select('*','kp_seminar.id')
        ->where('kp_seminar.id',$id)
        ->firstOrFail();
        // dd($data);
        $jabatan = Jabatan::kp();
        $config = [
            'format' => 'B5', // Portrait        
            // 'default_font'         => 'serif',
             'margin_left'          => 25,
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
          
        $pdf = PDF::loadview('admin.semkp.nilai.cetak_nilai',compact('data','jabatan','monthList'),[],$config);
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
