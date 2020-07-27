<?php

namespace App\Http\Controllers\Admin\Semhas;

use App\Models\Dosen;
use App\Models\Pembimbing;
use App\Models\Penguji;
use App\Models\Nilaisemhaspembimbing;
use App\Models\Nilaisemhaspenguji;
use App\Models\Seminarta;
use App\Models\Ta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class RekapController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $pem1 = Pembimbing::pembimbing($id)->first();
        $pem2 = Pembimbing::pembimbing($id)->last();
        $uji1 = Penguji::pengujisemhas($id)->first();
        $uji2 = Penguji::pengujisemhas($id)->last();
        $pembimbing1 = Nilaisemhaspembimbing::where('ta_pembimbing_id', $pem1->id)->first();
        $pembimbing2 = Nilaisemhaspembimbing::where('ta_pembimbing_id',$pem2->id)->first();
        $penguji1 = Nilaisemhaspenguji::where('ta_penguji_id',$uji1->id)->first();
        $penguji2 = Nilaisemhaspenguji::where('ta_penguji_id',$uji2->id)->first();
        $rata2 = (($pembimbing1->total ?? '0') + ($pembimbing2->total ?? '0') + ($penguji1->total ?? '0') + ($penguji2->total ?? '0')) / 4;
        $semhas = Seminarta::get_semhas($id)->get()->last();
        $ta = Ta::get_ta($id)->get()->last();
        // dd($rata2);
        return view('admin.semhas.rekap.edit',compact('ta','pem1','pembimbing1','pembimbing2','penguji1','penguji2','rata2','pem2','uji1','uji2','semhas'));
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
            'pernyataan' => 'required',
        ]);

        $nilaiangka = $request->rata2;

        if($nilaiangka >= 85){
            $nilaihuruf = 'A';
            $nilaiskala = 4;
        }elseif($nilaiangka >= 80){
            $nilaihuruf = 'A-';
            $nilaiskala = 3.7;
        }elseif ($nilaiangka >= 75){
            $nilaihuruf = 'B+';
            $nilaiskala = 3.3;
        }elseif($nilaiangka >= 70){
            $nilaihuruf = 'B';
            $nilaiskala = 3;
        }elseif($nilaiangka >= 65){
            $nilaihuruf = 'C+';
            $nilaiskala = 2.7;
        }elseif($nilaiangka >= 60){
            $nilaihuruf = 'C';
            $nilaiskala = 2;
        }elseif($nilaiangka >= 55){
            $nilaihuruf = 'D';
            $nilaiskala = 1;
        }elseif($nilaiangka < 55){
            $nilaihuruf = 'E';
            $nilaiskala = 0;
        }

        // dd($validatedData);
        Seminarta::where('id',$id)->update([
            'pernyataan' => $request->pernyataan,
            'nilai_angka' => $nilaiangka,
            'nilai_huruf' => $nilaihuruf,
            'nilai_skala' => $nilaiskala,
        ]);

        if($request->pernyataan == 1){
            Ta::where('id',$request->ta_id)->update([
                'proses_ta' => 3,
            ]);
        }else{
            Ta::where('id',$request->ta_id)->update([
                'proses_ta' => 2,
            ]);
        }

        return redirect()->back()->with('message','Berita acara berhasil isi, Mohon cetak nilai seminar hasil.');
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
