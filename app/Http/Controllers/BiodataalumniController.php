<?php

namespace App\Http\Controllers;

use App\Models\Biodataalumni;
use App\Models\Pendadaran;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class BiodataalumniController extends Controller
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
        $data = Pendadaran::setuju($nim)->first();
        $bio = Biodataalumni::where('mahasiswa_id',$data->mahasiswa_id)->first();
        // dd($bio);
        if($bio){
            return view('ta.biodataalumni.edit',compact('bio'));
        }else{
            return view('ta.biodataalumni.index',compact('data'));
        }
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
        $validatedBiodata = $request->validate([
            'mahasiswa_id' => 'required',
            'nama' => 'required',
            'nim' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_masuk' => 'required',
            'tgl_lulus' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_rumah' => 'required',
            'no_hp' => 'required',
            'nilai_ta' => 'required',
            'ipk_terakhir' => 'required',
            'capaian_sks' => 'required',
            'masa_studi' => 'required',
            'bidang_ilmu' => 'required',
            'judul_ind' => 'required',
            'judul_eng' => 'required',
        ]);

        Biodataalumni::create($validatedBiodata);
        return redirect()->back()->with('message','Biodata Berhasil Diinputkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mhs = Mahasiswa::find($id);
        $pembimbing = Dosen::find($mhs->pem_akademik);
        $bio = Biodataalumni::where('mahasiswa_id',$id)->first();
        $config = [
            'format' => 'A4-P', // Portrait
             'margin_left'          => 25,
             'margin_right'         => 15,
             'margin_top'           => 15,
            // 'margin_bottom'        => 25,
          ];
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
        $pdf = PDF::loadview('ta/biodataalumni/show',compact('bio','monthList','pembimbing','mhs'),[],$config);
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
        $validatedBiodata = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_masuk' => 'required',
            'tgl_lulus' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_rumah' => 'required',
            'no_hp' => 'required',
            'nilai_ta' => 'required',
            'ipk_terakhir' => 'required',
            'capaian_sks' => 'required',
            'masa_studi' => 'required',
            'bidang_ilmu' => 'required',
            'judul_ind' => 'required',
            'judul_eng' => 'required',
        ]);

        Biodataalumni::where('mahasiswa_id',$id)->update($validatedBiodata);
        return redirect()->back()->with('message','Biodata Berhasil Diinputkan');
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
