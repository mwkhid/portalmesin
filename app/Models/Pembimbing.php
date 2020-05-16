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
}
