<?php

namespace App\Http\Controllers;

use App\Models\Exitsurvey;
use App\Models\Pendadaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $nim = Auth::user()->nim;
        $data = Pendadaran::setuju($nim)->first();
        $exit = Exitsurvey::where('mahasiswa_id',$data->mahasiswa_id)->first();
        if($exit){
            return view('ta.exitsurvey.thanks');
        }else{
            return view('ta.exitsurvey.index',compact('data'));
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
        $validatedSurvey = $request->validate([
            'mahasiswa_id' => 'required',
            'nama' => 'required',
            'nim' => 'required',
            'email' => 'required',
            'sosmed' => 'nullable',
            'linkedin' => 'nullable',
            'alamat' => 'required',
            'no_hp' => 'required',
            'PB1' => 'required','PB2' => 'required','PB3' => 'required','PB4' => 'required','PB5' => 'required','PB6' => 'required',
            'PB7' => 'required','PB8' => 'required','PB9' => 'required','PB10' => 'required','PB11' => 'required','PB12' => 'required',
            'PB13' => 'required','PB14' => 'required','PB15' => 'required','PB16' => 'required','PB17' => 'required','PB18' => 'required',
            'PB19' => 'required','PB20' => 'required','PB21' => 'required','PB22' => 'required',
            'LP1' => 'required','LP2' => 'required','LP3' => 'required','LP4' => 'required','LP5' => 'required','LP6' => 'required',
            'LP7' => 'required','LP8' => 'required','LP9' => 'required','LP10' => 'required','LP11' => 'required',
            'PGP1' => 'required','PGP2' => 'required','PGP3' => 'required','PGP4' => 'required','PGP5' => 'required',
            'PTA1' => 'required','PTA2' => 'required','PTA3' => 'required','PTA4' => 'required','PTA5' => 'required','PTA6' => 'required',
            'PTA7' => 'required','PTA8' => 'required','PTA9' => 'required','PTA10' => 'required',
        ]);

        // dd($validatedSurvey);

        Exitsurvey::create($validatedSurvey);
        return redirect()->back();
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
