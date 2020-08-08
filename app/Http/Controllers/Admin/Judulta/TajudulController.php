<?php

namespace App\Http\Controllers\Admin\Judulta;

use App\Models\Ta;
use App\Models\Pembimbing;
use App\Models\Logta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TajudulController extends Controller
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
        $data = Ta::judulta();
        // dd($data);
        return view('admin.ta.judulta.index',compact('data'));
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
        $data = Ta::getjudulta($id);
        $pembimbing = Pembimbing::pembimbing($id);
        return view('admin.ta.judulta.view',compact('data','pembimbing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Ta::getjudulta($id);
        $pembimbing = Pembimbing::pembimbing($id);
        // dd($data);
        return view('admin.ta.judulta.view',compact('data','pembimbing'));
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
        
                $validatedData =$request->validate([
                    'judul_lama' => 'required',
                    'judul_baru' => 'required',
                ]);
                // dd($validatedData);
                Logta::where('id',$id)->update([
                    'status_judul' => 1,
                ]);
                
                Ta::where('id',$request->ta_id)->update([
                    'judul' => $request->judul_baru,
                ]);

                Pembimbing::where('ta_id',$request->ta_id)->update([
                    'status_perubahanjudul' => 1,
                ]);
        
                return redirect(route('admin.perubahanjudul.index'))->with('message','Perubahan judul tugas akhir disetujui.');
                break;
    
            case 'tolak':

                Logta::where('id',$id)->update([
                    'status_judul' => 0,
                ]);
                return redirect(route('admin.perubahanjudul.index'))->with('message','Perubahan judul tugas akhir ditolak.');
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
