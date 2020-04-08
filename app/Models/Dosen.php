<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ref_dosen';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = ['perusahaan_nama','perusahaan_almt','perusahaan_jenis','pic','tgl_mulai_kp','tgl_selesai_kp'];

    protected $guarded = [];

    //Digunakan AkademikController (Dosen)
    public function scopeBimbingan($query,$nim){
        return $query->select('*')
        ->join('mahasiswa','mahasiswa.pem_akademik','=','ref_dosen.id')
        ->where('nip',$nim)
        ->orderBy('nim','desc')
        ->get();
    }

    //Digunakan KpController (Dosen)
    public function scopeBimbingankp($query,$nim){
        return $query->select('*')
        ->join('mahasiswa','mahasiswa.pem_kp','=','ref_dosen.id')
        ->join('kp','kp.mahasiswa_id','=','mahasiswa.id')
        ->where('nip',$nim)
        ->orderBy('tgl_ajuan','desc')
        ->get();
    }

    //Digunakan TaController (Dosen)
    public function scopeBimbinganta($query,$nim){
        return $query->select('*')
        ->join('pembimbing','pembimbing.pembimbing','=','ref_dosen.id')
        ->join('ta','ta.id','=','pembimbing.ta_id')
        ->join('mahasiswa','mahasiswa.id','=','ta.mahasiswa_id')
        ->where('nip',$nim)
        ->orderBy('tgl_pengajuan','desc')
        ->get();
    }

    //Digunakan TaController (Dosen)
    public function scopeGetbimbingan($query,$id,$nim){
        return $query->select('*','pembimbing.id')
        ->join('pembimbing','pembimbing.pembimbing','=','ref_dosen.id')
        ->join('ta','ta.id','=','pembimbing.ta_id')
        ->join('mahasiswa','mahasiswa.id','=','ta.mahasiswa_id')
        ->join('peminatan','peminatan.id','=','ta.peminatan_id')
        ->where('ta_id',$id)
        ->where('nip',$nim)
        ->first();
    }

    //Digunakan SemhasController (Dosen)
    public function scopeBimbingansemhas($query,$nim){
        return $query->select('*')
        ->join('pembimbing','pembimbing.pembimbing','=','ref_dosen.id')
        ->join('ta','ta.id','=','pembimbing.ta_id')
        ->join('seminar_ta','seminar_ta.ta_id','=','ta.id')
        ->join('mahasiswa','mahasiswa.id','=','ta.mahasiswa_id')
        ->where('nip',$nim)
        ->orderBy('seminar_ta.created_at','desc')
        ->get();
    }

    //Digunakan SemhasController (Dosen)
    public function scopeGetbimbingansemhas($query,$id,$nim){
        return $query->select('*','pembimbing.id')
        ->join('pembimbing','pembimbing.pembimbing','=','ref_dosen.id')
        ->join('ta','ta.id','=','pembimbing.ta_id')
        ->join('seminar_ta','seminar_ta.ta_id','=','ta.id')
        ->join('mahasiswa','mahasiswa.id','=','ta.mahasiswa_id')
        ->join('peminatan','peminatan.id','=','ta.peminatan_id')
        ->where('seminar_ta.ta_id',$id)
        ->where('nip',$nim)
        ->first();
    }

    //Digunakan PendadaranController (Dosen)
    public function scopeBimbinganpendadaran($query,$nim){
        return $query->select('*')
        ->join('pembimbing','pembimbing.pembimbing','=','ref_dosen.id')
        ->join('ta','ta.id','=','pembimbing.ta_id')
        ->join('pendadaran','pendadaran.ta_id','=','ta.id')
        ->join('mahasiswa','mahasiswa.id','=','ta.mahasiswa_id')
        ->where('nip',$nim)
        ->orderBy('pendadaran.created_at','desc')
        ->get();
    }

    //Digunakan PendadaranController (Dosen)
    public function scopeGetbimbinganpendadaran($query,$id,$nim){
        return $query->select('*','pembimbing.id')
        ->join('pembimbing','pembimbing.pembimbing','=','ref_dosen.id')
        ->join('ta','ta.id','=','pembimbing.ta_id')
        ->join('pendadaran','pendadaran.ta_id','=','ta.id')
        ->join('mahasiswa','mahasiswa.id','=','ta.mahasiswa_id')
        ->join('peminatan','peminatan.id','=','ta.peminatan_id')
        ->where('pendadaran.ta_id',$id)
        ->where('nip',$nim)
        ->first();
    }
}
