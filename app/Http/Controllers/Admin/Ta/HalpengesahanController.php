<?php

namespace App\Http\Controllers\Admin\Ta;

use App\Models\Pendadaran;
use App\Models\Halpengesahan;
use App\Models\Mahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HalpengesahanController extends Controller
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
        // $data = Pendadaran::listpendadaransetuju();
        $data = Mahasiswa::Mhslulusrevisi()->whereNotNull('doc_ta');
        // dd($data);
        return view('admin.ta.halpengesahan.index',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengesahan = Halpengesahan::where('mahasiswa_id',$id)->first();
        if($pengesahan){
            return view('admin.ta.halpengesahan.show',compact('pengesahan'));
        }
        return view('admin.ta.halpengesahan.tidakada');
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
        Halpengesahan::updateOrCreate(['mahasiswa_id' => $id,],[
            'koor_ta' => 1,
        ]);

        return redirect()->back()->with('message','Draft Tugas Akhir Telah disetujui');
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
