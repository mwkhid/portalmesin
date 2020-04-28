<?php

namespace App\Http\Controllers\Admin\Reportkp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kp;
use App\Models\Jabatan;
use PDF;

class ReportpermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kp::join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')->select('*','kp.id')->get();
        return view('admin.reportkp.permohonan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            ->join('acc_kp','acc_kp.kp_id','=','kp.id')
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
          
        $pdf = PDF::loadview('admin.reportkp.permohonan.cetak_permohonan',compact('data','jabatan','monthList'),[],$config);
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
