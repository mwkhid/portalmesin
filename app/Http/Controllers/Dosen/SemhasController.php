<?php

namespace App\Http\Controllers\Dosen;

use App\Models\Dosen;
use App\Models\Ta;
use App\Models\Pembimbing;
use App\Models\Penguji;
use App\Models\Seminarta;
use App\Models\Jabatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $data = Dosen::bimbingansemhas(Auth::user()->nim);
        $data2 = Dosen::pengujisemhas(Auth::user()->nim);
        return view('dosen.semhas.index',compact('data','data2'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Dosen::getbimbingansemhas($id,Auth::user()->nim);
        $matkul = Ta::matkul($id);
        $pembimbing = Pembimbing::pembimbing($id);
        $penguji = Penguji::pengujisemhas($id);
        // dd($penguji);
        return view('dosen.semhas.view',compact('data','pembimbing','matkul','penguji'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Dosen::getbimbingansemhas($id,Auth::user()->nim);
        $matkul = Ta::matkul($id);
        $pembimbing = Pembimbing::pembimbing($id);
        // dd($data);
        return view('dosen.semhas.edit',compact('data','pembimbing','matkul'));
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
                    'status_semhas' => 'SETUJU',
                ]);
                return redirect(route('dosen.semhas.index'))->with('message','Update Persetujuan Pembimbing Berhasil!');
                break;
    
            case 'tolak':
                Pembimbing::where([
                    ['id', '=', $id],
                    ['pembimbing', '=', $request->id_pembimbing]
                ])->update([
                    'status_semhas' => 'TOLAK',
                ]);
                return redirect(route('dosen.semhas.index'))->with('message','Update Persetujuan Pembimbing Berhasil!');
                break;
        }
    }

    public function undangan($id){
        $data = Ta::get_ta($id)->first();
        $matkul = Ta::matkul($id);
        $pembimbing = Pembimbing::pembimbing($id);
        $penguji = Penguji::pengujisemhas($data->id);
        $semhas = Seminarta::get_semhas($id)->first();
        $jabatan = Jabatan::ta();
        // dd($staff);
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

        $pdf = PDF::loadview('dosen.semhas.undangan',compact('data','matkul',
        'pembimbing','dayList','monthList','semhas','jabatan','penguji',),[],$config);
        return $pdf->stream();
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
