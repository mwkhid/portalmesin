<?php

namespace App\Http\Controllers\Admin\Ta;

use App\Models\Pendadaran;
use App\Models\Mahasiswa;
use App\Models\Exitsurvey;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExitsurveyController extends Controller
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
        $data = Mahasiswa::where('status_mhs','LULUS')
        ->orderBy('nim','desc')->get();
        // dd($data);
        return view('admin.ta.exitsurvey.index',compact('data'));
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
        $data = Exitsurvey::where('mahasiswa_id',$id)->first();
        // dd($data);
        if($data){
            return view('admin.ta.exitsurvey.show',compact('data'));
        }
        return view('admin.ta.exitsurvey.beluminput');
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
        Exitsurvey::where('mahasiswa_id',$id)->update([
            'acc_koorta' => 1,
        ]);

        return redirect()->back()->with('message','Exit Survey Berhasil Disetujui');
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
