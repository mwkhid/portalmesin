<?php

namespace App\Http\Controllers;

use App\Models\Ta;
use App\Models\Mahasiswa;
use App\Models\Pendadaran;
use App\Models\Biodataalumni;
use App\Models\Pembimbing;
use App\Models\Penguji;
use App\Models\Jabatan;
use App\Models\Halpengesahan;
use App\Models\Exitsurvey;
use App\Models\Bebaslab;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class TadraftController extends Controller
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
        $exitsurvey = Exitsurvey::where('mahasiswa_id',$data->mahasiswa_id)->first();
        $halpengesahan = Halpengesahan::where('mahasiswa_id',$data->mahasiswa_id)->first();
        $bebaslab = Bebaslab::where('mahasiswa_id',$data->mahasiswa_id)->first();
        // dd($halpengesahan);
        if($data != null){
            return view('ta.draft.index',compact('data','bio','exitsurvey','halpengesahan','bebaslab'));
        }
        return view('errors.pendadaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $this->validate($request, [
            'file_draftta' => 'required|file|mimes:pdf|max:20480',
            'file_sourcecode' => 'required|file|mimes:zip|max:307200',
		]);
        // dd($data);
		// menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file_draftta');
        $sourcecode = $request->file('file_sourcecode');
        //$id = $request->id;
		$nama_file = $request->nim."_DraftTA".".".$file->getClientOriginalExtension();
		$nama_sourcecode = $request->nim."_SourcecodeTA".".".$sourcecode->getClientOriginalExtension();
 
      	// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'file_draftta';
		$sourcecode_upload = 'file_sourcecode';
        $file->move($tujuan_upload,$nama_file);
        $sourcecode->move($sourcecode_upload,$nama_sourcecode);

        Ta::where('id', $id)->update([
            'doc_ta' => $nama_file,
            'sourcecode_ta' => $nama_sourcecode,
        ]);
 
		return redirect(route('ta.wisuda.index'))->with('message','Dokumen TA Berhasil diupload!');
    }

    public function bebaslab($id){
        $data = Mahasiswa::find($id);
        $pembimbing = Dosen::find($data->pem_akademik);
        $kalabgetaran = Jabatan::kalabgetaran();
        $laborangetaran = Jabatan::laborangetaran();
        $kalabperancangan = Jabatan::kalabperancangan();
        $kalabmekanika = Jabatan::kalabmekanika();
        $laboranmekanika = Jabatan::laboranmekanika();
        $kalabmotor = Jabatan::kalabmotor();
        $laboranmotor = Jabatan::laboranmotor();        
        $kalabpanas = Jabatan::kalabpanas();
        $laboranpanas = Jabatan::laboranpanas();
        $kalabproduksi = Jabatan::kalabproduksi();
        $laboranproduksi = Jabatan::laboranproduksi();
        $kalabotomasi = Jabatan::kalabotomasi();
        $laboranotomasi = Jabatan::laboranotomasi();
        $kalabmaterial = Jabatan::kalabmaterial();
        $laboranmaterial = Jabatan::laboranmaterial();
        $kalabpengecoran = Jabatan::kalabpengecoran();
        $kalabano = Jabatan::kalabnano();
        $kalabenergi = Jabatan::kalabenergi();
        $laboranenergi = Jabatan::laboranenergi();

        $bebaslab = Bebaslab::where('mahasiswa_id',$id)->first();
        // dd($bebaslab);
        $config = [
            'format' => 'A4-P', // Portrait
             'margin_left'          => 15,
             'margin_right'         => 15,
             'margin_top'           => 35,
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
        $pdf = PDF::loadview('ta/draft/bebaslab',compact('data','kalabgetaran','laborangetaran','kalabperancangan','kalabmekanika','laboranmekanika',
        'kalabmotor','laboranmotor','kalabpanas','laboranpanas', 'kalabproduksi','laboranproduksi','kalabotomasi','kalabmaterial','laboranmaterial',
        'kalabpengecoran','kalabnano','kalabenergi','laboranenergi','pembimbing','bebaslab','monthList'),[],$config);
        return $pdf->stream();
    }

    public function halpengesahan($id){
        $data = Mahasiswa::find($id);
        $ta = Ta::where('mahasiswa_id',$id)->get()->last();
        $pendadaran = Pendadaran::where('ta_id',$ta->id)->get()->last();
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
        $pdf = PDF::loadview('ta/draft/halpengesahan',compact('data','pem1','pem2','uji1','uji2','kaprodi','koorta','halpengesahan','ta','dayList','monthList','pendadaran'),[],$config);
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
