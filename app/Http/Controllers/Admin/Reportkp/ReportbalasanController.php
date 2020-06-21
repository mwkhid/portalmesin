<?php

namespace App\Http\Controllers\Admin\Reportkp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kp;
use App\Models\Jabatan;
use PDF;

class ReportbalasanController extends Controller
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
        return view('admin.reportkp.balasan.index',compact('data'));
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
