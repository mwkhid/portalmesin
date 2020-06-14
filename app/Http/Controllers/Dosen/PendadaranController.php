<?php

namespace App\Http\Controllers\Dosen;

use App\Models\Dosen;
use App\Models\Ta;
use App\Models\Pembimbing;
use App\Models\Penguji;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendadaranController extends Controller
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
        $data = Dosen::bimbinganpendadaran(Auth::user()->nim);
        $data2 = Dosen::pengujipendadaran(Auth::user()->nim);
        // dd($data);
        return view('dosen.pendadaran.index',compact('data','data2'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Dosen::getbimbinganpendadaran($id,Auth::user()->nim);
        $matkul = Ta::matkul($id);
        $pembimbing = Pembimbing::pembimbing($id);
        $penguji = Penguji::pengujipendadaran($id);
        // dd($data);
        return view('dosen.pendadaran.view',compact('data','pembimbing','matkul','penguji'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Dosen::getbimbinganpendadaran($id,Auth::user()->nim);
        $matkul = Ta::matkul($id);
        $pembimbing = Pembimbing::pembimbing($id);
        // dd($data);
        return view('dosen.pendadaran.edit',compact('data','pembimbing','matkul'));
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
        $validatedData = $request->validate([
            'id_pembimbing' => 'required',
        ]);

        switch ($request->input('action')) {
            case 'setuju':
                Pembimbing::where([
                    ['id', '=', $id],
                    ['pembimbing', '=', $request->id_pembimbing]
                ])->update([
                    'status_pendadaranpem' => 'SETUJU',
                ]);
                return redirect(route('dosen.pendadaran.index'))->with('message','Update Data Pembimbing Berhasil!');
                break;
    
            case 'tolak':
                Pembimbing::where([
                    ['id', '=', $id],
                    ['pembimbing', '=', $request->id_pembimbing]
                ])->update([
                    'status_pendadaranpem' => 'TOLAK',
                ]);
                return redirect(route('dosen.pendadaran.index'))->with('message','Update Data Pembimbing Berhasil!');
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
