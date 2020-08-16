<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ref_jabatan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = ['perusahaan_nama','perusahaan_almt','perusahaan_jenis','pic','tgl_mulai_kp','tgl_selesai_kp'];

    protected $guarded = [];


    public function scopeJabatan($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->get();
    }

    public function scopeKp($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id',3)
        ->firstOrFail();
    }

    public function scopeTa($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 4)
        ->firstOrFail();
    }

    public function scopeDekan($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 2)
        ->firstOrFail();
    }

    public function scopeKaprodi($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 1)
        ->firstOrFail();
    }

    public function scopeSel($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 7)
        ->firstOrFail();
    }

    public function scopeMeka($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 6)
        ->firstOrFail();
    }

    public function scopeIct($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 5)
        ->firstOrFail();
    }

    public function scopeStaff($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 8)
        ->firstOrFail();
    }

    public function scopeKalabsel($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 10)
        ->firstOrFail();
    }

    public function scopeKalabele($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 11)
        ->firstOrFail();
    }

    public function scopeLaboranele($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 12)
        ->firstOrFail();
    }

    public function scopeKalabtele($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 13)
        ->firstOrFail();
    }

    public function scopeKalabik($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 14)
        ->firstOrFail();
    }

    public function scopeKalabkj($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 15)
        ->firstOrFail();
    }
    
}
