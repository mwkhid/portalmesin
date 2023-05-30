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

    public function scopeWadek($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 29)
        ->firstOrFail();
    }

    public function scopeKaprodi($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 1)
        ->firstOrFail();
    }

    public function scopeKonversi($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 5)
        ->firstOrFail();
    }

    public function scopeKonstruksi($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 6)
        ->firstOrFail();
    }

    public function scopeManufaktur($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 7)
        ->firstOrFail();
    }

    public function scopeMaterial($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 8)
        ->firstOrFail();
    }

    public function scopeStaff($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 9)
        ->firstOrFail();
    }

    public function scopeKalabgetaran($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 10)
        ->firstOrFail();
    }

    public function scopeLaborangetaran($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 11)
        ->firstOrFail();
    }

    public function scopeKalabperancangan($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 12)
        ->firstOrFail();
    }

    public function scopeKalabmekanika($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 13)
        ->firstOrFail();
    }

    public function scopeLaboranmekanika($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 14)
        ->firstOrFail();
    }

    public function scopeKalabmotor($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 15)
        ->firstOrFail();
    }

    public function scopeLaboranmotor($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 16)
        ->firstOrFail();
    }
    
    public function scopeKalabpanas($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 17)
        ->firstOrFail();
    }
    
    public function scopeLaboranpanas($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 18)
        ->firstOrFail();
    }

    public function scopeKalabproduksi($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 19)
        ->firstOrFail();
    }

    public function scopeLaboranproduksi($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 20)
        ->firstOrFail();
    }

    public function scopeKalabotomasi($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 21)
        ->firstOrFail();
    }

    public function scopeLaboranotomasi($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 22)
        ->firstOrFail();
    }

    public function scopeKalabmaterial($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 23)
        ->firstOrFail();
    }

    public function scopeLaboranmaterial($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 24)
        ->firstOrFail();
    }

    public function scopeKalabpengecoran($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 25)
        ->firstOrFail();
    }

    public function scopeKalabnano($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 26)
        ->firstOrFail();
    }

    public function scopeKalabenergi($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 27)
        ->firstOrFail();
    }

    public function scopeLaboranenergi($query){
        return $query->join('ref_dosen','ref_dosen.id','=','ref_jabatan.dosen_id')
        ->select('*','ref_jabatan.id')
        ->where('ref_jabatan.id', 28)
        ->firstOrFail();
    }

}
