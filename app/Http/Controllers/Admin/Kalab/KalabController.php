<?php

namespace App\Http\Controllers\Admin\Kalab;

use App\Models\Pendadaran;
use App\Models\Mahasiswa;
use App\Models\Bebaslab;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;

class KalabController extends Controller
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
        $data = Mahasiswa::Mhslulusrevisi();
        // dd($data);
        return view('admin.kalab.index',compact('data'));
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
        if (Gate::allows('kalabgetaran')) {
            Bebaslab::updateOrCreate(['mahasiswa_id' => $id],[
                'kalab_getaran' => 1,
                'tgl_kalab_getaran' => date('Y-m-d'),
            ]);
        }elseif(Gate::allows('laborangetaran')) {
            Bebaslab::updateOrCreate(['mahasiswa_id' => $id],[
                'laboran_getaran' => 1,
                'tgl_laboran_getaran' => date('Y-m-d'),
            ]);
        }elseif(Gate::allows('kalabperancangan')) {
            Bebaslab::updateOrCreate(['mahasiswa_id' => $id],[
                'kalab_perancangan' => 1,
                'tgl_kalab_perancangan' => date('Y-m-d'),
            ]);
        }elseif(Gate::allows('kalabmekanika')) {
            Bebaslab::updateOrCreate(['mahasiswa_id' => $id],[
                'kalab_mekanika' => 1,
                'tgl_kalab_mekanika' => date('Y-m-d'),
            ]);
        }elseif(Gate::allows('laboranmekanika')) {
            Bebaslab::updateOrCreate(['mahasiswa_id' => $id],[
                'laboran_meknaika' => 1,
                'tgl_laboran_mekanika' => date('Y-m-d'),
            ]);
        }elseif(Gate::allows('kalabmotor')) {
            Bebaslab::updateOrCreate(['mahasiswa_id' => $id],[
                'kalab_motor' => 1,
                'tgl_kalab_motor' => date('Y-m-d'),
            ]);
        }elseif(Gate::allows('laboranmotor')) {
            Bebaslab::updateOrCreate(['mahasiswa_id' => $id],[
                'laboran_motor' => 1,
                'tgl_laboran_motor' => date('Y-m-d'),
            ]);
        }elseif(Gate::allows('kalabpanas')) {
            Bebaslab::updateOrCreate(['mahasiswa_id' => $id],[
                'kalab_panas' => 1,
                'tgl_kalab_panas' => date('Y-m-d'),
            ]);
        }elseif(Gate::allows('laboranpanas')) {
            Bebaslab::updateOrCreate(['mahasiswa_id' => $id],[
                'laboran_panas' => 1,
                'tgl_laboran_panas' => date('Y-m-d'),
            ]);
        }elseif(Gate::allows('kalabproduksi')) {
            Bebaslab::updateOrCreate(['mahasiswa_id' => $id],[
                'kalab_produksi' => 1,
                'tgl_kalab_produksi' => date('Y-m-d'),
            ]);
        }elseif(Gate::allows('laboranproduksi')) {
            Bebaslab::updateOrCreate(['mahasiswa_id' => $id],[
                'laboran_produksi' => 1,
                'tgl_laboran_produksi' => date('Y-m-d'),
            ]);
        }elseif(Gate::allows('kalabotomasi')) {
            Bebaslab::updateOrCreate(['mahasiswa_id' => $id],[
                'kalab_otomasi' => 1,
                'tgl_kalab_otomasi' => date('Y-m-d'),
            ]);
        }elseif(Gate::allows('laboranotomasi')) {
            Bebaslab::updateOrCreate(['mahasiswa_id' => $id],[
                'laboran_otomasi' => 1,
                'tgl_laboran_otomasi' => date('Y-m-d'),
            ]);
        }elseif(Gate::allows('kalabmaterial')) {
            Bebaslab::updateOrCreate(['mahasiswa_id' => $id],[
                'kalab_material' => 1,
                'tgl_kalab_material' => date('Y-m-d'),
            ]);
        }elseif(Gate::allows('laboranmaterial')) {
            Bebaslab::updateOrCreate(['mahasiswa_id' => $id],[
                'laboran_material' => 1,
                'tgl_laboran_material' => date('Y-m-d'),
            ]);
        }elseif(Gate::allows('kalabpengecoran')) {
            Bebaslab::updateOrCreate(['mahasiswa_id' => $id],[
                'kalab_pengecoran' => 1,
                'tgl_kalab_pengecoran' => date('Y-m-d'),
            ]);
        }elseif(Gate::allows('kalabnano')) {
            Bebaslab::updateOrCreate(['mahasiswa_id' => $id],[
                'kalab_nano' => 1,
                'tgl_kalab_nano' => date('Y-m-d'),
            ]);    
        }elseif(Gate::allows('kalabenergi')) {
            Bebaslab::updateOrCreate(['mahasiswa_id' => $id],[
                'kalab_energi' => 1,
                'tgl_kalab_energi' => date('Y-m-d'),
            ]);
        }elseif(Gate::allows('laboranenergi')) {
            Bebaslab::updateOrCreate(['mahasiswa_id' => $id],[
                'laboran_energi' => 1,
                'tgl_laboran_energi' => date('Y-m-d'),
            ]);
        }else{
            dd('Bukan Kalab');
        }

        return redirect()->back()->with('message','Surat Bebas Lab Berhasil Disetujui!');
    }
}
