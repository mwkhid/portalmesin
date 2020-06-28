<?php

namespace App\Http\Controllers;

use App\Models\Logbookta;
use App\Models\Mahasiswa;
use App\Models\Ta;
use App\Models\Pembimbing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\LogbookMail;
use Mail;
use PDF;

class LogbooktaController extends Controller
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
        $ta = Ta::setuju($nim)->first();
        if($ta != null){
            $data = Logbookta::logbookmhs($nim);
            return view('ta.logbook.index',compact('data','ta'));
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
        $data = Mahasiswa::where('nim',Auth::user()->nim)->first();
        // dd($data);
        return view('ta.logbook.create',compact('data'));
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
            'mahasiswa_id' => 'required',
            'kegiatan' => 'required',
            'bab' => 'required',
            'kendala' => 'required',
            'rencana' => 'required',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($request->mahasiswa_id);
        $ta = Ta::where('mahasiswa_id',$mahasiswa->id)
        ->join('ta_pembimbing','ta.id','=','ta_pembimbing.ta_id')
        ->join('ref_dosen','ta_pembimbing.pembimbing','=','ref_dosen.id')
        ->join('users','users.nim','=','ref_dosen.nip')->get()->pluck('email')->toArray();
        // dd($ta);
        Logbookta::create($validatedData);
        // $myEmail = ['ggfrozz@gmail.com','ydhprp@gmail.com'];
   
        $details = [
            'title' => 'Mail Test Portal KPTA',
            'url' => 'https://si.ft.uns.ac.id/portalelektro',
            'kegiatan' => $request->kegiatan,
            'bab' => $request->bab,
            'kendala' => $request->kendala,
            'rencana' => $request->rencana,
            'nama' =>$request->nama,
        ];
  
        Mail::to($ta)->send(new LogbookMail($details));
   
        // dd("Mail Send Successfully");
        return redirect(route('ta.logbook.index'))->with('Log Book Berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Logbookta::where('mahasiswa_id',$id)
                ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta_logbook.mahasiswa_id')
                ->where('status_logbook1', 1)->get();
        $nim = $data->first();
        if ($nim == null) {
            return view('errors.logbookta');
        }else {
            $ta = Ta::setuju($nim->nim)->first();
            $pembimbing = Pembimbing::pembimbing($ta->id);
            $pembimbing1 = Pembimbing::pembimbing($ta->id)->first();
            $pembimbing2 = Pembimbing::pembimbing($ta->id)->last();
            // dd($pembimbing2);
            $config = [
                'format' => 'A4-L', // Portrait
                 'margin_left'          => 20,
                 'margin_right'         => 10,
                 'margin_top'           => 20,
                 'margin_footer'         => 5,
                // 'margin_bottom'        => 25,
              ];
            $pdf = PDF::loadview('ta.logbook.cetak_logbookta',compact('data','ta','pembimbing','pembimbing1','pembimbing2'),[],$config);
            return $pdf->stream();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Logbookta::find($id);
        if ($data->status_logbook1 == 0) {
            return view('ta.logbook.edit',compact('data'));
        }else{
            return redirect(route('ta.logbook.index'));
        }
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
            'kegiatan' => 'required',
            'bab' => 'required',
            'kendala' => 'required',
            'rencana' => 'required',
        ]);

        Logbookta::where('id',$id)->update($validatedData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = Logbookta::findOrFail($request->log_id);
        if ($data->status_logbook1 == 0) {
            $data->delete();
            return redirect(route('ta.logbook.index'))->with('message','Log Book Berhasil di Hapus!');
        }else{
            return redirect(route('ta.logbook.index'));
        }
    }
}
