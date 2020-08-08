<?php

namespace App\Http\Controllers\Dosen\Pembimbing;

use App\Models\Dosen;
use App\Models\Ta;
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
        $data = Dosen::bimbinganpendadaran(Auth::user()->nim)->where('proses_ta',4)->whereNotNull('doc_ta');
        $data2 = Dosen::pengujipendadaran(Auth::user()->nim)->where('proses_ta',4)->whereNotNull('doc_ta');
        // dd($data2);
        return view('dosen.draft.index',compact('data','data2'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Dosen::getbimbinganpendadaran($id,Auth::user()->nim);
        $pengesahan = Halpengesahan::where('mahasiswa_id',$data->mahasiswa_id)->first();
        // dd($data);
        return view('dosen.draft.show',compact('data','pengesahan'));
    }

    public function downloaddraft($id){
        $ta = Ta::find($id);
        if($ta->doc_ta){
            $file_name = $ta->doc_ta;
            $file_path = public_path('file_draftta/'.$file_name);
            return response()->download($file_path);
        }
        return view('dosen.draft.belumupload');
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
        if($request->pem == 1){
            Halpengesahan::updateOrCreate(['mahasiswa_id' => $id,],[
                'PB1' => 1,
            ]);
        }else{
            Halpengesahan::updateOrCreate(['mahasiswa_id' => $id,],[
                'PB2' => 1,
            ]);
        }

        return redirect()->back()->with('message','Draft Berhasil Disetujui!');
    }
}
