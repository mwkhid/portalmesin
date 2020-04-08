<?php

namespace App\Http\Controllers\Admin;

use App\Models\Peminatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeminatanController extends Controller
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
        $data = Peminatan::All();
        // dd($data);
        return view('admin.peminatan.list_peminatan',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.peminatan.buat_peminatan');
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
            'tahun' => 'required',
            'kode' => 'required',
            'nama_peminatan' => 'required',
        ]);
        // dd($validatedData);
        Peminatan::create($validatedData);
        return redirect(route('admin.peminatan.index'))->with('message','Peminatan Baru Berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Peminatan::find($id);
        return view('admin.peminatan.view_peminatan',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Peminatan::find($id);
        return view('admin.peminatan.edit_peminatan',compact('data'));
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
            'tahun' => 'required',
            'kode' => 'required',
            'nama_peminatan' => 'required',
        ]);

        Peminatan::where('id',$id)->update($validatedData);
        return redirect(route('admin.peminatan.index'))->with('message','Peminatan berhasil di Update!');
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
