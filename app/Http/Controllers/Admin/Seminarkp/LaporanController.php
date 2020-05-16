<?php

namespace App\Http\Controllers\Admin\Seminarkp;

use App\Models\Seminarkp;
use App\Models\Kp;
use App\Models\Nilaikp;
use App\Models\Nilai;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanController extends Controller
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
        $data = Seminarkp::semkpsetuju();

        return view('admin.semkp.laporan.index',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kp = Kp::where('kp.id', $id)
            ->join('kp_dokumen','kp_dokumen.kp_id','=','kp.id')
            ->firstOrFail();
        // dd($kp);
        if($kp->file_laporan != null){
            return redirect(asset('file_laporan/'.$kp->file_laporan));
        }
        return view('errors.laporan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Seminarkp::find($id)
        ->join('kp','kp.id','=','kp_seminar.kp_id')
        ->join('ref_mahasiswa','kp.mahasiswa_id','=','ref_mahasiswa.id')
        ->join('ref_ruang','ref_ruang.id','=','kp_seminar.ruang_id')
        ->select('*','kp_seminar.id')
        ->where('kp_seminar.id',$id)
        ->firstOrFail();
        // dd($data);

        return view('admin.semkp.laporan.edit',compact('data'));
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
            // 'kp_id' => 'required',
            'nilai_perusahaan' => 'required',
            'nilai_pembimbing' => 'required',
        ]);
        // $nilai = Nilai::all();
        $nilaiperusahaan = $request->nilai_perusahaan * 0.6;
        $nilaipembimbing = $request->nilai_pembimbing * 0.4;
        $nilaiangka = $nilaiperusahaan + $nilaipembimbing;
        // if($nilaiangka >= $nilai['batas_bawah']){
        //     $nilaihuruf = $nilai['nilai_huruf'];
        // }
        if($nilaiangka >= 85){
            $nilaihuruf = 'A';
        }elseif($nilaiangka >= 80){
            $nilaihuruf = 'A-';
        }elseif ($nilaiangka >= 75){
            $nilaihuruf = 'B+';
        }elseif($nilaiangka >= 70){
            $nilaihuruf = 'B';
        }elseif($nilaiangka >= 65){
            $nilaihuruf = 'C+';
        }elseif($nilaiangka >= 60){
            $nilaihuruf = 'C';
        }elseif($nilaiangka >= 55){
            $nilaihuruf = 'D';
        }elseif($nilaiangka < 55){
            $nilaihuruf = 'E';
        }
        
        // dd($nilaihuruf);
        Nilaikp::updateOrCreate([
            'kp_id' => $id],[
            'huruf' => $nilaihuruf,
            'angka' => $nilaiangka,
            'angka_pembimbing' => $nilaipembimbing,
            'angka_perusahaan' => $nilaiperusahaan,
        ]);

        return redirect(route('admin.nilaikp.index'))->with('message','Nilai Mahasiswa Berhasil di Inputkan');
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

    public function nilai($id)
    {
        $kp = Kp::where('kp.id', $id)
            ->join('kp_dokumen','kp_dokumen.kp_id','=','kp.id')
            ->firstOrFail();
        // dd($kp);
        if($kp->file_nilai != null){
            return redirect(asset('file_nilaikp/'.$kp->file_nilai));
        }
        return view('errors.laporan');
    }
}
