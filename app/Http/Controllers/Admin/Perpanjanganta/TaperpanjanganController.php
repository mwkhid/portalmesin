<?php

namespace App\Http\Controllers\Admin\Perpanjanganta;

use App\Models\Ta;
use App\Models\Pembimbing;
use App\Models\Logperpanjanganta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaperpanjanganController extends Controller
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
        $data = Ta::perpanjanganta();
        // dd($data);
        return view('admin.ta.perpanjangan.index',compact('data'));
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
        $data = Ta::getperpanjanganta($id);
        $pembimbing = Pembimbing::pembimbing($id);

        return view('admin.ta.perpanjangan.view',compact('data','pembimbing'));
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

                Logperpanjanganta::where('id',$id)->update([
                    'status_perpanjangan' => 1,
                ]);
                return redirect(route('admin.perpanjanganta.index'))->with('message','Perubahan judul tugas akhir disetujui.');
                break;
    
            case 'tolak':

                Logperpanjanganta::where('id',$id)->update([
                    'status_perpanjangan' => 0,
                ]);
                return redirect(route('admin.perpanjanganta.index'))->with('message','Perubahan judul tugas akhir ditolak.');
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
