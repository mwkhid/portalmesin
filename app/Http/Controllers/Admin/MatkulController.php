<?php

namespace App\Http\Controllers\Admin;

use App\Models\Matakuliah;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MatkulController extends Controller
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
        $data = Matakuliah::all();
        // dd($data);
        return view('admin.matkul.list_matkul',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.matkul.buat_matkul');
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
            'kode' => 'required',
            'nama' => 'required',
            'sks' => 'required',
            'status' => 'required',
        ]);
        // dd($validatedData);
        Matakuliah::create($validatedData);
        return redirect(route('admin.matkul.index'))->with('message','Mata Kuliah Baru Berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Matakuliah::find($id);
        return view('admin.matkul.view_matkul',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Matakuliah::find($id);
        return view('admin.matkul.edit_matkul',compact('data'));
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
            'kode' => 'required',
            'nama' => 'required',
            'sks' => 'required',
            'status' => 'required',
        ]);
        // dd($validatedData);
        Matakuliah::where('id',$id)->update($validatedData);
        return redirect(route('admin.matkul.index'))->with('message','Mata Kuliah Baru Berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $matkul = Matakuliah::findOrFail($request->matkul_id);
        $matkul->delete();

        return redirect(route('admin.matkul.index'))->with('message','Mata Kuliah Berhasil di Hapus!');
    }
}
