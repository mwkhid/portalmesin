<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Matakuliah;
use App\Models\Peminatan;
use App\Models\Ta;
use App\Models\Jabatan;
use App\Models\Koordinatorkbk;
use App\Models\Pembimbing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $nim = Auth::user()->nim;
        $data = Mahasiswa::mhs($nim)->first();
        $dosen = Dosen::all();
        $matakuliah = Matakuliah::all();
        $peminatan = Peminatan::all();
        $pending = Ta::pending($nim)->first();
        $setuju = Ta::setuju($nim)->first();
        $tolak = Ta::tolak($nim)->first();
        // dd($data);
        if($setuju != null){
            $matkul = Ta::matkul($setuju->id);
            $pembimbing = Pembimbing::pembimbing($setuju->id);
            return view('ta.ta_setuju',compact('setuju','matkul','pembimbing')); //TA disetujui
        }elseif($pending != null){
            $matkul = Ta::matkul($pending->id);
            $pembimbing = Pembimbing::pembimbing($pending->id);

            return view('ta.ta_pending',compact('pending','matkul','pembimbing')); //Ta menunggu repon koor ta
        }elseif($tolak != null){
            $matkul = Ta::matkul($tolak->id);
            $pembimbing = Pembimbing::pembimbing($tolak->id);
            // dd($matkul);
            return view('ta.ta_tolak',compact('tolak','matkul','matakuliah','pembimbing','dosen','peminatan')); //Ta ditolak
        }elseif ($data != null){
            return view('ta.ta_pendaftaran',compact('data','dosen','matakuliah','peminatan')); //Belum daftar ta
        }else{
            return view('ta.error.pembimbing'); //sementara
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedTa = $request->validate([
            'mahasiswa_id' => 'required|unique:ta',
            'sks' => 'required',
            'ipk' => 'required',
            'judul' => 'required',
            'abstrak' => 'required',
            'status_ta' => 'required',
            'peminatan_id' => 'required',
            'cetak_ta' => 'required',
        ]);

        $validatedData = $request->validate([
            // 'kode_mk1' => 'required',
            'mk1' => 'required|different:mk3',
            'nilai_mk1' => 'required|numeric',
            'huruf_mk1' => 'required',
            // 'kode_mk2' => 'required',
            'mk2' => 'required|different:mk1',
            'nilai_mk2' => 'required|numeric',
            'huruf_mk2' => 'required',
            // 'kode_mk3' => 'required',
            'mk3' => 'required|different:mk2',
            'nilai_mk3' => 'required|numeric',
            'huruf_mk3' => 'required',
            'pembimbing1' => 'required',
            'pembimbing2' => 'required|different:pembimbing1',
        ]);
        // dd($validatedData);
        $ta = Ta::create($validatedTa);
        $ta_id = $ta->id;
        if($ta){

            for ($i = 1; $i <= 3; $i++) {
                $mk = 'mk' . $i;
                $datamk = Matakuliah::where('nama',$request->$mk)->first();
                // $kode_mk = $datamk->kode;
                $nilai_mk = 'nilai_mk' . $i;
                $huruf_mk = 'huruf_mk' . $i;
                DB::table('ta_matkul')->insert([
                    'ta_id' => $ta_id,
                    'nama_matkul' => $request->$mk,
                    'kode_matkul' => $datamk->kode,
                    'ip' => $request->$nilai_mk,
                    'huruf' => $request->$huruf_mk,
                ]);
            }

            for ($i = 1; $i <= 2; $i++) {
                $pembimbing = 'pembimbing' . $i;
                Pembimbing::create([
                    'ta_id' => $ta_id,
                    'pembimbing' => $request->$pembimbing,
                    'pem' => $i,
                    'status_pem' => 'PENDING',
                ]);
            }

            Koordinatorkbk::create([
                'ta_id' => $ta_id,
                'status_kbk' => 'PENDING',
            ]);
            // alihkan halaman ke halaman index
            return redirect(route('ta.pendaftaran.index'))->with('message','Terimakasih telah mendaftar Tugas Akhir!');
        }
       //return redirect('ta/pendaftaran')->with('message','Terimakasih telah mengajukan Kerja Praktek!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tolak = Ta::find($id)
                ->select('*','ta.id')
                ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
                ->join('ref_peminatan','ref_peminatan.id','=','ta.peminatan_id')
                ->where('nim', Auth::user()->nim)
                ->where('status_ta','PENDING')
                ->firstOrFail();
        $matkul = Ta::matkul($id);
        $pembimbing = Pembimbing::pembimbing($id);
        $dosen = Dosen::all();
        $matkul1 = Matakuliah::all();
        $peminatan = Peminatan::all();
        // dd($pembimbing);
        return view('ta.ta_edit', compact('tolak','matkul','pembimbing','dosen','matkul1','peminatan'));
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
        $validatedTa = $request->validate([
            'sks' => 'required',
            'ipk' => 'required',
            'judul' => 'required',
            'abstrak' => 'required',
            'status_ta' => 'required',
            'peminatan_id' => 'required',
        ]);

        $validatedData = $request->validate([
            // 'kode_mk1' => 'required',
            'mk1' => 'required|different:mk3',
            'nilai_mk1' => 'required|numeric',
            'huruf_mk1' => 'required',
            // 'kode_mk2' => 'required',
            'mk2' => 'required|different:mk1',
            'nilai_mk2' => 'required|numeric',
            'huruf_mk2' => 'required',
            // 'kode_mk3' => 'required',
            'mk3' => 'required|different:mk2',
            'nilai_mk3' => 'required|numeric',
            'huruf_mk3' => 'required',
            'pembimbing1' => 'required',
            'pembimbing2' => 'required|different:pembimbing1',
        ]);
        $ta = Ta::where('id',$id)->update([
            'sks' => $request->sks,
            'ipk' => $request->ipk,
            'judul' => $request->judul,
            'abstrak' => $request->abstrak,
            'status_ta' => $request->status_ta,
            'peminatan_id' => $request->peminatan_id,
            'proses_ta' => 1,
        ]);
        if($ta){

            for ($i = 1; $i <= 3; $i++) {
                $idta = 'idta'.$i;
                $mk = 'mk' . $i;
                $datamk = Matakuliah::where('nama',$request->$mk)->first();
                // $kode_mk = 'kode_mk' . $i;
                $nilai_mk = 'nilai_mk' . $i;
                $huruf_mk = 'huruf_mk' . $i;
                DB::table('ta_matkul')->where('id',$request->$idta)->update([
                    'nama_matkul' => $request->$mk,
                    'kode_matkul' => $datamk->kode,
                    'ip' => $request->$nilai_mk,
                    'huruf' => $request->$huruf_mk,
                ]);
            }

            for ($i = 1; $i <= 2; $i++) {
                $idpem = 'idpem'.$i;
                $pembimbing = 'pembimbing' . $i;
                Pembimbing::where('id',$request->$idpem)->update([
                    'pembimbing' => $request->$pembimbing,
                    'pem' => $i,
                    'status_pem' => 'PENDING',
                ]);
            }
            // alihkan halaman ke halaman index
            return redirect(route('ta.pendaftaran.index'))->with('message','Data Tugas Akhir Berhasil di Update!');
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

    //Cetak Lembar Pendaftaran TA
    public function cetak_pendaftaran(){
        $nim = Auth::user()->nim;
        $data = Ta::pending($nim)->first();
        $matkul = Ta::matkul($data->id);
        $pembimbing = Pembimbing::pembimbing($data->id);
        $ta = Jabatan::ta();
        if($data->peminatan_id == 1){
            $kbk = Jabatan::sel();
        }elseif($data->peminatan_id == 2){
            $kbk = Jabatan::meka();
        }else{
            $kbk = Jabatan::ict();
        }
        $config = [
            'format' => 'A4-P', // Portrait
             'margin_left'          => 30,
             'margin_right'         => 25,
             'margin_top'           => 30,
             'margin_footer'         => 5,
            // 'margin_bottom'        => 25,
          ];
        $pdf = PDF::loadview('ta.cetak_pendaftaran',compact('data','matkul','pembimbing','kbk','ta'),[],$config);
        return $pdf->stream();
    }
}
