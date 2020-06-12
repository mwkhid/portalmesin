<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Logbookta extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ta_logbook';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = ['perusahaan_nama','perusahaan_almt','perusahaan_jenis','pic','tgl_mulai_kp','tgl_selesai_kp'];

    protected $guarded = [];

    //Digunakan LogbooktaController (Admin)
    public function scopeLogbook($query){
        return $query->join('ref_mahasiswa','ref_mahasiswa.id','=','ta_logbook.mahasiswa_id')
        ->select('*','ta_logbook.id')
        ->orderBy('ta_logbook.created_at','desc')
        ->get();
    }

    public function scopeLogbookmhs($query,$id){
        return $query->join('ref_mahasiswa','ref_mahasiswa.id','=','ta_logbook.mahasiswa_id')
        ->where('nim',$id)
        ->select('*','ta_logbook.id')
        ->orderBy('ta_logbook.created_at','desc')
        ->get();
    }

    public function scopeLogbookmhsasc($query,$id){
        return $query->join('ref_mahasiswa','ref_mahasiswa.id','=','ta_logbook.mahasiswa_id')
        ->where('nim',$id)
        ->select('*','ta_logbook.id')
        ->orderBy('ta_logbook.created_at','asc')
        ->get();
    }

    public function scopeJumlahlogbook($query){
        return $query->select('nim','nama_mhs',DB::raw('count(*) as total'))
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta_logbook.mahasiswa_id')
        ->groupBy('nama_mhs','nim')
        ->get();
    }
}
