<?php

namespace App\Http\Controllers\Admin\Ta;

use App\Models\Ta;
use App\Models\Jabatan;
use App\Models\Pembimbing;
use App\Models\Dosen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class SurattugasController extends Controller
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
        $data = Ta::surattugas();
        return view('admin.ta.surattugas.list_surattugas',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $cetak_ta = $this->cetak_ta($id);
        $data = Ta::get_ta($id)->first();
        $matkul = Ta::matkul($id);
        $pembimbing = Pembimbing::pembimbing($id);
        //dd($pembimbing);
        $config = [
            'format' => 'A4-P', // Portrait
             'margin_left'          => 30,
             'margin_right'         => 25,
             'margin_top'           => 42,
             'margin_header'         => 5,
             'margin_footer'         => 5,
            // 'margin_bottom'        => 25,
        ];
        $kaprodi = Jabatan::kaprodi();

        $monthList = array(
            'Jan' => 'Januari',
            'Feb' => 'Februari',
            'Mar' => 'Maret',
            'Apr' => 'April',
            'May' => 'Mei',
            'Jun' => 'Juni',
            'Jul' => 'Juli',
            'Aug' => 'Agustus',
            'Sep' => 'September',
            'Oct' => 'Oktober',
            'Nov' => 'November',
            'Dec' => 'Desember',
        );

        $pdf = PDF::loadview('admin.ta.surattugas.cetak_surattugas',compact('data','matkul','pembimbing','monthList','kaprodi'),[],$config);
        return $pdf->stream();
    }

    public function cetak_ta($id){
        Ta::where('id',$id)->update([
            'cetak_ta' => 1,
        ]);
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
        $dosen = Dosen::all();
        if($data->peminatan_id == 1){
            $kbk = Jabatan::sel();
        }elseif($data->peminatan_id == 2){
            $kbk = Jabatan::meka();
        }else{
            $kbk = Jabatan::ict();
        }
        // dd($data);
        return view('admin.ta.surattugas.edit',compact('data','pembimbing','matkul','kbk','dosen'));
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
            'pembimbing1' => 'required|different:pembimbing2',
            'pembimbing2' => 'required|different:pembimbing1',
        ]);

        // dd($validatedData);

        for ($i = 1; $i <= 2; $i++) {
            $idpem = 'idpem'.$i;
            $pembimbing = 'pembimbing' . $i;
            Pembimbing::where('id',$request->$idpem)->update([
                'pembimbing' => $request->$pembimbing,
                'pem' => $i,
                'status_pem' => 'SETUJU',
            ]);
        }

        return redirect(route('admin.surattugas.index'))->with('message','Update Pembimbing Berhasil dilakukan!');
        
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
