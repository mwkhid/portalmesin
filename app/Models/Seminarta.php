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
    protected $table = 'seminar_ta';

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
        ->join('ta','ta.id','=','seminar_ta.ta_id')
        ->join('mahasiswa','ta.mahasiswa_id','=','mahasiswa.id')
        ->join('peminatan','peminatan.id','=','ta.peminatan_id')
        ->join('ref_ruang','ref_ruang.id','=','seminar_ta.tempat')
        ->select('*','seminar_ta.id');
    }

    //Digunakan di SemhasController
    public function scopePending($query,$nim){
        return $query->where('status_seminar','PENDING')
        ->where('nim',$nim)
        ->join('ta','ta.id','=','seminar_ta.ta_id')
        ->join('mahasiswa','ta.mahasiswa_id','=','mahasiswa.id')
        // ->join('ref_ruang','ref_ruang.id','=','seminar_ta.tempat')
        ->select('*','seminar_ta.id');
    }

    //Digunakan di SemhasController
    public function scopeTolak($query,$nim){
        return $query->where('status_seminar','TOLAK')
        ->where('nim',$nim)
        ->join('ta','ta.id','=','seminar_ta.ta_id')
        ->join('mahasiswa','ta.mahasiswa_id','=','mahasiswa.id')
        // ->join('ref_ruang','ref_ruang.id','=','seminar_ta.tempat')
        ->select('*','seminar_ta.id');
    }

    //Digunakan di SemhasController (Admin)
    public function scopeListsemhas($query){
        return $query->join('ta','ta.id','=','seminar_ta.ta_id')
        ->join('mahasiswa','mahasiswa.id','=','ta.mahasiswa_id')
        // ->join('ref_ruang','ref_ruang.id','=','seminar_ta.tempat')
        ->select('*','seminar_ta.id')
        ->where('status_seminar','PENDING')
        ->orWhere('status_seminar','TOLAK')
        ->orderBy('seminar_ta.created_at','desc')
        ->get();
    }

    //Digunakan di ListController (Admin/Semhas)
    public function scopeListsemhassetuju($query){
        return $query->join('ta','ta.id','=','seminar_ta.ta_id')
        ->join('mahasiswa','mahasiswa.id','=','ta.mahasiswa_id')
        ->join('ref_ruang','ref_ruang.id','=','seminar_ta.tempat')
        ->where('status_ta','SETUJU')
        ->where('status_seminar','SETUJU')
        ->orderBy('seminar_ta.created_at','desc')
        ->select('*','seminar_ta.id')->get();
    }

    //Digunakan di SemhasController (Opta)
    public function scopeGet_semhas($query,$id){
        return $query->where('ta_id',$id)
        ->join('ref_ruang','seminar_ta.tempat','=','ref_ruang.id')
        ->where('status_seminar','SETUJU')
        ->select('*','seminar_ta.created_at','seminar_ta.updated_at','seminar_ta.id');
    }

    //Digunakan di HomeController
    public function scopeStatussemhas($query, $id){
        return $query->where('mahasiswa_id',$id)
            ->join('ta','ta.id','=','seminar_ta.ta_id')
            ->select('*');
    }
}
