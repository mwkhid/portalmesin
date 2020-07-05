<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Seminarkp extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kp_seminar';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = ['perusahaan_nama','perusahaan_almt','perusahaan_jenis','pic','tgl_mulai_kp','tgl_selesai_kp'];

    protected $guarded = [];

    //Eloquent Relationship terhadap Tabel KP
    public function kp(){
        return $this->belongsTo('App\Models\Kp');
    }

    //Digunakan di Seminarkp Controller
    public function scopePending($query,$nim){
        return $query->join('kp','kp.id','=','kp_seminar.kp_id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
        ->join('ref_ruang','kp_seminar.ruang_id','=','ref_ruang.id')
        ->where('nim',$nim)
        ->where('status_kp','SETUJU')
        ->where('status_seminarkp','PENDING')
        ->select('*','kp_seminar.id','kp.sks','kp.ipk');
    }

    //Digunakan di Seminarkp Controller
    public function scopeSetuju($query,$nim){
        return $query->join('kp','kp.id','=','kp_seminar.kp_id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
        ->join('ref_ruang','kp_seminar.ruang_id','=','ref_ruang.id')
        ->where('nim',$nim)
        ->where('status_kp','SETUJU')
        ->where('status_seminarkp','SETUJU')
        ->select('*','kp_seminar.id','kp.sks','kp.ipk');
    }

    //Digunakan di Seminarkp Controller
    public function scopeTolak($query,$nim){
        return $query->join('kp','kp.id','=','kp_seminar.kp_id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
        ->join('ref_ruang','kp_seminar.ruang_id','=','ref_ruang.id')
        ->where('nim',$nim)
        ->where('status_kp','SETUJU')
        ->where('status_seminarkp','TOLAK')
        ->select('*','kp_seminar.id','kp.sks','kp.ipk');
    }

    //Digunakan di Semkp Controller
    public function scopePengajuan($query,$nim){
        return $query->where('nim',$nim)
            ->join('kp','kp.id','=','kp_seminar.kp_id')
            ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
            ->join('ref_ruang','kp_seminar.ruang_id','=','ref_ruang.id')
            ->where('status_kp','SETUJU')
            ->where('status_seminarkp','PENDING')
            ->select('*','kp_seminar.id','kp.sks','kp.ipk')
            ->firstOrFail();
    }
    
    //Digunakan di SemkpController
    public function scopeDaftarhadir($query,$nim){
        return $query->where('nim',$nim)
            ->join('kp','kp.id','=','kp_seminar.kp_id')
            ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
            ->join('ref_ruang','kp_seminar.ruang_id','=','ref_ruang.id')
            ->join('ref_dosen','ref_mahasiswa.pem_kp','=','ref_dosen.id')
            ->where('status_kp','SETUJU')
            ->where('status_seminarkp','SETUJU')
            ->firstOrFail();
    }

    //Digunakan di Seminarkp Controller (Admin)
    public function scopeUndangan($query,$id){
        return $query->where('kp_seminar.id',$id)
            ->join('kp','kp.id','=','kp_seminar.kp_id')
            ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
            ->join('ref_ruang','kp_seminar.ruang_id','=','ref_ruang.id')
            ->join('ref_dosen','ref_mahasiswa.pem_kp','=','ref_dosen.id')
            ->where('status_kp','SETUJU')
            ->where('status_seminarkp','SETUJU')
            ->select('*','kp_seminar.updated_at','kp_seminar.created_at')
            ->firstOrFail();
    }

    //Digunakan di SeminarkpController
    public function scopeSemkp($query){
        return $query->join('kp','kp.id','=','kp_seminar.kp_id')
        ->join('ref_mahasiswa','kp.mahasiswa_id','=','ref_mahasiswa.id')
        ->join('ref_ruang','ref_ruang.id','=','kp_seminar.ruang_id')
        ->select('*','kp_seminar.id')
        ->orderBy('kp_seminar.created_at','desc')
        ->get();
    }

    public function scopeGetsemkp($query,$id){
        return $query->join('kp','kp.id','=','kp_seminar.kp_id')
        ->join('ref_mahasiswa','kp.mahasiswa_id','=','ref_mahasiswa.id')
        ->join('ref_ruang','ref_ruang.id','=','kp_seminar.ruang_id')
        ->select('*','kp_seminar.id')
        ->where('kp_seminar.id',$id)
        ->firstOrFail();
    }

    //Digunakan di DashController
    public function scopeListseminarkp($query){
        return $query->join('kp','kp.id','=','kp_seminar.kp_id')
            ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
            ->join('ref_ruang','ref_ruang.id','=','kp_seminar.ruang_id')
            ->select('*','kp_seminar.id')
            ->where('status_kp','SETUJU')
            ->where('status_seminarkp','SETUJU')
            ->orderBy('tanggal_seminar', 'desc')
            ->get();
    }

    //Digunakan di Presensi & Laporan & NIalikp
    public function scopeSemkpsetuju($query){
        return $query->join('kp','kp.id','=','kp_seminar.kp_id')
            ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
            ->join('ref_ruang','ref_ruang.id','=','kp_seminar.ruang_id')
            ->join('kp_dokumen','kp_dokumen.kp_id','=','kp.id')
            ->select('*','kp_seminar.id')
            ->where('status_kp','SETUJU')
            ->where('status_seminarkp','SETUJU')
            ->orderBy('kp_seminar.created_at','desc')
            ->get();
    }

    //Digunakan di NilaikpController
    public function scopeNilaikp($query){
        return $query->join('kp','kp.id','=','kp_seminar.kp_id')
            ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
            ->join('ref_ruang','ref_ruang.id','=','kp_seminar.ruang_id')
            ->join('kp_dokumen','kp_dokumen.kp_id','=','kp.id')
            ->join('kp_nilai','kp_nilai.kp_id','=','kp.id')
            ->select('*','kp_seminar.id')
            ->where('status_kp','SETUJU')
            ->where('status_seminarkp','SETUJU')
            ->orderBy('kp_seminar.created_at','desc')
            ->get();
    }
    //Digunakan di HomeController
    public function scopeStatussemkp($query, $id){
        return $query->where('mahasiswa_id',$id)
            ->join('kp','kp.id','=','kp_seminar.kp_id')
            ->select('*');
    }

    //Digunakan di ListController (Semkp)
    // public function selesai_kp()
    // {
    //     return Carbon::createFromTimestamp(strtotime($this->tgl_selesai_kp))->addDays(90)->format('Y-m-d');
    // }
}
