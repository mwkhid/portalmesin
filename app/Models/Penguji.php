<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penguji extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'penguji';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = ['perusahaan_nama','perusahaan_almt','perusahaan_jenis','pic','tgl_mulai_kp','tgl_selesai_kp'];

    protected $guarded = [];

    //Digunakan di SemhasController (Koorta)
    public function scopePenguji($query,$id){
        return $query->where('ta_id',$id)
        ->select('*','penguji.id')
        ->get();
    }

    public function scopePengujisemhas($query,$id){
        return $query->where('ta_id',$id)
        ->join('ref_dosen','ref_dosen.id','=','penguji.penguji_semhas')
        ->select('*','penguji.id')
        ->get();
    }

    public function scopePengujipendadaran($query,$id){
        return $query->where('ta_id',$id)
        ->join('ref_dosen','ref_dosen.id','=','penguji.penguji_pendadaran')
        ->select('*','penguji.id')
        ->get();
    }
    
    public function scopePengujisemhasfirst($query,$id){
        return $query->where('ta_id',$id)
        ->join('ref_dosen','ref_dosen.id','=','penguji.penguji_semhas')
        ->select('*','penguji.id')
        ->get()->first();
    }
    
    public function scopePengujisemhaslast($query,$id){
        return $query->where('ta_id',$id)
        ->join('ref_dosen','ref_dosen.id','=','penguji.penguji_semhas')
        ->select('*','penguji.id')
        ->get()->last();
    }
}
