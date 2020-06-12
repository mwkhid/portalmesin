<?php

namespace App\Http\Controllers\Admin\Ta;

use App\Models\Ta;
use App\Models\Jabatan;
use App\Models\Pembimbing;
use App\Models\Koordinatorkbk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendaftaranController extends Controller
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
        $data = Ta::pendaftaran();
        return view('admin.ta.pendaftaran.list_pendaftaran',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Ta::get_ta($id)->join('koordinator_kbk','koordinator_kbk.ta_id','=','ta.id')->first();
        $matkul = Ta::matkul($id);
        $pembimbing = Pembimbing::pembimbing($id);
        if($data->peminatan_id == 1){
            $kbk = Jabatan::sel();
        }elseif($data->peminatan_id == 2){
            $kbk = Jabatan::meka();
        }else{
            $kbk = Jabatan::ict();
        }
        // dd($data);
        return view('admin.ta.pendaftaran.edit_pendaftaran',compact('data','pembimbing','matkul','kbk'));
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
            'idpem1' => 'required',
            'idpem2' => 'required',
        ]);

        switch ($request->input('action')) {
            case 'setuju':
                $ta = Ta::where('id',$id)->update([
                    'tgl_setuju' => date('Y-m-d H:i:s'),
                    'status_ta' => 'SETUJU',
                    'proses_ta' => 2,
                ]);
                if($ta){

                    Koordinatorkbk::where('ta_id',$id)->update([
                        'koordinator' => $request->koordinator,
                        'peminatan' => $request->peminatan,
                        'status_kbk' => 'SETUJU',
                    ]);

                    for ($i = 1; $i <= 2; $i++) {
                        $idpem = 'idpem'.$i;
                        Pembimbing::where('id',$request->$idpem)->update([
                            'status_pem' => 'SETUJU',
                        ]);
                    }
                    // alihkan halaman ke halaman index
                    return redirect(route('admin.pendaftaran.index'))->with('message','Pendaftaran Tugas Akhir Berhasil Di Update!');
                    break;
                }
                break;
    
            case 'tolak':
                $ta = Ta::where('id',$id)->update([
                    'status_ta' => 'TOLAK',
                    'proses_ta' => 0,
                ]);
                if($ta){

                    for ($i = 1; $i <= 2; $i++) {
                        $idpem = 'idpem'.$i;
                        Pembimbing::where('id',$request->$idpem)->update([
                            'status_pem' => 'TOLAK',
                        ]);
                    }
                    // alihkan halaman ke halaman index
                    return redirect(route('admin.pendaftaran.index'))->with('message','Pendaftaran Tugas Akhir Berhasil Di Update!');
                    break;
                }
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
