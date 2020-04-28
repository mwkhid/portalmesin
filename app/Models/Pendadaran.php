<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendadaran extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pendadaran';

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

    //Digunakan PendadaranController
    public function scopeSetuju($query,$nim){
        return $query->where('status_pendadaran','SETUJU')
        ->where('nim',$nim)
        ->join('ta','ta.id','=','pendadaran.ta_id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->join('ref_ruang','pendadaran.tempat','=','ref_ruang.id')
        ->join('ref_peminatan','ref_peminatan.id','=','ta.peminatan_id')
        ->select('*','pendadaran.id');
    }

    //Digunakan PendadaranController
    public function scopePending($query,$nim){
        return $query->where('status_pendadaran','PENDING')
        ->where('nim',$nim)
        ->join('ta','ta.id','=','pendadaran.ta_id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        // ->join('ref_ruang','pendadaran.tempat','=','ref_ruang.id')
        ->select('*','pendadaran.id');
    }

    //Digunakan PendadaranController
    public function scopeTolak($query,$nim){
        return $query->where('status_pendadaran','TOLAK')
        ->where('nim',$nim)
        ->join('ta','ta.id','=','pendadaran.ta_id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        // ->join('ref_ruang','pendadaran.tempat','=','ref_ruang.id')
        ->select('*','pendadaran.id');
    }

    //Digunakan PendadaranController (Admin)
    // public function scopePenguji($query,$id){
    //     return $query->where('pendadaran.id',$id)
    //     ->join('penguji','penguji.pendadaran_id','=','pendadaran.id')
    //     ->join('ref_dosen','penguji.penguji','=','ref_dosen.id')
    //     ->select('*','penguji.id')
    //     ->get();
    // }

    //Digunakan PendadaranController (Admin)
    public function scopeListpendadaran($query){
        return $query->join('ta','ta.id','=','pendadaran.ta_id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        // ->join('ref_ruang','ref_ruang.id','=','pendadaran.tempat')
        ->where('status_pendadaran','PENDING')
        ->orWhere('status_pendadaran','TOLAK')
        ->orderBy('pendadaran.created_at','desc')
        ->select('*','pendadaran.id')->get();
    }

    //Digunakan PendadaranController (Admin)
    public function scopeListpendadaransetuju($query){
        return $query->join('ta','ta.id','=','pendadaran.ta_id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->join('ref_ruang','ref_ruang.id','=','pendadaran.tempat')
        ->where('status_pendadaran','SETUJU')
        ->orderBy('pendadaran.created_at','desc')
        ->select('*','pendadaran.id')->get();
    }

    //Digunakan di PendadaranController (Opta)
    public function scopeGet_pendadaran($query,$id){
        return $query->where('ta_id',$id)
        ->join('ref_ruang','pendadaran.tempat','=','ref_ruang.id')
        ->where('status_pendadaran','SETUJU')
        ->select('*','pendadaran.created_at','pendadaran.updated_at','pendadaran.id');
    }

    //Digunakan di HomeController
    public function scopeStatuspendadaran($query, $id){
        return $query->where('mahasiswa_id',$id)
            ->join('ta','ta.id','=','pendadaran.ta_id')
            ->select('*');
    }
}
