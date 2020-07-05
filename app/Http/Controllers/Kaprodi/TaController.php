<?php

namespace App\Http\Controllers\Kaprodi;

use App\Models\Ta;
use App\Models\Logbookta;
use App\Models\Pembimbing;
use App\Models\Penguji;
use App\Models\Seminarta;
use App\Models\Nilaisemhaspembimbing;
use App\Models\Nilaisemhaspenguji;
use App\Models\Nilaipendadaranpembimbing;
use App\Models\Nilaipendadaranpenguji;
use App\Models\Nilaibimbingan;
use App\Models\Pendadaran;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class TaController extends Controller
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
        $data = Ta::listta();
        return view('kaprodi.ta.index',compact('data'));
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
        $ta = Ta::setuju($id)->first();
        if ($ta != null) {
            $logbookta = Logbookta::where('mahasiswa_id',$ta->mahasiswa_id)
                ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta_logbook.mahasiswa_id')
                ->where('status_logbook1',1)->get();
            $pembimbing = Pembimbing::pembimbing($ta->id);
            $pembimbing1 = Pembimbing::pembimbing($ta->id)->first();
            $pembimbing2 = Pembimbing::pembimbing($ta->id)->last();
            $penguji = Penguji::pengujisemhas($ta->id);
            $penguji1 = Penguji::pengujisemhas($ta->id)->first();
            $penguji2 = Penguji::pengujisemhas($ta->id)->last();
            $semhas = Seminarta::get_semhas($ta->id)->first();
            $nilai1 = Nilaisemhaspembimbing::where('ta_pembimbing_id',$pembimbing1->id)->first();
            $nilai2 = Nilaisemhaspembimbing::where('ta_pembimbing_id',$pembimbing2->id)->first();
            if ($penguji1 && $penguji2 && $nilai1 && $nilai2) {
                $nilai3 = Nilaisemhaspenguji::where('ta_penguji_id',$penguji1->id)->first();
                $nilai4 = Nilaisemhaspenguji::where('ta_penguji_id',$penguji2->id)->first();
                $rata2 = ($nilai1->total + $nilai2->total + $nilai3->total + $nilai4->total) / 4;
            }else{
                $nilai3 = null;
                $nilai4 = null;
                $rata2 = null;
            }
            $pengujipen = Penguji::pengujipendadaran($ta->id);
            $pengujipen1 = Penguji::pengujipendadaran($ta->id)->first();
            $pengujipen2 = Penguji::pengujipendadaran($ta->id)->last();
            $pendadaran = Pendadaran::get_pendadaran($ta->id)->first();
            $nilaipen1 = Nilaipendadaranpembimbing::where('ta_pembimbing_id',$pembimbing1->id)->first();
            $nilaipen2 = Nilaipendadaranpembimbing::where('ta_pembimbing_id',$pembimbing2->id)->first();
            if($pengujipen1 && $pengujipen2 && $nilaipen1  && $nilaipen2){
                $nilaipen3 = Nilaipendadaranpenguji::where('ta_penguji_id',$penguji1->id)->first();
                $nilaipen4 = Nilaipendadaranpenguji::where('ta_penguji_id',$penguji2->id)->first();
                $ratapen2 = ($nilaipen1->total + $nilaipen2->total + $nilaipen3->total + $nilaipen4->total) / 4;
                $nb1 = Nilaibimbingan::where('ta_pembimbing_id',$pembimbing1->id)->first();
                $nb2 = Nilaibimbingan::where('ta_pembimbing_id',$pembimbing2->id)->first();
                $nbrata2 = ($nb1->total_skripsi + $nb2->total_skripsi) / 2;
                $nilaiakhir = ($nbrata2 * 0.6) + ($ratapen2 * 0.4);
            }else{
                $nilaipen3 = null;
                $nilaipen4 = null;
                $ratapen2 = null;
                $nb1 = null;
                $nb2 = null;
                $nbrata2 = null;
                $nilaiakhir = null;
            }
            // dd($rata2);
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
            // dd($logbookta);
            $config = [
                'format' => 'A4-P', // Portrait
                'margin_left'          => 20,
                'margin_right'         => 10,
                'margin_top'           => 20,
                'margin_footer'         => 5,
            // 'margin_bottom'        => 25,
            ];
            $pdf = PDF::loadview('kaprodi.ta.show',compact('ta','logbookta','pembimbing',
            'pembimbing1','pembimbing2','penguji','penguji1','penguji2','semhas',
            'nilai1','nilai2','nilai3','nilai4','rata2','pendadaran','pengujipen','pengujipen1',
            'pengujipen2','nilaipen1','nilaipen2','nilaipen3','nilaipen4','ratapen2',
            'nb1','nb2','nbrata2','nilaiakhir','dayList','monthList'),[],$config);
            return $pdf->stream();
        }else{
            return view('errors.ta');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
