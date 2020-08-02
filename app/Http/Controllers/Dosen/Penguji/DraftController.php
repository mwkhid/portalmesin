<?php

namespace App\Http\Controllers\Dosen\Penguji;

use App\Models\Dosen;
use App\Models\Halpengesahan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DraftController extends Controller
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
        $data = Dosen::getpengujipendadaran($id,Auth::user()->nim);
        $pengesahan = Halpengesahan::where('mahasiswa_id',$data->mahasiswa_id)->first();
        // dd($data);
        return view('dosen.draft.showpenguji',compact('data','pengesahan'));
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
        if($request->penguji_ke == 1){
            Halpengesahan::updateOrCreate(['mahasiswa_id' => $id,],[
                'PJ1' => 1,
            ]);
        }else{
            Halpengesahan::updateOrCreate(['mahasiswa_id' => $id,],[
                'PJ2' => 1,
            ]);
        }

        return redirect()->back()->with('message','Draft Berhasil Disetujui!');
    }
}
