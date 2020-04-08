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
    protected $table = 'seminar_kp';

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
        return $query->join('kp','kp.id','=','seminar_kp.kp_id')
        ->join('mahasiswa','mahasiswa.id','=','kp.mahasiswa_id')
        ->join('ref_ruang','seminar_kp.ruang_id','=','ref_ruang.id')
        ->where('nim',$nim)
        ->where('status_kp','SETUJU')
        ->where('status_seminarkp','PENDING')
        ->select('*','seminar_kp.id');
    }

    //Digunakan di Seminarkp Controller
    public function scopeSetuju($query,$nim){
        return $query->join('kp','kp.id','=','seminar_kp.kp_id')
        ->join('mahasiswa','mahasiswa.id','=','kp.mahasiswa_id')
        ->join('ref_ruang','seminar_kp.ruang_id','=','ref_ruang.id')
        ->where('nim',$nim)
        ->where('status_kp','SETUJU')
        ->where('status_seminarkp','SETUJU')
        ->select('*','seminar_kp.id');
    }

    //Digunakan di Seminarkp Controller
    public function scopeTolak($query,$nim){
        return $query->join('kp','kp.id','=','seminar_kp.kp_id')
        ->join('mahasiswa','mahasiswa.id','=','kp.mahasiswa_id')
        ->join('ref_ruang','seminar_kp.ruang_id','=','ref_ruang.id')
        ->where('nim',$nim)
        ->where('status_kp','SETUJU')
        ->where('status_seminarkp','TOLAK')
        ->select('*','seminar_kp.id');
    }

    //Digunakan di Seminarkp Controller
    public function scopePengajuan($query,$nim){
        return $query->where('nim',$nim)
            ->join('kp','kp.id','=','seminar_kp.kp_id')
            ->join('mahasiswa','mahasiswa.id','=','kp.mahasiswa_id')
            ->join('ref_ruang','seminar_kp.ruang_id','=','ref_ruang.id')
            ->where('status_kp','SETUJU')
            ->where('status_seminarkp','PENDING')
            ->firstOrFail();
    }
    
    //Digunakan di SemkpController
    public function scopeDaftarhadir($query,$nim){
        return $query->where('nim',$nim)
            ->join('kp','kp.id','=','seminar_kp.kp_id')
            ->join('mahasiswa','mahasiswa.id','=','kp.mahasiswa_id')
            ->join('ref_ruang','seminar_kp.ruang_id','=','ref_ruang.id')
            ->join('ref_dosen','mahasiswa.pem_kp','=','ref_dosen.id')
            ->where('status_kp','SETUJU')
            ->where('status_seminarkp','SETUJU')
            ->firstOrFail();
    }

    //Digunakan di Seminarkp Controller (Admin)
    public function scopeUndangan($query,$id){
        return $query->where('seminar_kp.id',$id)
            ->join('kp','kp.id','=','seminar_kp.kp_id')
            ->join('mahasiswa','mahasiswa.id','=','kp.mahasiswa_id')
            ->join('ref_ruang','seminar_kp.ruang_id','=','ref_ruang.id')
            ->join('ref_dosen','mahasiswa.pem_kp','=','ref_dosen.id')
            ->where('status_kp','SETUJU')
            ->where('status_seminarkp','SETUJU')
            ->firstOrFail();
    }

    //Digunakan di SeminarkpController
    public function scopeSemkp($query){
        return $query->join('kp','kp.id','=','seminar_kp.kp_id')
        ->join('mahasiswa','kp.mahasiswa_id','=','mahasiswa.id')
        ->join('ref_ruang','ref_ruang.id','=','seminar_kp.ruang_id')
        ->select('*','seminar_kp.id')
        ->orderBy('seminar_kp.created_at','desc')
        ->get();
    }

    public function scopeGetsemkp($query,$id){
        return $query->join('kp','kp.id','=','seminar_kp.kp_id')
        ->join('mahasiswa','kp.mahasiswa_id','=','mahasiswa.id')
        ->join('ref_ruang','ref_ruang.id','=','seminar_kp.ruang_id')
        ->select('*','seminar_kp.id')
        ->where('seminar_kp.id',$id)
        ->firstOrFail();
    }

    //Digunakan di DashController
    public function scopeListseminarkp($query){
        return $query->join('kp','kp.id','=','seminar_kp.kp_id')
            ->join('mahasiswa','mahasiswa.id','=','kp.mahasiswa_id')
            ->join('ref_ruang','ref_ruang.id','=','seminar_kp.ruang_id')
            ->select('*','seminar_kp.id')
            ->where('status_kp','SETUJU')
            ->where('status_seminarkp','SETUJU')
            ->orderBy('tanggal_seminar', 'desc')
            ->get();
    }

    //Digunakan di Presensi & Laporan & NIalikp
    public function scopeSemkpsetuju($query){
        return $query->join('kp','kp.id','=','seminar_kp.kp_id')
            ->join('mahasiswa','mahasiswa.id','=','kp.mahasiswa_id')
            ->join('ref_ruang','ref_ruang.id','=','seminar_kp.ruang_id')
            ->join('dokumen_kp','dokumen_kp.kp_id','=','kp.id')
            ->select('*','seminar_kp.id')
            ->where('status_kp','SETUJU')
            ->where('status_seminarkp','SETUJU')
            ->orderBy('tanggal_seminar', 'desc')
            ->get();
    }

    public function scopeNilaikp($query){
        return $query->join('kp','kp.id','=','seminar_kp.kp_id')
            ->join('mahasiswa','mahasiswa.id','=','kp.mahasiswa_id')
            ->join('ref_ruang','ref_ruang.id','=','seminar_kp.ruang_id')
            ->join('dokumen_kp','dokumen_kp.kp_id','=','kp.id')
            ->join('nilai_kp','nilai_kp.kp_id','=','kp.id')
            ->select('*','seminar_kp.id')
            ->where('status_kp','SETUJU')
            ->where('status_seminarkp','SETUJU')
            ->orderBy('tanggal_seminar', 'desc')
            ->get();
    }
    //Digunakan di HomeController
    public function scopeStatussemkp($query, $id){
        return $query->where('mahasiswa_id',$id)
            ->join('kp','kp.id','=','seminar_kp.kp_id')
            ->select('*');
    }

    //Digunakan di ListController (Semkp)
    // public function selesai_kp()
    // {
    //     return Carbon::createFromTimestamp(strtotime($this->tgl_selesai_kp))->addDays(90)->format('Y-m-d');
    // }
}
