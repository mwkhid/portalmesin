<?php

namespace App\Http\Controllers\Dosen;

use App\Models\Tawaran;
use App\Models\Dosen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TawaranController extends Controller
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
        $data = Tawaran::tawarandosen(Auth::user()->nim);
        // dd($data);
        return view('dosen.tawaran.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dosen = Dosen::where('nip',Auth::user()->nim)->first();
        // dd($dosen);
        return view('dosen.tawaran.create',compact('dosen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'dosen_id' => 'required',
            'jenis_topik' => 'required',
            'nama_proyek' => 'required',
            'judul_topik' => 'required',
            'penjelasan' => 'required',
            'hardware' => 'required',
            'software' => 'required',
        ]);
        // dd($validateData);
        Tawaran::create($validateData);
        return redirect(route('dosen.tawaran.index'))->with('message','Tawaran Topik TA berhasil di Buat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Tawaran::find($id);
        return view('dosen.tawaran.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Tawaran::find($id);
        return view('dosen.tawaran.edit', compact('data'));
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
        $validateData = $request->validate([
            'dosen_id' => 'required',
            'jenis_topik' => 'required',
            'nama_proyek' => 'required',
            'judul_topik' => 'required',
            'penjelasan' => 'required',
            'hardware' => 'required',
            'software' => 'required',
        ]);

        Tawaran::where('id',$id)->update($validateData);
        return redirect(route('dosen.tawaran.index'))->with('message','Tawaran Topik TA berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $tawaran = Tawaran::findOrFail($request->tawaran_id);
        // dd($tawaran);
        $tawaran->delete();

        return redirect(route('dosen.tawaran.index'))->with('message','Tawaran Topik TA berhasil di Hapus!');
    }
}
