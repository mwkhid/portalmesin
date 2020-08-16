<?php

namespace App\Http\Controllers\Admin\Reportkp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kp;
use PDF;

class ReportpenugasanController extends Controller
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
        $data = Kp::join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')->select('*','kp.id')
                ->orderBy('kp.tgl_ajuan','desc')
                ->get();
        return view('admin.reportkp.penugasan.index',compact('data'));
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
        $data = Kp::cetak($id)->get()->last();
        // dd($data);
        if ($data->penugasan_kp != null) {
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
            return view('errors.penugasan');
        }
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
