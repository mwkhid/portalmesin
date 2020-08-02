<?php

namespace App\Http\Controllers\Dosen\Pembimbing;

use App\Models\Dosen;
use App\Models\Ta;
use App\Models\Pembimbing;
use App\Models\Penguji;
use App\Models\Pendadaran;
use App\Models\Mahasiswa;
use App\Models\Nilaipendadaranpembimbing;
use App\Models\Nilaipendadaranpenguji;
use App\Models\Nilaibimbingan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class RekappendadaranController extends Controller
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

        $pdf = PDF::loadview('dosen.pendadaran.pembimbing.cetak',compact('data','nilai1','nilai2','nilai3',
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
        $data = Dosen::getbimbinganpendadaran($id,Auth::user()->nim);
        $pembimbing = Pembimbing::pembimbing($id)->last();
        $uji1 = Penguji::pengujipendadaran($id)->first();
        $uji2 = Penguji::pengujipendadaran($id)->last();
        $nilai = Nilaipendadaranpembimbing::where('ta_pembimbing_id', $data->id)->first();
        $pembimbing2 = Nilaipendadaranpembimbing::where('ta_pembimbing_id',$pembimbing->id)->first();
        $penguji1 = Nilaipendadaranpenguji::where('ta_penguji_id',$uji1->id)->first();
        $penguji2 = Nilaipendadaranpenguji::where('ta_penguji_id',$uji2->id)->first();
        $rata2 = (($nilai->total ?? '0') + ($pembimbing2->total ?? '0') + ($penguji1->total ?? '0') + ($penguji2->total ?? '0')) / 4;
        $pendadaran = Pendadaran::get_pendadaran($id)->get()->last();
        $bimbingan = Nilaibimbingan::where('ta_pembimbing_id',$data->id)->first();
        $bimbingan2 = Nilaibimbingan::where('ta_pembimbing_id',$pembimbing->id)->first();
        $narata2 = (($bimbingan->total_skripsi ?? '0') + ($bimbingan2->total_skripsi ?? '0')) / 2;
        // dd($data);
        return view('dosen.pendadaran.pembimbing.rekap',compact('data','nilai','pembimbing2',
        'penguji1','penguji2','rata2','narata2','pembimbing','uji1','uji2','pendadaran','bimbingan','bimbingan2'));
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
            'narata2'  => 'required',
            'rata2'  => 'required',
            'kelulusan' => 'required',
        ]);
        $nilaiangka = ($request->narata2 * 0.6) + ($request->rata2 * 0.4);
        // dd($nilaiangka);

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
        Pendadaran::where('id',$id)->update([
            'kelulusan' => $request->kelulusan,
            'nilai_angka' => $nilaiangka,
            'nilai_huruf' => $nilaihuruf,
            'nilai_skala' => $nilaiskala,
        ]);

        if($request->kelulusan == 1){
            Ta::where('id',$request->ta_id)->update([
                'proses_ta' => 4,
            ]);
            Mahasiswa::where('id',$request->mahasiswa_id)->update([
                'status_mhs' => 'LULUS',
            ]);
        }else{
            Ta::where('id',$request->ta_id)->update([
                'proses_ta' => 3,
            ]);
        }

        return redirect()->back()->with('message','Berita acara berhasil isi, Mohon cetak nilai pendadaran.');
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
