<?php

namespace App\Http\Controllers\Admin\Ta;

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
use App\Models\Halpengesahan;
use App\Models\Jabatan;
use App\Models\Mahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class ListController extends Controller
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
        return view('admin.ta.listta.list_tugasakhir',compact('data'));
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
        $halpengesahan = Halpengesahan::where('mahasiswa_id',$ta->mahasiswa_id)->get()->last();
        //Seminar Hasil
        $semhas = Seminarta::get_semhas($ta->id)->get()->last();
        $pem1 = Pembimbing::pembimbing($ta->id)->first();
        $pem2 = Pembimbing::pembimbing($ta->id)->last();
        $uji1 = Penguji::pengujisemhas($ta->id)->first();
        $uji2 = Penguji::pengujisemhas($ta->id)->last();
        $pembimbing1 = Nilaisemhaspembimbing::where('ta_pembimbing_id', $pem1->id)->first();
        $pembimbing2 = Nilaisemhaspembimbing::where('ta_pembimbing_id',$pem2->id)->first();
        if($uji1 && $uji2){
            $penguji1 = Nilaisemhaspenguji::where('ta_penguji_id',$uji1->id)->first();
            $penguji2 = Nilaisemhaspenguji::where('ta_penguji_id',$uji2->id)->first();
        }else{
            $penguji1 = null;
            $penguji2 = null;
        }
        $rata2 = (($pembimbing1->total ?? '0') + ($pembimbing2->total ?? '0') + ($penguji1->total ?? '0') + ($penguji2->total ?? '0')) / 4;

        //Pendadaran
        $pendadaran = Pendadaran::get_pendadaran($ta->id)->get()->last();
        $pembimbingpen1 = Nilaipendadaranpembimbing::where('ta_pembimbing_id', $pem1->id)->first();
        $pembimbingpen2 = Nilaipendadaranpembimbing::where('ta_pembimbing_id',$pem2->id)->first();
        if($uji1 && $uji2){
            $pengujipen1 = Nilaipendadaranpenguji::where('ta_penguji_id',$uji1->id)->first();
            $pengujipen2 = Nilaipendadaranpenguji::where('ta_penguji_id',$uji2->id)->first();
        }else{
            $pengujipen1 = null;
            $pengujipen2 = null;
        }
        $ratapen2 = (($pembimbing1->total ?? '0') + ($pembimbing2->total ?? '0') + ($penguji1->total ?? '0') + ($penguji2->total ?? '0')) / 4;
        $bimbingan = Nilaibimbingan::where('ta_pembimbing_id',$pem1->id)->first();
        $bimbingan2 = Nilaibimbingan::where('ta_pembimbing_id',$pem2->id)->first();
        $narata2 = (($bimbingan->total_skripsi ?? '0') + ($bimbingan2->total_skripsi ?? '0')) / 2;
        // dd($ta);
        return view('admin.ta.listta.show',compact('ta','pem1',
        'pembimbing1','pembimbing2','penguji1','penguji2','rata2','pem2','uji1','uji2','semhas',
        'pendadaran','pembimbingpen1','pembimbingpen2','pengujipen1','pengujipen2','ratapen2','bimbingan',
        'bimbingan2','narata2','halpengesahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
            $pdf = PDF::loadview('admin.ta.listta.edit',compact('ta','logbookta','pembimbing',
            'pembimbing1','pembimbing2','penguji','penguji1','penguji2','semhas',
            'nilai1','nilai2','nilai3','nilai4','rata2','pendadaran','pengujipen','pengujipen1',
            'pengujipen2','nilaipen1','nilaipen2','nilaipen3','nilaipen4','ratapen2',
            'nb1','nb2','nbrata2','nilaiakhir','dayList','monthList'),[],$config);
            return $pdf->stream();
        }else{
            return view('errors.ta');
        }
    }

    public function downloaddraft($id){
        $ta = Ta::find($id);
        if($ta->doc_ta){
            $file_name = $ta->doc_ta;
            $file_path = public_path('file_draftta/'.$file_name);
            return response()->download($file_path);
        }
        return view('dosen.draft.belumupload');
    }

    public function downloadsourcecode($id){
        $ta = Ta::find($id);
        if($ta->doc_ta){
            $file_name = $ta->sourcecode_ta;
            $file_path = public_path('file_sourcecode/'.$file_name);
            return response()->download($file_path);
        }
        return view('dosen.draft.belumupload');
    }

    public function halpengesahan($id){
        $data = Mahasiswa::find($id);
        $ta = Ta::where('mahasiswa_id',$id)->get()->last();
        $pem1 = Pembimbing::pembimbing($ta->id)->first();
        $pem2 = Pembimbing::pembimbing($ta->id)->last();
        $uji1 = Penguji::pengujipendadaran($ta->id)->first();
        $uji2 = Penguji::pengujipendadaran($ta->id)->last();
        $halpengesahan = Halpengesahan::where('mahasiswa_id',$id)->first();
        $kaprodi = Jabatan::kaprodi();
        $koorta = Jabatan::ta();
        // dd($kaprodi);
        $config = [
            'format' => 'A4-P', // Portrait
             'margin_left'          => 40,
             'margin_right'         => 30,
             'margin_top'           => 30,
             'margin_footer'        => 25,
            // 'margin_bottom'        => 25,
          ];
        $pdf = PDF::loadview('ta/draft/halpengesahan',compact('data','pem1','pem2','uji1','uji2','kaprodi','koorta','halpengesahan','ta'),[],$config);
        return $pdf->stream();
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
