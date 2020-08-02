<?php

namespace App\Models;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Model;

class Ta extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ta';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = ['perusahaan_nama','perusahaan_almt','perusahaan_jenis','pic','tgl_mulai_kp','tgl_selesai_kp'];

    protected $guarded = [];

    const CREATED_AT = 'tgl_pengajuan';

    //Relasi dengan tabel Mahasiswa
    public function mahasiswa(){
        return $this->belongsTo('App\Models\Mahasiswa');
    }
    
    //Relasi dengan tabel ta_seminar
    public function seminarhasil(){
        return $this->hasOne('App\Models\Seminarta');
    }

    //Relasi dengan tabel Pendadaran
    public function pendadaran(){
        return $this->hasOne('App\Models\Pendadaran');
    }

    //Relasi dengan tabel Pembimbing
    public function pembimbing(){
        return $this->hasMany('App\Models\Pembimbing');
    }

    //Digunakan TaController
    public function scopePending($query,$nim){
        return $query->where('status_ta','PENDING')
        ->where('nim',$nim)
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->join('ref_peminatan','ref_peminatan.id','=','ta.peminatan_id')
        ->select('*','ta.id','ta.sks','ta.ipk');
    }

    //Digunakan TaController
    public function scopeSetuju($query,$nim){
        return $query->where('status_ta','SETUJU')
        ->where('nim',$nim)
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->join('ref_peminatan','ref_peminatan.id','=','ta.peminatan_id')
        ->select('*','ta.id','ta.sks','ta.ipk');
    }

    //Digunakan SemhasController
    public function scopeSetujuta($query,$nim){
        return $query->where('status_ta','SETUJU')
        ->where('nim',$nim)
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->join('ref_peminatan','ref_peminatan.id','=','ta.peminatan_id')
        ->select('*','ta.id');
    }

    //Digunakan TaController
    public function scopeTolak($query,$nim){
        return $query->where('status_ta','TOLAK')
        ->where('nim',$nim)
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->join('ref_peminatan','ref_peminatan.id','=','ta.peminatan_id')
        ->select('*','ta.id');
    }

    //Digunakan TaController && PendaftaranController
    public function scopeMatkul($query,$id){
        return $query->where('ta.id',$id)
        ->join('ta_matkul','ta_matkul.ta_id','=','ta.id')
        ->get();
    }

    //Digunakan TaController
    // public function scopePembimbing($query,$id){
    //     return $query->where('ta.id',$id)
    //     ->join('ta_pembimbing','ta_pembimbing.ta_id','=','ta.id')
    //     ->join('ref_dosen','ta_pembimbing.pembimbing','=','ref_dosen.id')
    //     ->select('*','ta_pembimbing.id')
    //     ->get();
    // }

    //Digunakan di Pendaftaran Controller
    public function scopeListta($query){
        return $query->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->orderBy('tgl_pengajuan','desc')
        ->select('*','ta.id')
        ->get();
    }

    //Digunakan di Pendaftaran Controller
    public function scopePendaftaran($query){
        return $query->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->where('status_ta','PENDING')
        // ->orWhere('status_ta','TOLAK')
        ->select('*','ta.id')
        ->orderBy('tgl_pengajuan','desc')
        ->get();
    }

    //Digunakan di Pendaftaran Controller
    public function scopeSurattugas($query){
        return $query->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->where('status_ta','SETUJU')
        ->select('*','ta.id')
        ->orderBy('tgl_pengajuan','desc')
        ->get();
    }

    //Digunakan di Pendaftaran Controller
    public function scopeGet_ta($query,$id){
        return $query->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->join('ref_peminatan','ref_peminatan.id','=','ta.peminatan_id')
        ->where('ta.id',$id)
        ->select('*','ta.id','ta.sks','ta.ipk');
    }

    //Digunakan di Pendaftaran Controller
    public function scopeListtasetuju($query){
        return $query->select('*','ta.id')
        ->join('ref_peminatan','ref_peminatan.id','=','ta.peminatan_id')
        // ->join('ta_pembimbing','ta_pembimbing.ta_id','=','ta.id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        // ->join('ref_dosen','ta_pembimbing.pembimbing','=','ref_dosen.id')
        ->where('status_ta','SETUJU')
        // ->groupBy('mahasiswa.id')
        ->orderBy('tgl_setuju','desc')
        ->get();
    }

    //Digunakan di Sel Controller
    public function scopeTasel($query){
        return $query->select('*','ta.id')
        ->join('ref_peminatan','ref_peminatan.id','=','ta.peminatan_id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->join('koordinator_kbk','koordinator_kbk.ta_id','=','ta.id')
        ->where('peminatan_id',1)
        ->orderBy('tgl_pengajuan','desc')
        ->get();
    }

    //Digunakan di Meka Controller
    public function scopeTameka($query){
        return $query->select('*','ta.id')
        ->join('ref_peminatan','ref_peminatan.id','=','ta.peminatan_id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->join('koordinator_kbk','koordinator_kbk.ta_id','=','ta.id')
        ->where('peminatan_id',2)
        ->orderBy('tgl_pengajuan','desc')
        ->get();
    }

    //Digunakan di ICT Controller
    public function scopeTaict($query){
        return $query->select('*','ta.id')
        ->join('ref_peminatan','ref_peminatan.id','=','ta.peminatan_id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->join('koordinator_kbk','koordinator_kbk.ta_id','=','ta.id')
        ->where('peminatan_id',3)
        ->orderBy('tgl_pengajuan','desc')
        ->get();
    }

    //Digunakan di HomeController
    public function scopeStatusta($query, $id){
        return $query->where('mahasiswa_id',$id)
            ->select('*');
    }

    //View List Tugas Akhir (Admin)
    public function pemta($idta){
        return Ta::join('ta_pembimbing','ta_pembimbing.ta_id','=','ta.id')
        ->join('ref_dosen','ref_dosen.id','=','ta_pembimbing.pembimbing')
        ->where('ta.id',$idta)
        ->select('ta.id','nama_dosen')->get();
    }

    //Digunakan TajudulController (User)
    public function scopeJudultasetuju($query,$nim){
        return $query->where('status_ta','SETUJU')
        ->where('nim',$nim)
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->join('log_judul_ta','log_judul_ta.ta_id','=','ta.id')
        ->select('*','ta.id')
        ->orderBy('log_judul_ta.created_at','desc');
    }

    //TajudulController (Admin)
    public function scopeJudulta($query){
        return $query->select('*','ta.id')
        ->join('log_judul_ta','log_judul_ta.ta_id','=','ta.id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->orderBy('log_judul_ta.created_at','desc')
        ->get();
    }

    //TajudulController (Admin)
    public function scopeGetjudulta($query,$id){
        return $query->select('*','log_judul_ta.id')
        ->join('log_judul_ta','log_judul_ta.ta_id','=','ta.id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->where('ta.id',$id)
        ->get()->last();
    }

    //Digunakan TapembimbingController (User)
    public function scopePembimbingtasetuju($query,$nim){
        return $query->where('status_ta','SETUJU')
        ->where('nim',$nim)
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->join('log_pembimbing_ta','log_pembimbing_ta.ta_id','=','ta.id')
        ->select('*','ta.id')
        ->orderBy('log_pembimbing_ta.created_at','desc');
    }

    //TapembimbingController
    public function scopePembimbingta($query){
        return $query->select('*','ta.id')
        ->join('log_pembimbing_ta','log_pembimbing_ta.ta_id','=','ta.id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->orderBy('log_pembimbing_ta.created_at','desc')
        ->get();
    }

    //TapembimbingController
    public function scopeGetpembimbingta($query,$id){
        return $query->select('*','log_pembimbing_ta.id')
        ->join('log_pembimbing_ta','log_pembimbing_ta.ta_id','=','ta.id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->where('ta.id',$id)
        ->first();
    }

    //Digunakan TaperpanjanganController (User)
    public function scopePerpanjangantasetuju($query,$nim){
        return $query->where('status_ta','SETUJU')
        ->where('nim',$nim)
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->join('log_perpanjangan_ta','log_perpanjangan_ta.ta_id','=','ta.id')
        ->select('*','ta.id')
        ->orderBy('log_perpanjangan_ta.created_at','desc');
    }

    //TaperpanjanganController (Admin)
    public function scopePerpanjanganta($query){
        return $query->select('*','ta.id')
        ->join('log_perpanjangan_ta','log_perpanjangan_ta.ta_id','=','ta.id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->orderBy('log_perpanjangan_ta.created_at','desc')
        ->get();
    }

    //TaperpanjanganController (Admin)
    public function scopeGetperpanjanganta($query,$id){
        return $query->select('*','log_perpanjangan_ta.id')
        ->join('log_perpanjangan_ta','log_perpanjangan_ta.ta_id','=','ta.id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->where('ta.id',$id)
        ->first();
    }

    //Digunakan TapembatalanController (User)
    public function scopePembatalantasetuju($query,$nim){
        return $query->where('status_ta','SETUJU')
        ->where('nim',$nim)
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->join('log_pembatalan_ta','log_pembatalan_ta.ta_id','=','ta.id')
        ->select('*','ta.id')
        ->orderBy('log_pembatalan_ta.created_at','desc');
    }

    //TapembatalanController (Admin)
    public function scopePembatalanta($query){
        return $query->select('*','ta.id')
        ->join('log_pembatalan_ta','log_pembatalan_ta.ta_id','=','ta.id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->orderBy('log_pembatalan_ta.created_at','desc')
        ->get();
    }

    //TapembatalanController (Admin)
    public function scopeGetpembatalanta($query,$id){
        return $query->select('*','log_pembatalan_ta.id')
        ->join('log_pembatalan_ta','log_pembatalan_ta.ta_id','=','ta.id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->where('ta.id',$id)
        ->first();
    }

    //Index Logbookta(Admin)
    public function logcount($idta){
        return Mahasiswa::join('ta_logbook','ta_logbook.mahasiswa_id','=','ref_mahasiswa.id')
        ->where('ref_mahasiswa.id',$idta)->count();
    }

    //Index Logbookta(Admin)
    public function accepted($idta){
        return Mahasiswa::join('ta_logbook','ta_logbook.mahasiswa_id','=','ref_mahasiswa.id')
        ->where('ref_mahasiswa.id',$idta)->where('status_logbook1',1)->count();
    }

    //Index Logbookta(Admin)
    public function draft($idta){
        return Mahasiswa::join('ta_logbook','ta_logbook.mahasiswa_id','=','ref_mahasiswa.id')
        ->where('ref_mahasiswa.id',$idta)->where('status_logbook1',2)->count();
    }
}
