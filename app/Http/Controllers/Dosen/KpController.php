<?php

namespace App\Http\Controllers\Dosen;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Accpembimbingkp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KpController extends Controller
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
        $data = Dosen::bimbingankp(Auth::user()->nim);
        // dd($data);
        return view('dosen.kp.list_kp',compact('data'));
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
        $data = Mahasiswa::where('id',$id)->first();
        $accPembimbing = Accpembimbingkp::where('mahasiswa_id',$id)->first();
        // dd($data);
        return view('dosen.kp.view',compact('data','accPembimbing'));
    }

    public function updateTempatkp(Request $request)
    {
        $data = Accpembimbingkp::where('mahasiswa_id',$request->mhs_id)->first();
        if($data){
            $data->tempat_kp = $request->status;
            $data->save();
        }else{
            $data = new Accpembimbingkp;
            $data->mahasiswa_id = $request->mhs_id;
            $data->tempat_kp = $request->status;
            $data->save();
        }

        return response()->json(['message' => 'User status updated successfully.']);
    }

    public function updateProposalkp(Request $request)
    {
        $data = Accpembimbingkp::where('mahasiswa_id',$request->mhs_id)->first();
        $data->proposal_kp = $request->status;
        $data->save();

        return response()->json(['message' => 'User status updated successfully.']);
    }

    public function updatePenugasankp(Request $request)
    {
        $data = Accpembimbingkp::where('mahasiswa_id',$request->mhs_id)->first();
        $data->penugasan_kp = $request->status;
        $data->save();

        return response()->json(['message' => 'User status updated successfully.']);
    }

    public function updateSeminarkp(Request $request)
    {
        $data = Accpembimbingkp::where('mahasiswa_id',$request->mhs_id)->first();
        $data->seminar_kp = $request->status;
        $data->save();

        return response()->json(['message' => 'User status updated successfully.']);
    }

    public function updateLaporankp(Request $request)
    {
        $data = Accpembimbingkp::where('mahasiswa_id',$request->mhs_id)->first();
        $data->laporan_kp = $request->status;
        $data->save();

        return response()->json(['message' => 'User status updated successfully.']);
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
