<?php

namespace App\Http\Controllers\Admin\Kp;

use App\Models\Kp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SelesaikpController extends Controller
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
        $data = Kp::getsetuju()->join('kp_dokumen','kp_dokumen.kp_id','=','kp.id')->get();
        // $test = Kp::selesai_kp();
        // foreach($data  as $datas){
        //     // $bulan1 = DateTime::createFromFormat("Y-m-d", $datas->tgl_selesai_kp);
        //     // $test = Carbon::now()->addMonths(2);
        //     $test1 = Carbon::createFromFormat('Y-m-d', $datas->tgl_selesai_kp)->addMonths(2)->format('Y-m-d');
        //     // $bulan = date("Y-m-d",$datas->tgl_selesai_kp);
        //     // $bulan->add(new DateInterval('P10D'));
        //     // $bulan->format('Y-m-d') . "\n";
        // }
        
        // dd($test);
        return view('admin.kp.selesaikp.index',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kp = Kp::where('kp.id', $id)->join('kp_dokumen','kp_dokumen.kp_id','=','kp.id')->firstOrFail();
        // dd($kp);
        if($kp->file_selesaikp != null){
            return redirect(asset('file_selesaikp/'.$kp->file_selesaikp));
        }
        return view('errors.selesaikp');
    }

    /**
     * display the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lihatsurattugas($id)
    {
        $kp = Kp::where('kp.id', $id)->join('kp_dokumen','kp_dokumen.kp_id','=','kp.id')->firstOrFail();
        // dd($kp);
        if($kp->file_surattugas != null){
            return redirect(asset('file_surattugaskp/'.$kp->file_surattugas));
        }
        return view('errors.surattugas');
    }
}
