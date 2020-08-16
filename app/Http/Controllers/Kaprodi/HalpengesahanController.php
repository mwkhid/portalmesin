<?php

namespace App\Http\Controllers\Kaprodi;

use App\Models\Mahasiswa;
use App\Models\Halpengesahan;
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
        return view('kaprodi.halpengesahan.index',compact('data'));
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
            return view('kaprodi.halpengesahan.show',compact('pengesahan'));
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
            'kaprodi' => 1,
        ]);

        return redirect(route('kaprodi.halpengesahan.index'))->with('message','Draft Tugas Akhir Telah disetujui');
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
