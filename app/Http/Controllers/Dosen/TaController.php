<?php

namespace App\Http\Controllers\Dosen;

use App\Models\Dosen;
use App\Models\Ta;
use App\Models\Pembimbing;
use App\Models\Penguji;
use App\Models\Jabatan;
use App\Models\Seminarta;
use App\Models\Nilaisemhaspembimbing;
use App\Models\Nilaisemhaspenguji;
use App\Models\Nilaipendadaranpembimbing;
use App\Models\Nilaipendadaranpenguji;
use App\Models\Nilaibimbingan;
use App\Models\Pendadaran;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $data = Dosen::bimbinganta(Auth::user()->nim);
        // dd($data);
        return view('dosen.ta.list_ta',compact('data'));
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
        $data = Dosen::getbimbingan($id,Auth::user()->nim);
        $matkul = Ta::matkul($id);
        $pembimbing = Pembimbing::pembimbing($id);
        // dd($data);
        return view('dosen.ta.view_ta',compact('data','pembimbing','matkul'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Dosen::getbimbingan($id,Auth::user()->nim);
        $matkul = Ta::matkul($id);
        $pembimbing = Pembimbing::pembimbing($id);
        // dd($data);
        return view('dosen.ta.edit_ta',compact('data','pembimbing','matkul'));
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
            'id_pembimbing' => 'required',
        ]);

        switch ($request->input('action')) {
            case 'setuju':
                Pembimbing::where([
                    ['id', '=', $id],
                    ['pembimbing', '=', $request->id_pembimbing]
                ])->update([
                    'status_pem' => 'SETUJU',
                ]);
                return redirect(route('dosen.ta.index'))->with('message','Update Data Pembimbing Berhasil!');
                break;
    
            case 'tolak':
                Pembimbing::where([
                    ['id', '=', $id],
                    ['pembimbing', '=', $request->id_pembimbing]
                ])->update([
                    'status_pem' => 'TOLAK',
                ]);
                return redirect(route('dosen.ta.index'))->with('message','Update Data Pembimbing Berhasil!');
                break;
        }
        // dd($validatedData);

        // DB::table('ta_pembimbing')->where([
        //         ['id', '=', $id],
        //         ['pembimbing', '=', $request->id_pembimbing]
        //     ])->update([
        //         'status_pem' => 'SETUJU',
        //     ]);
        // return redirect(route('dosen.ta.index'))->with('message','Update Data Pembimbing Berhasil!');
    }

    public function surattugas($id){
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

    public function detailsta($id){
        $ta = Ta::setuju($id)->first();
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
        // dd($pendadaran);
        return view('dosen.ta.details_ta',compact('ta','pem1',
        'pembimbing1','pembimbing2','penguji1','penguji2','rata2','pem2','uji1','uji2','semhas',
        'pendadaran','pembimbingpen1','pembimbingpen2','pengujipen1','pengujipen2','ratapen2','bimbingan',
        'bimbingan2','narata2'));
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
