<?php

namespace App\Http\Controllers\Dosen;

use App\Models\Dosen;
use App\Models\Logpembimbing2ta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TapembimbingController extends Controller
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
        $data = Dosen::pembimbingta(Auth::user()->nim);
        // dd($data);
        return view('dosen.pembimbing.index',compact('data'));
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
        $data = Dosen::getpembimbingbaruta($id,Auth::user()->nim);
        $pembimbinglama = Logpembimbing2ta::pembimbinglama($data->log_pembimbing_ta_id);
        $pembimbingbaru = Logpembimbing2ta::pembimbingbaru($data->log_pembimbing_ta_id);
        // dd($data);
        return view('dosen.pembimbing.view',compact('data','pembimbinglama','pembimbingbaru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Dosen::getpembimbinglamata($id,Auth::user()->nim);
        $pembimbinglama = Logpembimbing2ta::pembimbinglama($data->log_pembimbing_ta_id);
        $pembimbingbaru = Logpembimbing2ta::pembimbingbaru($data->log_pembimbing_ta_id);
        // dd($data);
        return view('dosen.pembimbing.edit',compact('data','pembimbinglama','pembimbingbaru'));
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
        switch ($request->input('action')) {
            case 'setuju':
                Logpembimbing2ta::where('id',$id)->update([
                    'status_pembimbing_baru' => 1,
                ]);
                return redirect(route('dosen.pembimbingta.index'))->with('message','Perubahan pembimbing Tugas Akhir Disetujui!');
                break;
            
            case 'tolak':
                Logpembimbing2ta::where('id',$id)->update([
                    'status_pembimbing_baru' => 0,
                ]);
                return redirect(route('dosen.pembimbingta.index'))->with('message','Perubahan pembimbing Tugas Akhir Ditolak!');
                break;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatelama(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'setuju':
                Logpembimbing2ta::where('id',$id)->update([
                    'status_pembimbing_lama' => 1,
                ]);
                return redirect(route('dosen.pembimbingta.index'))->with('message','Perubahan pembimbing Tugas Akhir Disetujui!');
                break;
            
            case 'tolak':
                Logpembimbing2ta::where('id',$id)->update([
                    'status_pembimbing_lama' => 0,
                ]);
                return redirect(route('dosen.pembimbingta.index'))->with('message','Perubahan pembimbing Tugas Akhir Ditolak!');
                break;
        }
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
