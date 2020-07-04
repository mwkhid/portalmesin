<?php

namespace App\Http\Controllers;

use App\Models\Ta;
use App\Models\Logpembatalanta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TapembatalanController extends Controller
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
        $data = Ta::setuju($nim)->first();
        if($data != null){
            $listpembatalan = Ta::pembatalantasetuju($nim)->get();
            return view('ta.pembatalan.index', compact('data','listpembatalan'));
        }else{
            return view('ta.error.seminar');
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
        $validatedData = $request->validate([
            'ta_id' => 'required',
            'pembatalan_alasan' => 'required',
        ]);

        Logpembatalanta::create($validatedData);
        return redirect(route('ta.pembatalan.index'))->with('message','Pembatalan Tugas Akhir Berhasil di Ajukan!');
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
