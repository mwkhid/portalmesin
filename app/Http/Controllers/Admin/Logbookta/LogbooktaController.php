<?php

namespace App\Http\Controllers\Admin\Logbookta;

use App\Models\Logbookta;
use App\Models\Ta;
use App\Models\Pembimbing;
use App\Models\Mahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class LogbooktaController extends Controller
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
        $ta = Ta::listtasetuju();
        return view('admin.ta.logbookta.index', compact('ta'));
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
        $data = Logbookta::where('mahasiswa_id',$id)
                ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta_logbook.mahasiswa_id')
                ->where('status_logbook1',1)->get();
        $nim = $data->first();
        if($nim == null){
            return view('errors.logbookta');
        }else{
            $ta = Ta::setuju($nim->nim)->first();
            $pembimbing = Pembimbing::pembimbing($ta->id);
            $pembimbing1 = Pembimbing::pembimbing($ta->id)->first();
            $pembimbing2 = Pembimbing::pembimbing($ta->id)->last();
            // dd($data);
            $config = [
                'format' => 'A4-L', // Landscape
                 'margin_left'          => 20,
                 'margin_right'         => 10,
                 'margin_top'           => 20,
                 'margin_footer'         => 5,
                // 'margin_bottom'        => 25,
              ];
            $pdf = PDF::loadview('admin.ta.logbookta.cetak_logbookta',compact('data','ta','pembimbing','pembimbing1','pembimbing2'),[],$config);
            return $pdf->stream();

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
        $data = Logbookta::logbookmhsasc($id);
        $mahasiswa = Mahasiswa::where('nim',$id)->first();
        // dd($data);
        return view('admin.ta.logbookta.details',compact('data','mahasiswa'));
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
