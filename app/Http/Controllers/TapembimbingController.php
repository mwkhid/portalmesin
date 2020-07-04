<?php

namespace App\Http\Controllers;

use App\Models\Ta;
use App\Models\Pembimbing;
use App\Models\Dosen;
use App\Models\Logpembimbingta;
use App\Models\Logpembimbing2ta;
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
        $nim = Auth::user()->nim;
        $data = Ta::setuju($nim)->first();
        if($data != null){
            $dosen = Dosen::all();
            $pembimbing = Pembimbing::pembimbing($data->id);
            $listpembimbing = Ta::pembimbingtasetuju($nim)->get();
            return view('ta.pembimbing.index',compact('data','dosen','pembimbing','listpembimbing'));
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
            'idpem_lama1' => 'required',
            'idpem_lama2' => 'required',
            'pembimbing_baru1' => 'required|different:pembimbing_baru2',
            'pembimbing_baru2' => 'required|different:pembimbing_baru1',
            'pembimbing_alasan' => 'required',
        ]);

        // dd($validatedData);
            $data = Logpembimbingta::create([
                'ta_id' => $request->ta_id,
                'pembimbing_alasan' => $request->pembimbing_alasan,
                'status_pembimbing' => 2,
            ]);

            for ($i = 1; $i <= 2; $i++){
                $pembimbinglama = 'idpem_lama' . $i;
                $pembimbingbaru = 'pembimbing_baru' . $i;
                Logpembimbing2ta::create([
                    'log_pembimbing_ta_id' => $data->id,
                    'pembimbing_lama' => $request->$pembimbinglama,
                    'pembimbing_baru' => $request->$pembimbingbaru,
                    'pembimbing_ke' => $i,
                ]);
            }

        return redirect(route('ta.pembimbing.index'))->with('message','Perubahan pembimbing berhasil diajukan!');
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
