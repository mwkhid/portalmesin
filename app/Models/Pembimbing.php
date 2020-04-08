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
    protected $table = 'pembimbing';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = ['perusahaan_nama','perusahaan_almt','perusahaan_jenis','pic','tgl_mulai_kp','tgl_selesai_kp'];

    protected $guarded = [];

    public function scopePembimbing($query,$id){
        return $query->where('ta_id',$id)
        ->join('ref_dosen','pembimbing.pembimbing','=','ref_dosen.id')
        ->select('*','pembimbing.id')
        ->get();

    }
}
