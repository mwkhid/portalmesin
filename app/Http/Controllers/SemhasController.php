<?php

namespace App\Http\Controllers;

use App\Models\Ta;
use App\Models\Ruang;
use App\Models\Seminarta;
use App\Models\Pembimbing;
use App\Models\Penguji;
use App\Models\Nilaisemhaspembimbing;
use App\Models\Nilaisemhaspenguji;
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
            $pem1 = Pembimbing::pembimbing($setuju->ta_id)->first();
            $pem2 = Pembimbing::pembimbing($setuju->ta_id)->last();
            $uji1 = Penguji::pengujisemhas($setuju->ta_id)->first();
            $uji2 = Penguji::pengujisemhas($setuju->ta_id)->last();
            $pembimbing1 = Nilaisemhaspembimbing::where('ta_pembimbing_id', $pem1->id)->first();
            $pembimbing2 = Nilaisemhaspembimbing::where('ta_pembimbing_id',$pem2->id)->first();
            $penguji1 = Nilaisemhaspenguji::where('ta_penguji_id',$uji1->id)->first();
            $penguji2 = Nilaisemhaspenguji::where('ta_penguji_id',$uji2->id)->first();
            // $rata2 = (($pembimbing1->total ?? '0') + ($pembimbing2->total ?? '0') + ($penguji1->total ?? '0') + ($penguji2->total ?? '0')) / 4;
            return view('ta.seminar.setuju',compact('setuju','pembimbing','penguji','pembimbing1','pembimbing2','penguji1','penguji2'));
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
            'draft_semhas' => 'required',
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
            ->where('nim',Auth::user()->nim)
            ->where('status_seminar','PENDING')
            ->firstOrFail();
        $pembimbing = Pembimbing::pembimbing($tolak->ta_id);
        // dd($tolak);
        return view('ta.seminar.edit',compact('tolak','pembimbing'));
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
            'draft_semhas' => 'required',
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
