<?php

namespace App\Http\Controllers\Admin\Seminarkp;

use App\Models\Seminarkp;
use App\Models\Kp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PresensiController extends Controller
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
        $data = Seminarkp::semkpsetuju();

        return view('admin.semkp.presensi.index',compact('data'));
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
        if($kp->file_presensi != null){
            return redirect(asset('file_presensi/'.$kp->file_presensi));
        }
        return view('errors.presensi');
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
