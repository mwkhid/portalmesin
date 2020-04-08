<?php

namespace App\Http\Controllers\Admin\Meka;

use App\Models\Ta;
use App\Models\Jabatan;
use App\Models\Pembimbing;
use App\Models\Koordinatorkbk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MekaController extends Controller
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
        $data = Ta::tameka();
        // dd($data);
        return view('admin.meka.index',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        // dd($kbk);
        return view('admin.meka.view',compact('data','pembimbing','matkul','kbk'));
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
        // dd($kbk);
        return view('admin.meka.edit',compact('data','pembimbing','matkul','kbk'));
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
            'koordinator' => 'required',
            'peminatan' => 'required',
        ]);
        
        // dd($validatedData);
        switch ($request->input('action')) {
            case 'setuju':
                $ta = Koordinatorkbk::where('ta_id',$id)->update([
                    'koordinator' => $request->koordinator,
                    'peminatan' => $request->peminatan,
                    'status_kbk' => 'SETUJU',
                ]);

                return redirect(route('admin.meka.index'))->with('message','Pendaftaran Tugas Akhir MEKA Berhasil Di Update!');
                break;
    
            case 'tolak':
                $ta = Koordinatorkbk::where('ta_id',$id)->update([
                    'status_kbk' => 'TOLAK',
                ]);

                return redirect(route('admin.meka.index'))->with('message','Pendaftaran Tugas Akhir MEKA Berhasil Di Update!');
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
