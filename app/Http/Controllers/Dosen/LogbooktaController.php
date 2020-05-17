<?php

namespace App\Http\Controllers\Dosen;

use App\Models\Dosen;
use App\Models\Logbookta;
use App\Models\Mahasiswa;
use App\Models\Ta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class LogbooktaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Dosen::bimbinganlogbookta(Auth::user()->nim);
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
                ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta_logbook.mahasiswa_id')->get();
        // dd($data);
        $config = [
            'format' => 'A4-P', // Portrait
             'margin_left'          => 30,
             'margin_right'         => 25,
             'margin_top'           => 30,
             'margin_footer'         => 5,
            // 'margin_bottom'        => 25,
          ];
        $pdf = PDF::loadview('dosen.logbookta.cetak_logbook',compact('data'),[],$config);
        return $pdf->stream();
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
        $request->validate([
            'komentar' => 'required',
        ]);

        if($request->pem == 1){
            Logbookta::where('id',$id)->update([
                'komentar1' => $request->komentar
            ]);
            return redirect(route('dosen.logbookta.index'))->with('message','Komentar Berhasil di Rekam!');
        }
        else {
            Logbookta::where('id',$id)->update([
                'komentar2' => $request->komentar
            ]);
            return redirect(route('dosen.logbookta.index'))->with('message','Komentar Berhasil di Rekam!');
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
