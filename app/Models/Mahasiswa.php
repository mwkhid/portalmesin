<?php

namespace App\Models;

use App\Models\Kp;
use App\Models\Exitsurvey;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ref_mahasiswa';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $fillable = ['sks','ipk'];
    protected $guarded = [];

    public $timestamps = false;

    //Relasi dengan tabel Kp
    public function kp(){
        return $this->hasOne('App\Models\Kp');
    }

    //Relasi dengan tabel TA
    public function ta(){
        return $this->hasOne('App\Models\Ta');
    }

    //Digunakan Untuk Mengecek Pembimbing KP (KpController)
    public function scopePemkp($query, $nim){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_mahasiswa.pem_kp')
        ->where('nim',$nim)
        ->select('*','ref_mahasiswa.id');
    }

    //Digunakan untuk mengecek mahasiswa sudah memiliki pembimbing akademik
    public function scopeMhs($query,$nim){
        return $query->where('nim',$nim)
                    ->join('ref_dosen','ref_mahasiswa.pem_akademik','=','ref_dosen.id')
                    ->select('*','ref_mahasiswa.id');
    }

    //Digunakan di MahasiswaController
    public function scopeMhsall($query){
        return $query->orderBy('nim','desc')->get();
    }

    //Digunakan di MahasiswaController
    public function scopePembimbing($query){
        return $query->leftJoin('ref_dosen','ref_mahasiswa.pem_akademik','=','ref_dosen.id')
        ->select('*','ref_mahasiswa.id')->orderBy('nim', 'desc')->get();
    }

    //Digunakan di HomeController
    public function scopeJumhs($query){
        return $query->count();
    }

    //Digunakan di HomeController
    public function scopeMhsaktif($query){
        return $query->where('status_mhs','AKTIF')->count();
    }

    //Digunakan di HomeController
    public function scopeMhslulus($query){
        return $query->where('status_mhs','LULUS')->count();
    }

    //Digunakan di PembimbingkpController
    public function scopeMhskp($query){
        return $query->leftJoin('ref_dosen','ref_mahasiswa.pem_kp','=','ref_dosen.id')
                    ->select('nama_mhs','nim','nama_dosen','ref_mahasiswa.id','pem_kp')
                    ->orderBy('nim','desc')
                    ->get();
    }

    //Digunakan di Kaprodi/kp/index
    public function statusKp($mhsid){
        return Kp::join('ref_mahasiswa','kp.mahasiswa_id','=','ref_mahasiswa.id')
        ->where('ref_mahasiswa.id', $mhsid)->get();
    }

    public function statusExitsurvey($mhsid){
        return Exitsurvey::join('ref_mahasiswa','ref_mahasiswa.id','=','exit_survey.mahasiswa_id')
        ->where('ref_mahasiswa.id',$mhsid)->first();
    }

    //Digunakan di KalabController
    public function scopeMhslulusrevisi($query){
        return $query->join('ta','ref_mahasiswa.id','=','ta.mahasiswa_id')
            ->where('ta.proses_ta',4)->get();
    }

    //Digunkan di admin/kalab/index
    public function statusBebaslab($id){
        return Bebaslab::join('ref_mahasiswa','ref_mahasiswa.id','=','bebas_lab.mahasiswa_id')
            ->where('mahasiswa_id',$id)->get();
    }
    
    //Digunkan di dosen/draft/index
    public function statusHalpengesahan($id){
        return Halpengesahan::join('ref_mahasiswa','ref_mahasiswa.id','=','hal_pengesahan.mahasiswa_id')
            ->where('mahasiswa_id',$id)->get();
    }
    
}
