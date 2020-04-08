<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logbookta extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'logbook_ta';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = ['perusahaan_nama','perusahaan_almt','perusahaan_jenis','pic','tgl_mulai_kp','tgl_selesai_kp'];

    protected $guarded = [];

    public function scopeLogbook($query){
        return $query->join('mahasiswa','mahasiswa.id','=','logbook_ta.mahasiswa_id')
        ->select('*','logbook_ta.id')
        ->orderBy('logbook_ta.created_at','desc')
        ->get();
    }

    public function scopeLogbookmhs($query,$id){
        return $query->join('mahasiswa','mahasiswa.id','=','logbook_ta.mahasiswa_id')
        ->where('nim',$id)
        ->select('*','logbook_ta.id')
        ->orderBy('logbook_ta.created_at','desc')
        ->get();
    }
}
