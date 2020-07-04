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
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    //Controller Dashboard Ketika User Login
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
        //Cek apakah user login pertama kali atau tidak, jika tidak makan redirect ke home
        if($user->isLogin == 1){
            //Cek apakah user dosen atau bukan
            if($dosen != null){
                $kp = Kp::where('status_kp','PENDING')->count();
                $semkp = Seminarkp::where('status_seminarkp','PENDING')->count();
                $ta = Ta::where('status_ta','SETUJU')->where('cetak_ta','0')->count();
                $semhas = Seminarta::where('status_seminar','SETUJU')->where('cetak_semhas','0')->count();
                $pendadaran = Pendadaran::where('status_pendadaran','SETUJU')->where('cetak_pendadaran','0')->count();
                $tapending = Ta::where('status_ta','PENDING')->count();
                $semhaspending = Seminarta::where('status_seminar','PENDING')->count();
                $pendadaranpending = Pendadaran::where('status_pendadaran','PENDING')->count();
                $bimbinganta = Dosen::bimbinganta($dosen->nip)->where('status_ta','PENDING')->count();
                $bimbingansemhas = Dosen::bimbingansemhas($dosen->nip)->where('status_seminar','PENDING')->count();
                $bimbinganpendadaran = Dosen::bimbinganpendadaran($dosen->nip)->where('status_pendadaran','PENDING')->count();
                $sel = Ta::where('status_ta','PENDING')->where('peminatan_id',1)->count();
                $meka = Ta::where('status_ta','PENDING')->where('peminatan_id',2)->count();
                $ict = Ta::where('status_ta','PENDING')->where('peminatan_id',3)->count();
                $logbookta1 = Dosen::bimbinganlogbookta($dosen->nip)->where('status_logbook1',2)->where('pem',1)->count();
                $logbookta2 = Dosen::bimbinganlogbookta($dosen->nip)->where('status_logbook2',2)->where('pem',2)->count();
                $logbookta = $logbookta1 + $logbookta2;
                // dd($logbookta);
                return view('home',compact('dosen','user','kp','semkp','semhas','pendadaran','ta',
                    'tapending','semhaspending','pendadaranpending','ict','meka','sel',
                    'bimbinganta','bimbingansemhas','bimbinganpendadaran','logbookta'));
            //Cek apakah user mahasiswa
            }elseif($mhs != null){
                $kp = Kp::statuskp($mhs->id)->get()->last();
                $semkp = Seminarkp::statussemkp($mhs->id)->first();
                $ta = Ta::statusta($mhs->id)->first();
                $semhas = Seminarta::statussemhas($mhs->id)->first();
                $pendadaran = Pendadaran::statuspendadaran($mhs->id)->first();
                // dd($ta);
                return view('home',compact('mhs','user','kp','semkp','ta','semhas','pendadaran'));
            //Cek apabila mahasiswa tidak memiliki pembimbing akademik akan redirect error
            }else{
                return view('errors.pemakademik');
            }
        //Cek apabila user belum pernah login maka akan diarahkan untuk mengubah password
        }else{
            return view('password',compact('user'));
        }
        
    }

    public function password(){
        //Menampilkan view pergantian password apabila user belum pernah login
        $user = User::find(Auth::user()->id);
        if($user->isLogin == 1){
            return redirect(route('home'));
        }else{
            return view('password',compact('user'));
        }
    }

    public function passstore(Request $request, $id){
        //fungsi store data password baru pengganti password lama ketika pertama login
        $validatedData = $this->validate($request, [
            'password' => 'required|min:8|confirmed',
        ]);
        
        $data = User::find($id);

        if (Hash::check($request->password, $data->password)) {
            return back()->with('alert', 'Password tidak boleh sama dengan password lama.');
        } else {
            $data->password = Hash::make($request->password);
            $data->isLogin = '1';
            // dd($data);
            $data->save();

            return redirect()->route('home');
        }
    }
}