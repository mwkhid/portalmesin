<?php

namespace App\Http\Controllers;

use App\Models\Seminarta;
use App\Models\Pendadaran;
use App\Models\Ruang;
use App\Models\Dosen;
use App\Models\Ta;
use App\Models\Pembimbing;
use App\Models\Penguji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class PendadaranController extends Controller
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
        $data = Seminarta::setuju($nim)->first();
        $setuju = Pendadaran::setuju($nim)->first();
        $pending = Pendadaran::pending($nim)->first();
        $tolak = Pendadaran::tolak($nim)->first();
        $ruang = Ruang::all();
        $dosen = Dosen::all();

        if($setuju != null){
            $pembimbing = Pembimbing::pembimbing($setuju->ta_id);
            $penguji = Penguji::pengujisemhas($setuju->ta_id);
            return view('ta.pendadaran.setuju',compact('setuju','penguji','pembimbing'));
        }elseif($pending != null){
            $pembimbing = Pembimbing::pembimbing($pending->ta_id);
            // dd($penguji);
            return view('ta.pendadaran.pending',compact('pending','pembimbing'));
        }elseif($tolak != null){
            $pembimbing = Pembimbing::pembimbing($tolak->ta_id);
            // dd($tolak);
            return view('ta.pendadaran.tolak',compact('tolak','pembimbing'));
        }elseif($data != null){
            $pembimbing = Pembimbing::pembimbing($data->ta_id);
            //dd($data);
            return view('ta.pendadaran.pengajuan',compact('data','pembimbing'));
        }else{
            return view('ta.error.pendadaran');
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
        $validatedPendadaran = $request->validate([
            'ta_id' => 'required|unique:pendadaran',
            'status_pendadaran' => 'required',
            'cetak_pendadaran' => 'required',
        ]);
        
        $pendadaran = Pendadaran::create($validatedPendadaran);
        
        for ($i = 1; $i <= 2; $i++) {
            $idpem = 'idpem'.$i;
            Pembimbing::where('id',$request->$idpem)->update([
                'status_pendadaranpem' => 'PENDING',
            ]);
        }
        return redirect(route('ta.pendadaran.index'))->with('message','Pendaftaran Pendadaran Berhasil di Ajukan!');
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tolak = Pendadaran::find($id)
                ->join('ta','ta.id','=','pendadaran.ta_id')
                ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
                // ->join('ref_ruang','pendadaran.tempat','=','ref_ruang.id')
                ->select('*','pendadaran.id')
                ->where('nim', Auth::user()->nim)
                ->where('status_pendadaran','PENDING')
                ->firstOrFail();
        $penguji = Pendadaran::penguji($tolak->id);
        $ruang = Ruang::all();
        $dosen = Dosen::all();
        
        return view('ta.pendadaran.edit',compact('tolak','ruang','dosen','penguji'));
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
        $validatedPendadaran = $request->validate([
            'status_pendadaran' => 'required',
        ]);
        
        $pendadaran = Pendadaran::where('id',$id)->update($validatedPendadaran);
        for ($i = 1; $i <= 2; $i++) {
            $idpem = 'idpem'.$i;
            Pembimbing::where('id',$request->$idpem)->update([
                'status_pendadaranpem' => 'PENDING',
            ]);
        }
        return redirect(route('ta.pendadaran.index'))->with('message','Pendaftaran Pendadaran Berhasil di Ajukan!');
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
