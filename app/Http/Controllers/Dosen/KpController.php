<?php

namespace App\Http\Controllers\Dosen;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Accpembimbingkp;
use App\Models\Kp;
use App\Models\Acckp;
use App\Models\Rencanakp;
use App\Models\Dokumenkp;
use App\Models\Nilaikp;
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
        $kp = Kp::where('mahasiswa_id',$id)->join('kp_dokumen','kp_dokumen.kp_id','=','kp.id')->get()->last();
        if($kp){
            $nilaikp = Nilaikp::where('kp_id',$kp->kp_id)->first();
        }else{
            $nilaikp = null;
        }
        // dd($kp);
        return view('dosen.kp.view',compact('data','accPembimbing','kp','nilaikp'));
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
        $validatedData = $request->validate([
            'penugasan' => 'required',
            'mhs_id' => 'required',
            'kp_id' => 'required',
        ]);
        $data = Accpembimbingkp::where('mahasiswa_id',$request->mhs_id)->first();
        $data->penugasan_kp = 1;
        $data->save();

        $kp = Kp::where('id',$request->kp_id)->first();
        $kp->penugasan_kp = $request->penugasan;
        $kp->tgl_penugasan_kp = date('Y-m-d');
        $kp->save();

        return redirect()->back();
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

    public function lihatproposal($id){
        $kp = Kp::where('kp.id', $id)
            ->join('kp_dokumen','kp_dokumen.kp_id','=','kp.id')
            ->firstOrFail();
        
        if($kp->file_proposal != null){
            return redirect(asset('file_proposal/'.$kp->file_proposal));
        }
        return view('errors.proposal');  
    }

    public function lihatnilai($id){
        $kp = Kp::where('kp.id', $id)
            ->join('kp_dokumen','kp_dokumen.kp_id','=','kp.id')
            ->firstOrFail();
        // dd($kp);
        if($kp->file_nilai != null){
            return redirect(asset('file_nilaikp/'.$kp->file_nilai));
        }
        return view('errors.penugasan');  
    }

    public function lihatlaporan($id){
        $kp = Kp::where('kp.id', $id)
            ->join('kp_dokumen','kp_dokumen.kp_id','=','kp.id')
            ->firstOrFail();
        // dd($kp);
        if($kp->file_laporan != null){
            return redirect(asset('file_laporan/'.$kp->file_laporan));
        }
        return view('errors.laporan');  
    }

    public function kpreset(Request $request){

        $kp =  Kp::where('id',$request->kp_id)->first();
        $kp->sks = null;
        $kp->ipk = null;
        $kp->tgl_ajuan = null;
        $kp->perusahaan_nama = null;
        $kp->perusahaan_almt = null;
        $kp->perusahaan_jenis = null;
        $kp->pic = null;
        $kp->status_kp = 'EDIT';
        $kp->save();

        $kpacc = Acckp::where('kp_id',$request->kp_id)->first();
        $kpacc->pengajuan = null;
        $kpacc->permohonan = null;
        $kpacc->save();

        $renkp = Rencanakp::where('kp_id',$request->kp_id)->first();
        $renkp->rencana_mulai_kp = null;
        $renkp->rencana_selesai_kp = null;
        $renkp->save();

        $dokkp = Dokumenkp::where('kp_id',$request->kp_id)->first();
        $dokkp->file_proposal = null;
        $dokkp->file_permohonan = null;
        $dokkp->save();

        $data = Accpembimbingkp::where('mahasiswa_id',$kp->mahasiswa_id)->first();
        $data->tempat_kp = $request->status;
        $data->proposal_kp = $request->status;
        $data->penugasan_kp = $request->status;
        $data->seminar_kp = $request->status;
        $data->laporan_kp = $request->status;
        $data->save();

        return response()->json(['message' => 'Kp Reset successfully.']);
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
        $validatedData = $request->validate([
            'KP1A' => 'required',
        ]);
        if($request->KP1A >= 85){
            $KP1H = 'A';
        }elseif($request->KP1A >= 80){
            $KP1H = 'A-';
        }elseif($request->KP1A >= 75){
            $KP1H = 'B+';
        }elseif($request->KP1A >= 70){
            $KP1H = 'B';
        }elseif($request->KP1A >= 65){
            $KP1H = 'C+';
        }elseif($request->KP1A >= 60){
            $KP1H = 'C';
        }elseif($request->KP1A >= 55){
            $KP1H = 'D';
        }elseif($request->KP1A < 55){
            $KP1H = 'E';
        }
        // dd($KP1H);
        Nilaikp::updateOrCreate([
            'kp_id' => $id],[
            'KP1A' => $request->KP1A,
            'KP1H' => $KP1H,
        ]);

        return redirect()->back()->with('message','Nilai Seminar KP Berhasil Di Submit.');
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
