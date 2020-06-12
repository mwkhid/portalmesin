<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AkademikController extends Controller
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
        $data = Mahasiswa::pembimbing();
        // dd($data);
        return view('admin.akademik.list_pembimbing',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Mahasiswa::find($id)
            ->select('*','ref_mahasiswa.id')
            ->leftJoin('ref_dosen','ref_mahasiswa.pem_akademik','=','ref_dosen.id')
            ->where('ref_mahasiswa.id', $id)
            ->first();

        return view('admin.akademik.view_pembimbing',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Mahasiswa::find($id)
            ->select('*','ref_mahasiswa.id')
            ->leftJoin('ref_dosen','ref_mahasiswa.pem_akademik','=','ref_dosen.id')
            ->where('ref_mahasiswa.id', $id)
            ->first();
        $dosen = Dosen::all();
        //dd($dosen);
        return view('admin.akademik.edit_pembimbing',compact('data','dosen'));
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
        $validatedMhs = $request->validate([
            'pem_akademik' => 'required'
        ]);
        Mahasiswa::where('id',$id)->update($validatedMhs);

        return redirect(route('admin.akademik.index'))->with('message','Data Pembimbing KP Berhasil di Update!');
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
