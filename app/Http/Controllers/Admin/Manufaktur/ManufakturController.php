<?php

namespace App\Http\Controllers\Admin\Manufaktur;

use App\Models\Ta;
use App\Models\Jabatan;
use App\Models\Pembimbing;
use App\Models\Koordinatorkbk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManufakturController extends Controller
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
        $data = Ta::tamanufaktur();
        // dd($data);
        return view('admin.manufaktur.index',compact('data'));
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
            $kbk = Jabatan::konversi();
        }elseif($data->peminatan_id == 2){
            $kbk = Jabatan::konstruksi();
        }elseif($data->peminatan_id == 3){
            $kbk = Jabatan::manufaktur();
        }else{
            $kbk = Jabatan::material();
        }
        // dd($kbk);
        return view('admin.manufaktur.view',compact('data','pembimbing','matkul','kbk'));
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
            $kbk = Jabatan::konversi();
        }elseif($data->peminatan_id == 2){
            $kbk = Jabatan::konstruksi();
        }elseif($data->peminatan_id == 3){
            $kbk = Jabatan::manufaktur();
        }else{
            $kbk = Jabatan::material();
        }
        // dd($kbk);
        return view('admin.manufaktur.edit',compact('data','pembimbing','matkul','kbk'));
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

                return redirect(route('admin.manufaktur.index'))->with('message','Pendaftaran Tugas Akhir MAN Berhasil Di Update!');
                break;
    
            case 'tolak':
                $ta = Koordinatorkbk::where('ta_id',$id)->update([
                    'status_kbk' => 'TOLAK',
                ]);

                return redirect(route('admin.manufaktur.index'))->with('message','Pendaftaran Tugas Akhir MAN Berhasil Di Update!');
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
