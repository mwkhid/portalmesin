<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tawaran extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ta_tawaran_topik';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = ['perusahaan_nama','perusahaan_almt','perusahaan_jenis','pic','tgl_mulai_kp','tgl_selesai_kp'];

    protected $guarded = [];

    //Digunakan di TawaranController (Dosen) & DashController 
    public function scopeTawaran($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ta_tawaran_topik.dosen_id')
            ->select('*','ta_tawaran_topik.id')
            ->orderBy('ta_tawaran_topik.created_at','desc')
            ->get();
    }

    //Digunakan di TawaranController (Dosen)
    public function scopeTawarandosen($query,$nip){
        return $query->join('ref_dosen','ref_dosen.id','=','ta_tawaran_topik.dosen_id')
            ->where('nip',$nip)
            ->select('*','ta_tawaran_topik.id')
            ->orderBy('ta_tawaran_topik.created_at','desc')
            ->get();
    }
}
