<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembimbing extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ta_pembimbing';

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
    
    public function scopePembimbing($query,$id){
        return $query->where('ta_id',$id)
        ->join('ref_dosen','ta_pembimbing.pembimbing','=','ref_dosen.id')
        ->select('*','ta_pembimbing.id')
        ->get();
    }

    //RekapsemhasController (Dosen)
    public function scopeNilaipembimbing($query,$id){
        return $query->where('ta_id',$id)
        ->join('ref_dosen','ta_pembimbing.pembimbing','=','ref_dosen.id')
        ->join('ta_nilaisemhas_pembimbing','ta_nilaisemhas_pembimbing.ta_pembimbing_id','=','ta_pembimbing.id')
        ->select('*','ta_pembimbing.id')
        ->get();
    }

    //View Dashboard(Guest)
    public function pembimbing1($idta){
        return Pembimbing::join('ref_dosen','ref_dosen.id','=','ta_pembimbing.pembimbing')
        ->where('ref_dosen.id',$idta)->where('pem',1)->count();
    }

    //View Dashboard(Guest)
    public function pembimbing2($idta){
        return Pembimbing::join('ref_dosen','ref_dosen.id','=','ta_pembimbing.pembimbing')
        ->where('ref_dosen.id',$idta)->where('pem',2)->count();
    }
}
