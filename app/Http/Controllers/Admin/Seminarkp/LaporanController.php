<?php

namespace App\Http\Controllers\Admin\Seminarkp;

use App\Models\Seminarkp;
use App\Models\Kp;
use App\Models\Nilaikp;
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
            ->join('dokumen_kp','dokumen_kp.kp_id','=','kp.id')
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
        ->join('kp','kp.id','=','seminar_kp.kp_id')
        ->join('mahasiswa','kp.mahasiswa_id','=','mahasiswa.id')
        ->join('ref_ruang','ref_ruang.id','=','seminar_kp.ruang_id')
        ->select('*','seminar_kp.id')
        ->where('seminar_kp.id',$id)
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
            'huruf' => 'required',
            'angka' => 'required',
        ]);
        // dd($validatedData);
        Nilaikp::updateOrCreate([
            'kp_id' => $id],[
            'huruf' => strtoupper($request->huruf),
            'angka' => $request->angka,
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
            ->join('dokumen_kp','dokumen_kp.kp_id','=','kp.id')
            ->firstOrFail();
        // dd($kp);
        if($kp->file_nilai != null){
            return redirect(asset('file_nilaikp/'.$kp->file_nilai));
        }
        return view('errors.laporan');
    }
}
