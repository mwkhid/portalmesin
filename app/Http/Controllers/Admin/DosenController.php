<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dosen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DosenController extends Controller
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
        $data = Dosen::All();
        // dd($data);
        return view('admin.dosen.list_dosen',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dosen.buat_dosen');
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
            'kode_dosen' => 'required',
            'nip' => 'required',
            'nama_dosen' => 'required',
            'status_dosen' => 'required',
        ]);
        // dd($validatedData);
        Dosen::create($validatedData);
        return redirect(route('admin.dosen.index'))->with('message','Dosen Baru Berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Dosen::find($id);
        // dd($data);
        return view('admin.dosen.view_dosen',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Dosen::find($id);
        // dd($data);
        return view('admin.dosen.edit_dosen',compact('data'));
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
            'kode_dosen' => 'required',
            'nama_dosen' => 'required',
            'nip' => 'required',
            'status_dosen' => 'required',
        ]);
        // dd($validatedData);
        Dosen::where('id', $id)->update($validatedData);
        return redirect(route('admin.dosen.index'))->with('message','Data Dosen Berhasil di Update!');
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
