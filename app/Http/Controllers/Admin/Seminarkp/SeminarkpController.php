<?php

namespace App\Http\Controllers\Admin\Seminarkp;

use App\Models\Seminarkp;
use App\Models\Jabatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class SeminarkpController extends Controller
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
        $data = Seminarkp::semkp();
        // dd($data);
        return view('admin.semkp.list_semkp',compact('data'));
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
        // $nim = Auth::user()->nim;
        $data= Seminarkp::undangan($id);
        $kp = Jabatan::kp();
		$dayList = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
        );

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

        $config = [
            'format' => 'A4-P', // Portrait
             'margin_left'          => 30,
             'margin_right'         => 25,
             'margin_top'           => 35,
             'margin_footer'         => 5,
            // 'margin_bottom'        => 25,
          ];
        //   dd($data);
        $pdf = PDF::loadview('admin.semkp.cetak_undangan',compact('data','dayList','monthList','kp'),[],$config);
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
        $data = Seminarkp::find($id)
        ->join('kp','kp.id','=','seminar_kp.kp_id')
        ->join('mahasiswa','kp.mahasiswa_id','=','mahasiswa.id')
        ->join('ref_ruang','ref_ruang.id','=','seminar_kp.ruang_id')
        ->select('*','seminar_kp.id')
        ->where('seminar_kp.id',$id)
        ->firstOrFail();
        // dd($data);

        return view('admin.semkp.view_semkp',compact('data'));
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
                Seminarkp::where('seminar_kp.id',$id)->update([
                    'status_seminarkp' =>'SETUJU'
                ]);
                return redirect(route('admin.seminarkp.index'))->with('message','Pengajuan Seminar KP Berhasil di Update!');
                break;
    
            case 'tolak':
                Seminarkp::where('seminar_kp.id',$id)->update([
                    'status_seminarkp' =>'TOLAK'
                ]);
                return redirect(route('admin.seminarkp.index'))->with('message','Pengajuan Seminar KP Berhasil di Update!');
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
