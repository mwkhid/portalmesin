<?php

namespace App\Http\Controllers\Admin\Opta;

use App\Models\Ta;
use App\Models\Pembimbing;
use App\Models\Penguji;
use App\Models\Pendadaran;
use App\Models\Jabatan;
use App\Models\Ruang;
use App\Models\Dosen;
use App\Models\Nilaipendadaranpembimbing;
use App\Models\Nilaipendadaranpenguji;
use App\Models\Nilaibimbingan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class PendadaranController extends Controller
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
        $data = Pendadaran::listpendadaransetuju();

        return view('admin.opta.pendadaran.index',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $cetak_pendadaran = $this->cetak_pendadaran($id);
        $data = Ta::get_ta($id)->first();
        $matkul = Ta::matkul($id);
        $pembimbing = Pembimbing::pembimbing($id);
        $pembimbing1 = Pembimbing::pembimbing($id)->first();
        $pembimbing2 = Pembimbing::pembimbing($id)->last();
        $penguji = Penguji::pengujisemhas($data->id);
        $penguji1 = Penguji::pengujisemhas($data->id)->first();
        $penguji2 = Penguji::pengujisemhas($data->id)->last();
        $pendadaran = Pendadaran::get_pendadaran($id)->first();
        // dd($pendadaran);
        $config = [
            'format' => 'A4-P', // Portrait
             'margin_left'          => 30,
             'margin_right'         => 25,
             'margin_top'           => 42,
             'margin_header'         => 5,
             'margin_footer'         => 5,
            // 'margin_bottom'        => 25,
        ];
        $jabatan = Jabatan::ta();
        $dayList = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
        );
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

        $pdf = PDF::loadview('admin.opta.pendadaran.cetak_pendadaran',compact('data','matkul',
        'pembimbing','dayList','monthList','pendadaran','jabatan','penguji','penguji1','penguji2','pembimbing1','pembimbing2'),[],$config);
        return $pdf->stream();
    }

    public function cetak_pendadaran($id){
        Pendadaran::where('ta_id',$id)->update([
            'cetak_pendadaran' => 1,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showRekappendadaran($id)
    {
        $data = Ta::get_ta($id)->first();
        $pembimbing = Pembimbing::pembimbing($id);
        $pembimbing1 = Pembimbing::pembimbing($id)->first();
        $pembimbing2 = Pembimbing::pembimbing($id)->last();
        $penguji = Penguji::pengujipendadaran($data->id);
        $penguji1 = Penguji::pengujipendadaran($data->id)->first();
        $penguji2 = Penguji::pengujipendadaran($data->id)->last();
        $pendadaran = Pendadaran::get_pendadaran($id)->first();
        $nilai1 = Nilaipendadaranpembimbing::where('ta_pembimbing_id',$pembimbing1->id)->first();
        $nilai2 = Nilaipendadaranpembimbing::where('ta_pembimbing_id',$pembimbing2->id)->first();
        $nilai3 = Nilaipendadaranpenguji::where('ta_penguji_id',$penguji1->id)->first();
        $nilai4 = Nilaipendadaranpenguji::where('ta_penguji_id',$penguji2->id)->first();
        $nb1 = Nilaibimbingan::where('ta_pembimbing_id',$pembimbing1->id)->first();
        $nb2 = Nilaibimbingan::where('ta_pembimbing_id',$pembimbing2->id)->first();
        $rata2 = ($nilai1->total + $nilai2->total + $nilai3->total + $nilai4->total) / 4;
        $nbrata2 = ($nb1->total_skripsi + $nb2->total_skripsi) / 2;
        $nilaiakhir = ($nbrata2 * 0.6) + ($rata2 * 0.4);
        // dd($pembimbing1);
        $config = [
            'format' => 'A4-P', // Portrait
             'margin_left'          => 30,
             'margin_right'         => 25,
             'margin_top'           => 42,
             'margin_header'         => 5,
             'margin_footer'         => 5,
            // 'margin_bottom'        => 25,
        ];
        $dayList = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
        );
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

        $pdf = PDF::loadview('admin.pendadaran.rekap.show',compact('data','nilai1','nilai2','nilai3',
        'nilai4','rata2','nb1','nb2','rata2','nbrata2','nilaiakhir',
        'pembimbing','dayList','monthList','pendadaran','penguji','penguji1','penguji2','pembimbing1','pembimbing2'),[],$config);
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
        $data = Pendadaran::find($id)->join('ta','ta.id','=','pendadaran.ta_id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->join('ref_ruang','ref_ruang.id','=','pendadaran.tempat')
        ->select('*','pendadaran.id')
        ->where('pendadaran.id',$id)
        ->firstOrFail();
        $penguji = Penguji::pengujipendadaran($data->ta_id);
        $pembimbing = Pembimbing::pembimbing($data->ta_id);
        $ruang = Ruang::all();
        $dosen = Dosen::all();
        // dd($last);
        return view('admin.opta.pendadaran.edit',compact('data','penguji','ruang','dosen','pembimbing'));
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
            'tanggal' => 'required',
            'tempat' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'penguji1' => 'required',
            'penguji2' => 'required',
        ]);
        // dd($validatedData);
        if($validatedData){
            Pendadaran::where('id',$id)->update([
                'tanggal' => $request->tanggal,
                'tempat' => $request->tempat,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
            ]);

            for ($i = 1; $i <= 2; $i++) {
                $penguji = 'penguji' . $i;
                $idpenguji = 'idpenguji' .$i;
                Penguji::where('id',$request->$idpenguji)->update([
                    'penguji_pendadaran' => $request->$penguji,
                ]);
            }
            return redirect(route('opta.pendadaran.index'))->with('message','Pendadaran Berhasil di Update!');

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
