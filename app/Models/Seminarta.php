<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seminarta extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ta_seminar';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = ['perusahaan_nama','perusahaan_almt','perusahaan_jenis','pic','tgl_mulai_kp','tgl_selesai_kp'];

    protected $guarded = [];
    
    //Relasi dengan tabel Ta
    public function ta(){
        return $this->belongsTo('App\Models\Ta');
    }

    //Digunakan di SemhasController
    public function scopeSetuju($query,$nim){
        return $query->where('status_seminar','SETUJU')
        ->where('nim',$nim)
        ->join('ta','ta.id','=','ta_seminar.ta_id')
        ->join('ref_mahasiswa','ta.mahasiswa_id','=','ref_mahasiswa.id')
        ->join('ref_peminatan','ref_peminatan.id','=','ta.peminatan_id')
        ->join('ref_ruang','ref_ruang.id','=','ta_seminar.tempat')
        ->select('*','ta_seminar.id');
    }

    //Digunakan di SemhasController
    public function scopePending($query,$nim){
        return $query->where('status_seminar','PENDING')
        ->where('nim',$nim)
        ->join('ta','ta.id','=','ta_seminar.ta_id')
        ->join('ref_mahasiswa','ta.mahasiswa_id','=','ref_mahasiswa.id')
        // ->join('ref_ruang','ref_ruang.id','=','ta_seminar.tempat')
        ->select('*','ta_seminar.id');
    }

    //Digunakan di SemhasController
    public function scopeTolak($query,$nim){
        return $query->where('status_seminar','TOLAK')
        ->where('nim',$nim)
        ->join('ta','ta.id','=','ta_seminar.ta_id')
        ->join('ref_mahasiswa','ta.mahasiswa_id','=','ref_mahasiswa.id')
        // ->join('ref_ruang','ref_ruang.id','=','ta_seminar.tempat')
        ->select('*','ta_seminar.id');
    }

    //Digunakan di SemhasController (Admin)
    public function scopeListsemhas($query){
        return $query->join('ta','ta.id','=','ta_seminar.ta_id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        // ->join('ref_ruang','ref_ruang.id','=','ta_seminar.tempat')
        ->select('*','ta_seminar.id')
        ->where('status_seminar','PENDING')
        ->orWhere('status_seminar','TOLAK')
        ->orderBy('ta_seminar.created_at','desc')
        ->get();
    }

    //Digunakan di ListController (Admin/Semhas)
    public function scopeListsemhassetuju($query){
        return $query->join('ta','ta.id','=','ta_seminar.ta_id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->join('ref_ruang','ref_ruang.id','=','ta_seminar.tempat')
        ->where('status_ta','SETUJU')
        ->where('status_seminar','SETUJU')
        ->orderBy('ta_seminar.created_at','desc')
        ->select('*','ta_seminar.id')->get();
    }

    //Digunakan di SemhasController (Opta)
    public function scopeGet_semhas($query,$id){
        return $query->where('ta_id',$id)
        ->join('ref_ruang','ta_seminar.tempat','=','ref_ruang.id')
        ->where('status_seminar','SETUJU')
        ->select('*','ta_seminar.created_at','ta_seminar.updated_at','ta_seminar.id');
    }

    //Digunakan di HomeController
    public function scopeStatussemhas($query, $id){
        return $query->where('mahasiswa_id',$id)
            ->join('ta','ta.id','=','ta_seminar.ta_id')
            ->select('*');
    }
}
