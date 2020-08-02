<?php

namespace App\Http\Controllers\Dosen;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Biodataalumni;
use App\Models\Bebaslab;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersetujuanpaController extends Controller
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
        $data = Dosen::bimbinganlulus(Auth::user()->nim);

        return view('dosen.persetujuanpa.index',compact('data'));
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
        $bio = Biodataalumni::where('mahasiswa_id',$id)->first();
        $bebaslab = Bebaslab::where('mahasiswa_id',$id)->first();

        return view('dosen.persetujuanpa.show',compact('data','bio','bebaslab'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lihatbiodata($id)
    {
        $bio = Biodataalumni::where('mahasiswa_id',$id)->first();
        if ($bio) {
            return view('dosen.persetujuanpa.biodata',compact('bio'));
        }
        return view('dosen.persetujuanpa.beluminput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lihatbebaslab($id)
    {
        $bebaslab = Bebaslab::where('mahasiswa_id',$id)->first();
        if($bebaslab){
            return view('dosen.persetujuanpa.bebaslab',compact('bebaslab'));   
        }
        return view('dosen.persetujuanpa.tidakada');
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
            case 'biodata':
                Biodataalumni::where('mahasiswa_id',$id)->update([
                    'acc_pembimbing' => 1,
                ]);
                return redirect()->back()->with('message','Biodata Berhasil Disetujui!');
                break;
            case 'bebaslab':
                Bebaslab::where('mahasiswa_id',$id)->update([
                    'pembimbing_akademik' => 1,
                    'tgl_pembimbing_akademik' => date('Y-m-d'),
                ]);
                return redirect()->back()->with('message','Bebas LAB Berhasil Disetujui!');
                break;
        }
    }

}
