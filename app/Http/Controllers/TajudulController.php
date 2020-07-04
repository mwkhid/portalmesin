<?php

namespace App\Http\Controllers;

use App\Models\Ta;
use App\Models\Logta;
use App\Models\Pembimbing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TajudulController extends Controller
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
        $nim = Auth::user()->nim;
        $data = Ta::setuju($nim)->first();
        if($data != null){
            $listjudul = Ta::judultasetuju($nim)->get();
            return view('ta.judul.index',compact('data','listjudul'));
        }else{
            return view('ta.error.seminar');
        }
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
        $validatedData = $request->validate([
            'ta_id' => 'required',
            'judul_lama' => 'required',
            'judul_baru' => 'required',
            'judul_alasan' => 'required',
        ]);
        // dd($validatedData);
        Logta::create([
            'ta_id' => $request->ta_id,
            'judul_lama' => $request->judul_lama,
            'judul_baru' => $request->judul_baru,
            'judul_alasan' => $request->judul_alasan,
            'status_judul' => 2,
        ]);

        Pembimbing::where('ta_id',$request->ta_id)->update([
            'status_perubahanjudul' => 2,
        ]);
        return redirect(route('ta.judul.index'))->with('message','Permohonan perubahan judul berhasil di ajukan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
