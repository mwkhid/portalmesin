<?php

namespace App\Http\Controllers\Admin\Pembatalanta;

use App\Models\Ta;
use App\Models\Pembimbing;
use App\Models\Logpembatalanta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $data = Ta::pembatalanta();

        return view('admin.ta.pembatalan.index', compact('data'));
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
        $data = Ta::getpembatalanta($id);
        $pembimbing = Pembimbing::pembimbing($id);

        return view('admin.ta.pembatalan.view', compact('data','pembimbing'));
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
                Logpembatalanta::where('id',$id)->update([
                    'status_pembatalan' => 1,
                ]);
                Ta::where('id',$request->ta_id)->update([
                    'status_ta' => 'BATAL',
                ]);
                return redirect(route('admin.pembatalanta.index'))->with('message','Pembatalan tugas akhir disetujui!');
                break;
            
            case 'tolak':
                Logpembatalanta::where('id',$id)->update([
                    'status_pembatalan' => 0,
                ]);
                return redirect(route('admin.pembatalanta.index'))->with('message','Pembatalan tugas akhir ditolak!');
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
