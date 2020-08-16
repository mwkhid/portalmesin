<?php

namespace App\Http\Controllers;

use App\Models\Seminarkp;
use App\Models\Dokumenkp;
use App\Models\Accpembimbingkp;
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
        $data = Seminarkp::setuju($nim)->join('kp_dokumen','kp.id','=','kp_dokumen.kp_id')->first();
        // dd($data);
        if($data != null){
            $accLaporankp = Accpembimbingkp::where('mahasiswa_id','=',$data->mahasiswa_id)->first();
            return view('laporankp.index',compact('data','accLaporankp'));
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
        
        switch ($request->input('action')) {
            case 'presensi':
                $data = $this->validate($request, [
                    'file_presensi' => 'required|file|mimes:pdf|max:2048',
                ]);
                
                // menyimpan data file yang diupload ke variabel $presensi dan $laporan
                $presensi = $request->file('file_presensi');
        
                $nama_presensi = $request->nim."_PresensiKP".".".$presensi->getClientOriginalExtension();
         
                  // isi dengan nama folder tempat kemana file diupload
                $presensi_upload = 'file_presensi';
                $presensi->move($presensi_upload,$nama_presensi);
        
                Dokumenkp::where('kp_id', $id)->update([
                    'file_presensi' => $nama_presensi,
                ]);
         
                return redirect(route('kp.laporan.index'))->with('message','File Presensi Seminar KP Berhasil diupload!');
                break;
    
            case 'laporan':
                $data = $this->validate($request, [
                    'file_laporan' => 'required|file|mimes:pdf|max:2048',
                ]);

                // menyimpan data file yang diupload ke variabel $laporan
                $laporan = $request->file('file_laporan');

                $nama_laporan = $request->nim."_Berkas_LaporanKP".".".$laporan->getClientOriginalExtension();
        
                // isi dengan nama folder tempat kemana file diupload
                $laporan_upload = 'file_laporan';
                $laporan->move($laporan_upload,$nama_laporan);

                Dokumenkp::where('kp_id', $id)->update([
                    'file_laporan' => $nama_laporan
                ]);
        
                return redirect(route('kp.laporan.index'))->with('message','File Laporan Berhasil diupload!');
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
}
