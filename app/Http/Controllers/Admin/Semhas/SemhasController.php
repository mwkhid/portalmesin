<?php

namespace App\Http\Controllers\Admin\Semhas;

use App\Models\Seminarta;
use App\Models\Ruang;
use App\Models\Ta;
use App\Models\Penguji;
use App\Models\Dosen;
use App\Models\Pembimbing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SemhasController extends Controller
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
        $data = Seminarta::listsemhas();
        // dd($data);
        return view('admin.semhas.list_semhas',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Seminarta::find($id)
            ->join('ta','seminar_ta.ta_id','=','ta.id')
            ->join('mahasiswa','ta.mahasiswa_id','=','mahasiswa.id')
            // ->join('ref_ruang','ref_ruang.id','=','seminar_ta.tempat')
            ->select('*','seminar_ta.id')
            ->where('seminar_ta.id',$id)
            ->first();
        $pembimbing = Pembimbing::pembimbing($data->ta_id);
        $penguji= Penguji::penguji($data->ta_id);
        $ruang = Ruang::all();
        $dosen = Dosen::all();
        // dd($pembimbing);
        return view('admin.semhas.edit_semhas',compact('data','ruang','pembimbing','dosen','penguji'));
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
                    'tanggal' => 'required',
                    'jam_mulai' => 'required',
                    'jam_selesai' => 'required|after:jam_mulai',
                    'tempat' => 'required',
                    'pem_id1' => 'required',
                    'pem_id2' => 'required',
                    'penguji1' => 'required|different:penguji2,idpem1,idpem2',
                    'penguji2' => 'required|different:penguji1,idpem1,idpem2',
                    'ta_id' => 'required',
                ]);

                Seminarta::where('id',$id)->update([
                    'tanggal' => $request->tanggal,
                    'jam_mulai' => $request->jam_mulai,
                    'jam_selesai' => $request->jam_selesai,
                    'tempat' => $request->tempat,
                    'status_seminar' => 'SETUJU',
                ]);

                for ($i = 1; $i <= 2; $i++) {
                    $id_penguji = 'id_penguji' . $i;
                    $penguji = 'penguji' . $i;
                    Penguji::where('id',$request->$id_penguji)->update([
                        'ta_id' => $request->ta_id,
                        'penguji_semhas' => $request->$penguji,
                    ]);
                }
                for ($i = 1; $i <= 2; $i++) {
                    $pem = 'pem_id' . $i;
                    Pembimbing::where('id',$request->$pem)->update([
                        'status_semhas' => 'SETUJU',
                    ]);
                }
                return redirect(route('admin.semhas.index'))->with('message','Seminar Hasil Berhasil di Update!');
                break;
    
            case 'tolak':
                Seminarta::where('id',$id)->update([
                    'status_seminar' => 'TOLAK',
                ]);
                return redirect(route('admin.semhas.index'))->with('message','Seminar Hasil Berhasil di Update!');
                break;
        }
        // dd($validatedData);
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