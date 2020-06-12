<?php

namespace App\Http\Controllers;

use App\Models\Ta;
use App\Models\Pendadaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // dd($data);
        if($data != null){
            return view('ta.draft.index',compact('data'));
        }
        return view('errors.pendadaran');
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
        $this->validate($request, [
            'file_draftta' => 'required|file|mimes:pdf|max:2048',
		]);
        // dd($data);
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file_draftta');
        //$id = $request->id;
		$nama_file = $request->nim."_Berkas_DraftTA".".".$file->getClientOriginalExtension();
 
      	// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'file_draftta';
        $file->move($tujuan_upload,$nama_file);

        Ta::where('id', $id)->update([
            'doc_ta' => $nama_file,
        ]);
 
		return redirect(route('ta.draft.index'))->with('message','Dokumen TA Berhasil diupload!');
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
