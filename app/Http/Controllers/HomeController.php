<?php

namespace App\Http\Controllers;

use App\Models\Kp;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\User;
use App\Models\Seminarkp;
use App\Models\Ta;
use App\Models\Seminarta;
use App\Models\Pendadaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $listkp = Kp::listkp();
        $jumhs = Mahasiswa::jumhs();
        $mhsaktif = Mahasiswa::mhsaktif();
        $mhslulus = Mahasiswa::mhslulus();
        $mhs = Mahasiswa::mhs(Auth::user()->nim)->first();
        $dosen = Dosen::where('nip',Auth::user()->nim)->first();
        $user = User::find(Auth::user()->id);
        // dd($kp);
        if($dosen != null){
            $kp = Kp::where('status_kp','PENDING')->count();
            $semkp = Seminarkp::where('status_seminarkp','PENDING')->count();
            $ta = Ta::where('status_ta','SETUJU')->count();
            $semhas = Seminarta::where('status_seminar','SETUJU')->count();
            $pendadaran = Pendadaran::where('status_pendadaran','SETUJU')->count();
            $tapending = Ta::where('status_ta','PENDING')->count();
            $semhaspending = Seminarta::where('status_seminar','PENDING')->count();
            $pendadaranpending = Pendadaran::where('status_pendadaran','PENDING')->count();
            $bimbinganta = Dosen::bimbinganta($dosen->nip)->where('status_ta','PENDING')->count();
            $bimbingansemhas = Dosen::bimbingansemhas($dosen->nip)->where('status_seminar','PENDING')->count();
            $bimbinganpendadaran = Dosen::bimbinganpendadaran($dosen->nip)->where('status_pendadaran','PENDING')->count();
            $sel = Ta::where('status_ta','PENDING')->where('peminatan_id',1)->count();
            $meka = Ta::where('status_ta','PENDING')->where('peminatan_id',2)->count();
            $ict = Ta::where('status_ta','PENDING')->where('peminatan_id',3)->count();
            // dd($bimbinganpendadaran);
            return view('home',compact('dosen','user','kp','semkp','semhas','pendadaran','ta',
                'tapending','semhaspending','pendadaranpending','ict','meka','sel',
                'bimbinganta','bimbingansemhas','bimbinganpendadaran'));
        }elseif($mhs != null){
            $kp = Kp::statuskp($mhs->id)->first();
            $semkp = Seminarkp::statussemkp($mhs->id)->first();
            $ta = Ta::statusta($mhs->id)->first();
            $semhas = Seminarta::statussemhas($mhs->id)->first();
            $pendadaran = Pendadaran::statuspendadaran($mhs->id)->first();
            // dd($ta);
            return view('home',compact('mhs','user','kp','semkp','ta','semhas','pendadaran'));
        }else{
            return view('errors.errorpem');
        }
        
    }
}