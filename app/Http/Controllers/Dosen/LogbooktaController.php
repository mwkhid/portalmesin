<?php

namespace App\Http\Controllers\Dosen;

use App\Models\Dosen;
use App\Models\Logbookta;
use App\Models\Mahasiswa;
use App\Models\Ta;
use App\Models\Pembimbing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $data = Dosen::bimbinganta(Auth::user()->nim)->where('status_ta','SETUJU');
        // dd($data);
        return view('dosen.logbookta.index', compact('data'));
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
                ->where('status_logbook1',1)
                ->orderBy('ta_logbook.created_at','asc')->get();
        $nim = $data->first();
        if ($nim == null) {
            return view('errors.logbookta');
        }else {
            $ta = Ta::setuju($nim->nim)->first();
            $pembimbing = Pembimbing::pembimbing($ta->id);
            $pembimbing1 = Pembimbing::pembimbing($ta->id)->first();
            $pembimbing2 = Pembimbing::pembimbing($ta->id)->last();
            // dd($data);
            $config = [
                'format' => 'A4-L', // Landscape
                 'margin_left'          => 20,
                 'margin_right'         => 10,
                 'margin_top'           => 20,
                 'margin_footer'         => 5,
                // 'margin_bottom'        => 25,
              ];
            $pdf = PDF::loadview('dosen.logbookta.cetak_logbook',compact('data','ta','pembimbing','pembimbing1','pembimbing2'),[],$config);
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
        $data = Logbookta::findOrFail($id);
        $mahasiswa = Mahasiswa::findOrFail($data->mahasiswa_id);
        $ta = Ta::where('mahasiswa_id',$mahasiswa->id)
        ->join('ta_pembimbing','ta.id','=','ta_pembimbing.ta_id')
        ->join('ref_dosen','ta_pembimbing.pembimbing','=','ref_dosen.id')
        ->where('nip',Auth::user()->nim)->get()->last();
        // dd($ta);
        return view('dosen.logbookta.edit',compact('data','mahasiswa','ta'));
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
            case 'setuju':
                $request->validate([
                    'komentar' => 'required',
                ]);
                Logbookta::where('id',$id)->update([
                    'komentar1' => $request->komentar,
                    'status_logbook1' => 1,
                ]);
                return redirect()->back()->with('message','Komentar Berhasil di Rekam!');
                break;
            
            case 'tolak':
                Logbookta::where('id',$id)->update([
                    // 'komentar1' => $request->komentar,
                    'status_logbook1' => 0,
                ]);
                return redirect()->back()->with('message','Log book ta ditolak!');
                break;
            
            case 'setuju2':
                $request->validate([
                    'komentar' => 'required',
                ]);
                Logbookta::where('id',$id)->update([
                    'komentar2' => $request->komentar,
                    'status_logbook2' => 1,
                ]);
                return redirect()->back()->with('message','Komentar Berhasil di Rekam!');
                break;
        }
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

    public function details($id)
    {
        $data = Logbookta::logbookmhsasc($id);
        $mahasiswa = Mahasiswa::where('nim',$id)->first();
        $ta = Ta::where('mahasiswa_id',$mahasiswa->id)
        ->join('ta_pembimbing','ta.id','=','ta_pembimbing.ta_id')
        ->join('ref_dosen','ta_pembimbing.pembimbing','=','ref_dosen.id')
        ->where('nip',Auth::user()->nim)->get()->last();
        // dd($data);
        return view('dosen.logbookta.details',compact('data','mahasiswa','ta'));
    }

    public function updateStatus(Request $request)
    {
        $logbook = Logbookta::findOrFail($request->klaim_id);
        $logbook->status_logbook1 = $request->status;
        $logbook->save();

        return response()->json(['message' => 'User status updated successfully.']);
    }

    public function updateStatus2(Request $request)
    {
        $logbook = Logbookta::findOrFail($request->log_id);
        $logbook->status_logbook2 = $request->status;
        $logbook->save();

        return response()->json(['message' => 'User status updated successfully.']);
    }
}
