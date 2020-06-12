<?php

namespace App\Http\Controllers\Dosen\Pembimbing;

use App\Models\Dosen;
use App\Models\Nilaipendadaranpembimbing;
use App\Models\Nilaibimbingan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaipendadaranController extends Controller
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
        //
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
            'id_pembimbing' => 'required',
            'a1' => 'required',
            'a2' => 'required',
            'a3' => 'required',
            'a4' => 'required',
            'b1' => 'required',
            'b2' => 'required',
            'b3' => 'required',
            'b4' => 'required',
            'b5' => 'required',
            'c1' => 'required',
            'c2' => 'required',
            'c3' => 'required',
            'revisi' => 'required',
            'n1' => 'required',
            'n2' => 'required',
            'n3' => 'required',
            'n4' => 'required',
            'n5' => 'required',
            'n6' => 'required',
        ]);

        $a = ($request->a1 + $request->a2 + $request->a3 + $request->a4) / 400 * 30;
        $b = ($request->b1 + $request->b2 + $request->b3 + $request->b4 + $request->b5) / 500 * 40;
        $c = ($request->c1 + $request->c2 + $request->c3) / 300 * 30;
        $total = $a + $b + $c;

        Nilaipendadaranpembimbing::Create([
            'ta_pembimbing_id' => $request->id_pembimbing,
            'a1' => $request->a1,
            'a2' => $request->a2,
            'a3' => $request->a3,
            'a4' => $request->a4,
            'b1' => $request->b1,
            'b2' => $request->b2,
            'b3' => $request->b3,
            'b4' => $request->b4,
            'b5' => $request->b5,
            'c1' => $request->c1,
            'c2' => $request->c2,
            'c3' => $request->c3,
            'revisi' => $request->revisi,
            'total' => $total,
        ]);


        $n1 = $request->n1 * 0.1;
        $n2 = $request->n2 * 0.15;
        $n3 = $request->n3 * 0.2;
        $n4 = $request->n4 * 0.2;
        $n5 = $request->n5 * 0.2;
        $n6 = $request->n6 * 0.15;
        $ntotal = $n1 + $n2 + $n3 + $n4 + $n5 + $n6;

        Nilaibimbingan::create([
            'ta_pembimbing_id' => $request->id_pembimbing,
            'n1' => $request->n1,
            'n2' => $request->n2,
            'n3' => $request->n3,
            'n4' => $request->n4,
            'n5' => $request->n5,
            'n6' => $request->n6,
            'total_skripsi' => $ntotal,
        ]);

        return redirect()->back()->with('message','Nilai berhasil disimpan!');
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
        $nilai = Nilaipendadaranpembimbing::where('ta_pembimbing_id', $data->id)->first();
        $bimbingan = Nilaibimbingan::where('ta_pembimbing_id',$data->id)->first();
        if($nilai != null){
            // dd($data);
            return view('dosen.pendadaran.pembimbing.finalisasi',compact('data','nilai','bimbingan'));
        }else{
            return view('dosen.pendadaran.pembimbing.view',compact('data'));
        }
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
        $nilai = Nilaipendadaranpembimbing::where('ta_pembimbing_id', $data->id)->first();
        $bimbingan = Nilaibimbingan::where('ta_pembimbing_id',$data->id)->first();
        if($nilai->status_nilai == 0){
            // dd($data);
            return view('dosen.pendadaran.pembimbing.edit',compact('data','nilai','bimbingan'));
        }else{
            return redirect()->back();
        }
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
            'a1' => 'required',
            'a2' => 'required',
            'a3' => 'required',
            'a4' => 'required',
            'b1' => 'required',
            'b2' => 'required',
            'b3' => 'required',
            'b4' => 'required',
            'b5' => 'required',
            'c1' => 'required',
            'c2' => 'required',
            'c3' => 'required',
            'revisi' => 'required',
            'n1' => 'required',
            'n2' => 'required',
            'n3' => 'required',
            'n4' => 'required',
            'n5' => 'required',
            'n6' => 'required',
        ]);

        $a = ($request->a1 + $request->a2 + $request->a3 + $request->a4) / 400 * 30;
        $b = ($request->b1 + $request->b2 + $request->b3 + $request->b4 + $request->b5) / 500 * 40;
        $c = ($request->c1 + $request->c2 + $request->c3) / 300 * 30;
        $total = $a + $b + $c;

        Nilaipendadaranpembimbing::where('id',$id)->update([
            'a1' => $request->a1,
            'a2' => $request->a2,
            'a3' => $request->a3,
            'a4' => $request->a4,
            'b1' => $request->b1,
            'b2' => $request->b2,
            'b3' => $request->b3,
            'b4' => $request->b4,
            'b5' => $request->b5,
            'c1' => $request->c1,
            'c2' => $request->c2,
            'c3' => $request->c3,
            'revisi' => $request->revisi,
            'total' => $total,
        ]);


        $n1 = $request->n1 * 0.1;
        $n2 = $request->n2 * 0.15;
        $n3 = $request->n3 * 0.2;
        $n4 = $request->n4 * 0.2;
        $n5 = $request->n5 * 0.2;
        $n6 = $request->n6 * 0.15;
        $ntotal = $n1 + $n2 + $n3 + $n4 + $n5 + $n6;

        Nilaibimbingan::where('id',$request->id_nilaibimbingan)->update([
            'n1' => $request->n1,
            'n2' => $request->n2,
            'n3' => $request->n3,
            'n4' => $request->n4,
            'n5' => $request->n5,
            'n6' => $request->n6,
            'total_skripsi' => $ntotal,
        ]);

        return redirect(route('dosen.pendadaran.index'))->with('message','Update Nilai berhasil disimpan!');
    }

    public function finalisasi(Request $request, $id)
    {
        Nilaipendadaranpembimbing::where('id',$id)->update([
            'status_nilai' => 1,
        ]);

        return redirect()->back()->with('message','Nilai telah di Submit.');
    }

    public function updateStatus(Request $request)
    {
        $pem = Nilaipendadaranpembimbing::findOrFail($request->pem_id);
        $pem->status_nilai = $request->status;
        $pem->save();

        // return redirect()->back();
        return response()->json(['message' => 'User status updated successfully.']);
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
