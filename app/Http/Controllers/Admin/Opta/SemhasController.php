<?php

namespace App\Http\Controllers\Admin\Opta;

use App\Models\Seminarta;
use App\Models\Ta;
use App\Models\Jabatan;
use App\Models\Pembimbing;
use App\Models\Penguji;
use App\Models\Ruang;
use App\Models\Dosen;
use App\Models\Nilaisemhaspembimbing;
use App\Models\Nilaisemhaspenguji;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

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
        $data = Seminarta::listsemhassetuju();
        // dd($data);
        return view('admin.opta.semhas.index',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $cetak_semhas = $this->cetak_semhas($id);
        $data = Ta::get_ta($id)->first();
        $matkul = Ta::matkul($id);
        $pembimbing = Pembimbing::pembimbing($id);
        $pembimbing1 = Pembimbing::pembimbing($id)->first();
        $pembimbing2 = Pembimbing::pembimbing($id)->last();
        $penguji = Penguji::pengujisemhas($data->id);
        $penguji1 = Penguji::pengujisemhas($data->id)->first();
        $penguji2 = Penguji::pengujisemhas($data->id)->last();
        $semhas = Seminarta::get_semhas($id)->first();
        $jabatan = Jabatan::ta();
        $staff = Jabatan::staff();
        // dd($semhas);
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

        $pdf = PDF::loadview('admin.opta.semhas.cetak_semhas',compact('data','matkul','staff',
        'pembimbing','dayList','monthList','semhas','jabatan','penguji','penguji1','penguji2','pembimbing1','pembimbing2'),[],$config);
        return $pdf->stream();
    }

    public function cetak_semhas($id){
        Seminarta::where('ta_id',$id)->update([
            'cetak_semhas' => 1,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showRekapsemhas($id)
    {
        $data = Ta::get_ta($id)->first();
        $pembimbing = Pembimbing::pembimbing($id);
        $pembimbing1 = Pembimbing::pembimbing($id)->first();
        $pembimbing2 = Pembimbing::pembimbing($id)->last();
        $penguji = Penguji::pengujisemhas($data->id);
        $penguji1 = Penguji::pengujisemhas($data->id)->first();
        $penguji2 = Penguji::pengujisemhas($data->id)->last();
        $semhas = Seminarta::get_semhas($id)->first();
        $nilai1 = Nilaisemhaspembimbing::where('ta_pembimbing_id',$pembimbing1->id)->first();
        $nilai2 = Nilaisemhaspembimbing::where('ta_pembimbing_id',$pembimbing2->id)->first();
        $nilai3 = Nilaisemhaspenguji::where('ta_penguji_id',$penguji1->id)->first();
        $nilai4 = Nilaisemhaspenguji::where('ta_penguji_id',$penguji2->id)->first();
        $rata2 = ($nilai1->total + $nilai2->total + $nilai3->total + $nilai4->total) / 4;
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

        $pdf = PDF::loadview('admin.semhas.rekap.show',compact('data','nilai1','nilai2','nilai3','nilai4','rata2',
        'pembimbing','dayList','monthList','semhas','penguji','penguji1','penguji2','pembimbing1','pembimbing2'),[],$config);
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
        $data = Seminarta::find($id)
            ->join('ta','ta_seminar.ta_id','=','ta.id')
            ->join('ref_mahasiswa','ta.mahasiswa_id','=','ref_mahasiswa.id')
            // ->join('ref_ruang','ref_ruang.id','=','ta_seminar.tempat')
            ->select('*','ta_seminar.id')
            ->where('ta_seminar.id',$id)
            ->first();
        $pembimbing = Pembimbing::pembimbing($data->ta_id);
        $penguji = Penguji::pengujisemhas($data->ta_id);
        $ruang = Ruang::all();
        $dosen = Dosen::all();
        // dd($penguji);
        return view('admin.opta.semhas.edit',compact('data','ruang','pembimbing','dosen','penguji'));
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
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'tempat' => 'required',
            'idpem1' => 'required',
            'idpem2' => 'required',
            'penguji_id1' => 'required',
            'penguji_id2' => 'required',
            'penguji1' => 'required|different:penguji2,idpem1,idpem2',
            'penguji2' => 'required|different:penguji1,idpem1,idpem2',
        ]);
        // dd($validatedData);
        Seminarta::where('id',$id)->update([
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'tempat' => $request->tempat,
        ]);

        for ($i = 1; $i <= 2; $i++) {
            $penguji_id = 'penguji_id' . $i;
            $penguji = 'penguji' . $i;
            Penguji::where('id',$request->$penguji_id)->update([
                'penguji_semhas' => $request->$penguji,
            ]);
        }
        return redirect(route('opta.semhas.index'))->with('message','Seminar Hasil Berhasil di Update!');
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
