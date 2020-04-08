<?php

namespace App\Http\Controllers\Admin\Kp;

use App\Models\Kp;
use App\Models\Jabatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class PermohonanController extends Controller
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
        $data = Kp::getwaiting()->get();
        
        return view('admin.kp.permohonan.list_permohonan',compact('data'));
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
            ->join('mahasiswa','mahasiswa.id','=','kp.mahasiswa_id')
            ->join('rencana_kp','rencana_kp.kp_id','=','kp.id')
            ->where('kp.id',$id)
            ->firstOrFail();
        $jabatan = Jabatan::dekan();
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
          
        $pdf = PDF::loadview('admin.kp.permohonan.cetak_permohonan',compact('data','jabatan','monthList'),[],$config);
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
