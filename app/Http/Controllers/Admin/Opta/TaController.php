<?php

namespace App\Http\Controllers\Admin\Opta;

use App\Models\Ta;
use App\Models\Jabatan;
use App\Models\Pembimbing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class TaController extends Controller
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
        $data = Ta::surattugas();
        return view('admin.opta.ta.index',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $cetak_ta = $this->cetak_ta($id);
        $data = Ta::get_ta($id)->first();
        $matkul = Ta::matkul($id);
        $pembimbing = Pembimbing::pembimbing($id);
        //dd($pembimbing);
        $config = [
            'format' => 'A4-P', // Portrait
             'margin_left'          => 30,
             'margin_right'         => 25,
             'margin_top'           => 42,
             'margin_header'         => 5,
             'margin_footer'         => 5,
            // 'margin_bottom'        => 25,
        ];
        $kaprodi = Jabatan::kaprodi();

        $monthList = array(
            'Jan' => 'Januari',
            'Feb' => 'Februari',
            'Mar' => 'Maret',
            'Apr' => 'April',
            'May' => 'Mei',
            'Jun' => 'Juni',
            'Jul' => 'Juli',
            'Aug' => 'Agustus',
            'Sep' => 'September',
            'Oct' => 'Oktober',
            'Nov' => 'November',
            'Dec' => 'Desember',
        );

        $pdf = PDF::loadview('admin.opta.ta.cetak_surattugas',compact('data','matkul','pembimbing','monthList','kaprodi'),[],$config);
        return $pdf->stream();
    }

    public function cetak_ta($id){
        Ta::where('id',$id)->update([
            'cetak_ta' => 1,
        ]);
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
