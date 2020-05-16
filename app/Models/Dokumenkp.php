<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumenkp extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kp_dokumen';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = ['perusahaan_nama','perusahaan_almt','perusahaan_jenis','pic','tgl_mulai_kp','tgl_selesai_kp'];

    protected $guarded = [];

    public function scopeGetdokumen($query,$id){
        return $query->join('kp','kp.id','=','kp_dokumen.kp_id')
            ->where('kp_id',$id);
    }
}
