<?php

namespace App\Http\Controllers\Admin\Pendadaran;

use App\Models\Pendadaran;
use App\Models\Ruang;
use App\Models\Dosen;
use App\Models\Ta;
use App\Models\Penguji;
use App\Models\Pembimbing;
use App\Models\Jabatan;
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
        $data = Pendadaran::listpendadaransetuju();
        // dd($data);
        return view('admin.pendadaran.list.index',compact('data'));
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
        // $cetak_pendadaran = $this->cetak_pendadaran($id);
        $data = Ta::get_ta($id)->first();
        $matkul = Ta::matkul($id);
        $pembimbing = Pembimbing::pembimbing($id);
        $pembimbing1 = Pembimbing::pembimbing($id)->first();
        $pembimbing2 = Pembimbing::pembimbing($id)->last();
        $penguji = Penguji::pengujipendadaran($data->id);
        $penguji1 = Penguji::pengujipendadaran($data->id)->first();
        $penguji2 = Penguji::pengujipendadaran($data->id)->last();
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

        $pdf = PDF::loadview('admin.pendadaran.list.view',compact('data','matkul',
        'pembimbing','dayList','monthList','pendadaran','jabatan','penguji','penguji1','penguji2','pembimbing1','pembimbing2'),[],$config);
        return $pdf->stream();
        // $data = Pendadaran::find($id)->join('ta','ta.id','=','pendadaran.ta_id')
        // ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        // ->join('ref_ruang','ref_ruang.id','=','pendadaran.tempat')
        // ->select('*','pendadaran.id')
        // ->where('pendadaran.id',$id)
        // ->firstOrFail();
        // $penguji = Penguji::pengujipendadaran($data->ta_id);
        // $pembimbing = Pembimbing::pembimbing($data->ta_id);
        // // dd($data);
        // return view('admin.pendadaran.list.view',compact('data','penguji','pembimbing'));
    }

    public function cetak_pendadaran($id){
        Pendadaran::where('ta_id',$id)->update([
            'cetak_pendadaran' => 1,
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
        $data = Pendadaran::find($id)->join('ta','ta.id','=','ta_pendadaran.ta_id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->join('ref_ruang','ref_ruang.id','=','ta_pendadaran.tempat')
        ->select('*','ta_pendadaran.id')
        ->where('ta_pendadaran.id',$id)
        ->firstOrFail();
        $penguji = Penguji::pengujipendadaran($data->ta_id);
        $pembimbing = Pembimbing::pembimbing($data->ta_id);
        $ruang = Ruang::all();
        $dosen = Dosen::all();
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
        // dd($last);
        return view('admin.pendadaran.list.edit',compact('data','penguji','ruang','dosen','pembimbing','dayList','monthList',));
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
            return redirect(route('admin.listpendadaran.index'))->with('message','Pendadaran Berhasil di Update!');

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
