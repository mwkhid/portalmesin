<?php

namespace App\Http\Controllers\Admin\Pembimbingta;

use App\Models\Ta;
use App\Models\Logpembimbing2ta;
use App\Models\Pembimbing;
use App\Models\Logpembimbingta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TapembimbingController extends Controller
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
        $data = Ta::pembimbingta();
        return view('admin.ta.pembimbing.index', compact('data'));
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
        $data = Ta::getpembimbingta($id);
        $pembimbinglama = Pembimbing::pembimbing($id);
        $statuslama = Logpembimbing2ta::pembimbinglama($data->id);
        $pembimbingbaru = Logpembimbing2ta::pembimbingbaru($data->id);
        // dd($data);
        return view('admin.ta.pembimbing.view', compact('data','pembimbinglama','pembimbingbaru','statuslama'));
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
        switch ($request->input('action')) {
            case 'setuju':
                $validateData = $request->validate([
                    'idpem_lama1' => 'required',
                    'idpem_lama2' => 'required',
                    'idpem_baru1' => 'required',
                    'idpem_baru2' => 'required',
                ]);
                // dd($validateData);
                Logpembimbingta::where('id',$id)->update([
                    'status_pembimbing' => 1,
                ]);

                Logpembimbing2ta::where('log_pembimbing_ta_id', $id)->update([
                    'status_pembimbing_lama' => 1,
                    'status_pembimbing_baru' => 1,
                ]);

                for ($i = 1; $i <= 2; $i++) {
                    $idpem = 'idpem_lama'.$i;
                    $pembimbing = 'idpem_baru' . $i;
                    Pembimbing::where('id',$request->$idpem)->update([
                        'pembimbing' => $request->$pembimbing,
                        'pem' => $i,
                        'status_pem' => 'SETUJU',
                    ]);
                }
                return redirect(route('admin.pembimbingta.index'))->with('message','Perubahan Pembimbing Tugas Akhir Disetujui!');
                break;
            
            case 'tolak':
                Logpembimbingta::where('id',$id)->update([
                    'status_pembimbing_ta' => 0,
                ]);
                return redirect(route('admin.pembimbingta.index'))->with('message','Perubahan Pembimbing Tugas Akhir Ditolak!');
                break;
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
