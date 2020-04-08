<?php

namespace App\Http\Controllers;

use App\Models\Seminarkp;
use App\Models\Dokumenkp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporankpController extends Controller
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
        $data = Seminarkp::setuju($nim)->join('dokumen_kp','kp.id','=','dokumen_kp.kp_id')->first();
        // dd($data);
        if($data != null){
            return view('laporankp.index',compact('data'));
        }
        return view('errors.semkp');
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
        $data = $this->validate($request, [
            'file_presensi' => 'required|file|mimes:pdf|max:2048',
            'file_laporan' => 'required|file|mimes:pdf|max:2048',
        ]);
        
        // dd($data);
		// menyimpan data file yang diupload ke variabel $presensi dan $laporan
		$presensi = $request->file('file_presensi');
		$laporan = $request->file('file_laporan');

        $nama_presensi = $request->nim."_Berkas_PresensiKP".".".$presensi->getClientOriginalExtension();
        $nama_laporan = $request->nim."_Berkas_LaporanKP".".".$laporan->getClientOriginalExtension();
 
      	// isi dengan nama folder tempat kemana file diupload
		$presensi_upload = 'file_presensi';
        $presensi->move($presensi_upload,$nama_presensi);
		$laporan_upload = 'file_laporan';
        $laporan->move($laporan_upload,$nama_laporan);

        Dokumenkp::where('kp_id', $id)->update([
            'file_presensi' => $nama_presensi,
            'file_laporan' => $nama_laporan,
        ]);
 
		return redirect(route('kp.laporan.index'))->with('message','File Selesai KP Berhasil diupload!');
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
