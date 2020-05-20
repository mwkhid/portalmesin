<?php

namespace App\Http\Controllers;

use App\Models\Ta;
use App\Models\Ruang;
use App\Models\Seminarta;
use App\Models\Pembimbing;
use App\Models\Penguji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class SemhasController extends Controller
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
        $data = Ta::setujuta($nim)->first();
        $ruang = Ruang::all();
        $pending = Seminarta::pending($nim)->first();
        $setuju = Seminarta::setuju($nim)->first();
        $tolak = Seminarta::tolak($nim)->first();
        // dd($pending);
        if($setuju != null){
            $pembimbing = Pembimbing::pembimbing($setuju->ta_id);
            $penguji = Penguji::pengujisemhas($setuju->ta_id);
            return view('ta.seminar.setuju',compact('setuju','pembimbing','penguji'));
        }elseif($pending != null){
            $pembimbing = Pembimbing::pembimbing($pending->ta_id);
            return view('ta.seminar.pending',compact('pending','pembimbing'));
        }elseif($tolak != null){
            $pembimbing = Pembimbing::pembimbing($tolak->ta_id);
            return view('ta.seminar.tolak',compact('tolak','pembimbing','ruang'));
        }elseif($data != null){
            $pembimbing = Pembimbing::pembimbing($data->id);
            // dd($data);
            return view('ta.seminar.pengajuan',compact('data','ruang','pembimbing'));
        }else{
            return view('ta.error.seminar');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'ta_id' => 'required|unique:ta_seminar',
            // 'tanggal' => 'required',
            // 'tempat' => 'required',
            // 'jam_mulai' => 'required',
            // 'jam_selesai' => 'required|after:jam_mulai',
            'status_seminar' => 'required',
            'cetak_semhas' => 'required',
        ]);
        // dd($validateData);
        $semta = Seminarta::create($validateData);

        for ($i = 1; $i <= 2; $i++) {
            $idpem = 'idpem'.$i;
            Pembimbing::where('id',$request->$idpem)->update([
                'status_semhas' => 'PENDING',
            ]);
        }
        for ($i = 1; $i <= 2; $i++){
            Penguji::create([
                'ta_id' => $request->ta_id,
            ]);
        }
        return redirect(route('ta.semhas.index'))->with('message','Pendaftaran Seminar Hasil Berhasil dilakukan!');
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
        $tolak = Seminarta::find($id)
            ->select('*','ta_seminar.id')
            ->join('ta','ta.id','=','ta_seminar.ta_id')
            ->join('ref_mahasiswa','ta.mahasiswa_id','=','ref_mahasiswa.id')
            ->join('ref_ruang','ref_ruang.id','=','ta_seminar.tempat')
            ->where('nim',Auth::user()->nim)
            ->where('status_seminar','PENDING')
            ->firstOrFail();
        $pembimbing = Pembimbing::pembimbing($tolak->ta_id);
        $ruang = Ruang::all();
        // dd($tolak);
        return view('ta.seminar.edit',compact('tolak','ruang','pembimbing'));
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
        $validateData = $request->validate([
            'status_seminar' => 'required',
        ]);

        Seminarta::where('id',$request->id_seminar)->update($validateData);
        for ($i = 1; $i <= 2; $i++) {
            $idpem = 'idpem'.$i;
            Pembimbing::where('id',$request->$idpem)->update([
                'status_semhas' => 'PENDING',
            ]);
        }

        return redirect(route('ta.semhas.index'))->with('message','Data Seminar Hasil Berhasil di Update!');
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
