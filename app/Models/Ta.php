<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ta extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ta';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = ['perusahaan_nama','perusahaan_almt','perusahaan_jenis','pic','tgl_mulai_kp','tgl_selesai_kp'];

    protected $guarded = [];

    const CREATED_AT = 'tgl_pengajuan';

    //Relasi dengan tabel Mahasiswa
    public function mahasiswa(){
        return $this->belongsTo('App\Models\Mahasiswa');
    }
    
    //Relasi dengan tabel Seminar_ta
    public function seminarhasil(){
        return $this->hasOne('App\Models\Seminarta');
    }

    //Relasi dengan tabel Pendadaran
    public function pendadaran(){
        return $this->hasOne('App\Models\Pendadaran');
    }

    //Digunakan TaController
    public function scopePending($query,$nim){
        return $query->where('status_ta','PENDING')
        ->where('nim',$nim)
        ->join('mahasiswa','mahasiswa.id','=','ta.mahasiswa_id')
        ->join('peminatan','peminatan.id','=','ta.peminatan_id')
        ->select('*','ta.id');
    }

    //Digunakan TaController
    public function scopeSetuju($query,$nim){
        return $query->where('status_ta','SETUJU')
        ->where('nim',$nim)
        ->join('mahasiswa','mahasiswa.id','=','ta.mahasiswa_id')
        ->join('peminatan','peminatan.id','=','ta.peminatan_id')
        ->select('*','ta.id');
    }

    //Digunakan TaController
    public function scopeTolak($query,$nim){
        return $query->where('status_ta','TOLAK')
        ->where('nim',$nim)
        ->join('mahasiswa','mahasiswa.id','=','ta.mahasiswa_id')
        ->join('peminatan','peminatan.id','=','ta.peminatan_id')
        ->select('*','ta.id');
    }

    //Digunakan TaController && PendaftaranController
    public function scopeMatkul($query,$id){
        return $query->where('ta.id',$id)
        ->join('matkul','matkul.ta_id','=','ta.id')
        ->get();
    }

    //Digunakan TaController
    // public function scopePembimbing($query,$id){
    //     return $query->where('ta.id',$id)
    //     ->join('pembimbing','pembimbing.ta_id','=','ta.id')
    //     ->join('ref_dosen','pembimbing.pembimbing','=','ref_dosen.id')
    //     ->select('*','pembimbing.id')
    //     ->get();
    // }

    //Digunakan di Pendaftaran Controller
    public function scopeListta($query){
        return $query->join('mahasiswa','mahasiswa.id','=','ta.mahasiswa_id')
        ->orderBy('tgl_pengajuan','desc')
        ->get();
    }

    //Digunakan di Pendaftaran Controller
    public function scopePendaftaran($query){
        return $query->join('mahasiswa','mahasiswa.id','=','ta.mahasiswa_id')
        ->where('status_ta','PENDING')
        // ->orWhere('status_ta','TOLAK')
        ->select('*','ta.id')
        ->orderBy('tgl_pengajuan','desc')
        ->get();
    }

    //Digunakan di Pendaftaran Controller
    public function scopeSurattugas($query){
        return $query->join('mahasiswa','mahasiswa.id','=','ta.mahasiswa_id')
        ->where('status_ta','SETUJU')
        ->select('*','ta.id')
        ->orderBy('tgl_pengajuan','desc')
        ->get();
    }

    //Digunakan di Pendaftaran Controller
    public function scopeGet_ta($query,$id){
        return $query->join('mahasiswa','mahasiswa.id','=','ta.mahasiswa_id')
        ->join('peminatan','peminatan.id','=','ta.peminatan_id')
        ->where('ta.id',$id)
        ->select('*','ta.id');
    }

    //Digunakan di Pendaftaran Controller
    public function scopeListtasetuju($query){
        return $query->select('*','ta.id')
        ->join('peminatan','peminatan.id','=','ta.peminatan_id')
        // ->join('pembimbing','pembimbing.ta_id','=','ta.id')
        ->join('mahasiswa','mahasiswa.id','=','ta.mahasiswa_id')
        // ->join('ref_dosen','pembimbing.pembimbing','=','ref_dosen.id')
        ->where('status_ta','SETUJU')
        // ->groupBy('mahasiswa.id')
        ->orderBy('tgl_setuju','desc')
        ->get();
    }

    //Digunakan di Sel Controller
    public function scopeTasel($query){
        return $query->select('*','ta.id')
        ->join('peminatan','peminatan.id','=','ta.peminatan_id')
        ->join('mahasiswa','mahasiswa.id','=','ta.mahasiswa_id')
        ->join('koordinator_kbk','koordinator_kbk.ta_id','=','ta.id')
        ->where('peminatan_id',1)
        ->orderBy('tgl_pengajuan','desc')
        ->get();
    }

    //Digunakan di Meka Controller
    public function scopeTameka($query){
        return $query->select('*','ta.id')
        ->join('peminatan','peminatan.id','=','ta.peminatan_id')
        ->join('mahasiswa','mahasiswa.id','=','ta.mahasiswa_id')
        ->join('koordinator_kbk','koordinator_kbk.ta_id','=','ta.id')
        ->where('peminatan_id',2)
        ->orderBy('tgl_pengajuan','desc')
        ->get();
    }

    //Digunakan di ICT Controller
    public function scopeTaict($query){
        return $query->select('*','ta.id')
        ->join('peminatan','peminatan.id','=','ta.peminatan_id')
        ->join('mahasiswa','mahasiswa.id','=','ta.mahasiswa_id')
        ->join('koordinator_kbk','koordinator_kbk.ta_id','=','ta.id')
        ->where('peminatan_id',3)
        ->orderBy('tgl_pengajuan','desc')
        ->get();
    }

    //Digunakan di HomeController
    public function scopeStatusta($query, $id){
        return $query->where('mahasiswa_id',$id)
            ->select('*');
    }
}
