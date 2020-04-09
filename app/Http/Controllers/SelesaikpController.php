<?php

namespace App\Http\Controllers;

use App\Models\Dokumenkp;
use App\Models\Kp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SelesaikpController extends Controller
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
        $data = Kp::setuju($nim)->join('dokumen_kp','kp.id','=','dokumen_kp.kp_id')->first();
        // dd($data);
        if($data != null){
            return view('selesaikp.index',compact('data'));
        }
        return view('errors.errorkp');
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
        $tgl = Carbon::createFromDate($request->tgl_mulai_kp)->addWeeks(4)->format('Y-m-d');
        $this->validate($request, [
            'file_selesaikp' => 'required|file|mimes:pdf|max:2048',
            'tgl_mulai_kp' => 'required',
            'tgl_selesai_kp' => 'required|date|after:'.$tgl,
		]);
        // dd($data);
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file_selesaikp');
        //$id = $request->id;
		$nama_file = $request->nim."_Berkas_SelesaiKP".".".$file->getClientOriginalExtension();
 
      	// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'file_selesaikp';
        $file->move($tujuan_upload,$nama_file);

        Kp::where('id',$id)->update([
            'tgl_mulai_kp' => $request->tgl_mulai_kp,
            'tgl_selesai_kp' => $request->tgl_selesai_kp,            
        ]);

        Dokumenkp::where('kp_id', $id)->update([
            'file_selesaikp' => $nama_file,
        ]);
 
		return redirect(route('kp.selesaikp.index'))->with('message',' File Selesai KP Berhasil diupload!');
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
