<?php

namespace App\Http\Controllers\Admin\Kp;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Jabatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class PembimbingkpController extends Controller
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
        $data = Mahasiswa::mhskp();
        // dd($data);
        return view('admin.kp.pembimbing.list_pembimbing',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Mahasiswa::select('*','ref_mahasiswa.id')
            ->join('ref_dosen','ref_dosen.id','=','ref_mahasiswa.pem_kp')
            ->where('ref_mahasiswa.id',$id)
            ->firstOrFail();
        $jabatan = Jabatan::kp(); 
        $config = [
            'format' => 'A4-P', // Portrait        
            // 'default_font'         => 'serif',
                'margin_left'          => 30,
                'margin_right'         => 25,
                'margin_top'           => 40,
                'margin_header'         => 5,
                'margin_footer'         => 5,
            // 'margin_bottom'        => 25,
        ];
        
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
        $pdf = PDF::loadview('admin.kp.pembimbing.cetak_pembimbing',compact('data','jabatan','monthList'),[],$config);
        return $pdf->stream();
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
            ->leftJoin('ref_dosen','ref_mahasiswa.pem_kp','=','ref_dosen.id')
            ->where('ref_mahasiswa.id', $id)
            ->first();
        $dosen = Dosen::get();
        //dd($dosen);
        return view('admin.kp.pembimbing.view_pembimbing',compact('data','dosen'));
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
            'pem_kp' => 'required'
        ]);
        Mahasiswa::where('id',$id)->update($validatedMhs);

        return redirect(route('admin.pembimbing.index'))->with('message','Data Pembimbing KP Berhasil di Update!');
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
