<?php

namespace App\Models;

use App\Models\Mahasiswa;
use App\Models\Kp;
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
        ->join('ref_mahasiswa','ref_mahasiswa.pem_akademik','=','ref_dosen.id')
        ->where('nip',$nim)
        ->orderBy('nim','desc')
        ->get();
    }

    //Digunakan AkademikController (Dosen)
    public function scopeBimbinganlulus($query,$nim){
        return $query->select('*')
        ->join('ref_mahasiswa','ref_mahasiswa.pem_akademik','=','ref_dosen.id')
        ->where('nip',$nim)
        ->orderBy('nim','desc')
        ->where('status_mhs','LULUS')
        ->get();
    }

    //Digunakan KpController (Dosen)
    public function scopeBimbingankp($query,$nim){
        return $query->select('*')
        ->join('ref_mahasiswa','ref_mahasiswa.pem_kp','=','ref_dosen.id')
        // ->join('kp','kp.mahasiswa_id','=','ref_mahasiswa.id')
        ->where('nip',$nim)
        ->orderBy('nim','desc')
        ->get();
    }

    //Digunakan TaController (Dosen)
    public function scopeBimbinganta($query,$nim){
        return $query->select('*')
        ->join('ta_pembimbing','ta_pembimbing.pembimbing','=','ref_dosen.id')
        ->join('ta','ta.id','=','ta_pembimbing.ta_id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->where('nip',$nim)
        ->orderBy('tgl_pengajuan','desc')
        ->get();
    }

    //Digunakan TaController (Dosen)
    public function scopeGetbimbingan($query,$id,$nim){
        return $query->select('*','ta_pembimbing.id','ta.sks','ta.ipk')
        ->join('ta_pembimbing','ta_pembimbing.pembimbing','=','ref_dosen.id')
        ->join('ta','ta.id','=','ta_pembimbing.ta_id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->join('ref_peminatan','ref_peminatan.id','=','ta.peminatan_id')
        ->where('ta_id',$id)
        ->where('nip',$nim)
        ->first();
    }

    //Digunakan SemhasController (Dosen)
    public function scopeBimbingansemhas($query,$nim){
        return $query->select('*')
        ->join('ta_pembimbing','ta_pembimbing.pembimbing','=','ref_dosen.id')
        ->join('ta','ta.id','=','ta_pembimbing.ta_id')
        ->join('ta_seminar','ta_seminar.ta_id','=','ta.id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->where('nip',$nim)
        ->orderBy('ta_seminar.created_at','desc')
        ->get();
    }

    //Digunakan SemhasController (Dosen)
    public function scopeGetbimbingansemhas($query,$id,$nim){
        return $query->select('*','ta_pembimbing.id')
        ->join('ta_pembimbing','ta_pembimbing.pembimbing','=','ref_dosen.id')
        ->join('ta','ta.id','=','ta_pembimbing.ta_id')
        ->join('ta_seminar','ta_seminar.ta_id','=','ta.id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->join('ref_peminatan','ref_peminatan.id','=','ta.peminatan_id')
        ->where('ta_seminar.ta_id',$id)
        ->where('nip',$nim)
        ->first();
    }

    //Digunakan PendadaranController (Dosen)
    public function scopeBimbinganpendadaran($query,$nim){
        return $query->select('*')
        ->join('ta_pembimbing','ta_pembimbing.pembimbing','=','ref_dosen.id')
        ->join('ta','ta.id','=','ta_pembimbing.ta_id')
        ->join('ta_pendadaran','ta_pendadaran.ta_id','=','ta.id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->where('nip',$nim)
        ->orderBy('ta_pendadaran.created_at','desc')
        ->get();
    }

    //Digunakan PendadaranController (Dosen)
    public function scopeGetbimbinganpendadaran($query,$id,$nim){
        return $query->select('*','ta_pembimbing.id')
        ->join('ta_pembimbing','ta_pembimbing.pembimbing','=','ref_dosen.id')
        ->join('ta','ta.id','=','ta_pembimbing.ta_id')
        ->join('ta_pendadaran','ta_pendadaran.ta_id','=','ta.id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->join('ref_peminatan','ref_peminatan.id','=','ta.peminatan_id')
        ->where('ta_pendadaran.ta_id',$id)
        ->where('nip',$nim)
        ->first();
    }

    //Digunakan TajudulController (Dosen)
    public function scopeGantijudulta($query,$nim){
        return $query->select('*')
        ->join('ta_pembimbing','ta_pembimbing.pembimbing','=','ref_dosen.id')
        ->join('ta','ta.id','=','ta_pembimbing.ta_id')
        ->join('log_judul_ta','log_judul_ta.ta_id','=','ta.id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->where('nip',$nim)
        ->orderBy('tgl_pengajuan','desc')
        ->get();
    }

    //Digunakan TajudulController (Dosen)
    public function scopeGetgantijudulta($query,$id,$nim){
        return $query->select('*','ta_pembimbing.id')
        ->join('ta_pembimbing','ta_pembimbing.pembimbing','=','ref_dosen.id')
        ->join('ta','ta.id','=','ta_pembimbing.ta_id')
        ->join('log_judul_ta','log_judul_ta.ta_id','=','ta.id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->where('log_judul_ta.ta_id', $id)
        ->where('nip',$nim)
        ->orderBy('tgl_pengajuan','desc')
        ->first();
    }

    //Digunakan TapembimbingController (Dosen)
    public function scopePembimbingta($query,$nim){
        return $query->select('*','ref_dosen.id')
        // ->join('log_pembimbing_ta','log_pembimbing_ta.pembimbing_baru','=','ref_dosen.id')
        ->join('log_pembimbing2_ta', function ($join){
            $join->on('ref_dosen.id', '=', 'log_pembimbing2_ta.pembimbing_lama')
            ->orOn('ref_dosen.id','=','log_pembimbing2_ta.pembimbing_baru');
        })
        ->join('log_pembimbing_ta','log_pembimbing_ta.id','=','log_pembimbing2_ta.log_pembimbing_ta_id')
        ->join('ta','ta.id','=','log_pembimbing_ta.ta_id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->where('nip',$nim)
        ->orderBy('log_pembimbing_ta.created_at','desc')
        ->get();
    }

    //Digunakan TapembimbingController (Dosen)
    public function scopeGetpembimbingbaruta($query,$id,$nim){
        return $query->select('*','log_pembimbing2_ta.id')
        ->join('log_pembimbing2_ta', 'ref_dosen.id', '=', 'log_pembimbing2_ta.pembimbing_baru')
        ->join('log_pembimbing_ta','log_pembimbing_ta.id','=','log_pembimbing2_ta.log_pembimbing_ta_id')
        ->join('ta','ta.id','=','log_pembimbing_ta.ta_id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->where('log_pembimbing_ta.ta_id',$id)
        ->where('nip',$nim)
        // ->orderBy('log_pembimbing_ta.created_at','desc')
        ->first();
    }

    //Digunakan TapembimbingController (Dosen)
    public function scopeGetpembimbinglamata($query,$id,$nim){
        return $query->select('*','log_pembimbing2_ta.id')
        ->join('log_pembimbing2_ta', 'ref_dosen.id', '=', 'log_pembimbing2_ta.pembimbing_lama')
        ->join('log_pembimbing_ta','log_pembimbing_ta.id','=','log_pembimbing2_ta.log_pembimbing_ta_id')
        ->join('ta','ta.id','=','log_pembimbing_ta.ta_id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->where('log_pembimbing_ta.ta_id',$id)
        ->where('nip',$nim)
        // ->orderBy('log_pembimbing_ta.created_at','desc')
        ->first();
    }

    //Digunakan TaperpanjanganController (Dosen)
    public function scopePerpanjangan($query,$nim){
        return $query->select('*')
        ->join('ta_pembimbing','ta_pembimbing.pembimbing','=','ref_dosen.id')
        ->join('ta','ta.id','=','ta_pembimbing.ta_id')
        ->join('log_perpanjangan_ta','log_perpanjangan_ta.ta_id','=','ta.id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->where('nip',$nim)
        ->get();
    }

    //Digunakan TaperpanjanganController (Dosen)
    public function scopeGetperpanjangan($query,$id,$nim){
        return $query->select('*','ta_pembimbing.id')
        ->join('ta_pembimbing','ta_pembimbing.pembimbing','=','ref_dosen.id')
        ->join('ta','ta.id','=','ta_pembimbing.ta_id')
        ->join('log_perpanjangan_ta','log_perpanjangan_ta.ta_id','=','ta.id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->where('log_perpanjangan_ta.ta_id',$id)
        ->where('nip',$nim)
        ->first();
    }

    //Digunakan LogbooktaController (Dosen) & HomeController
    public function scopeBimbinganlogbookta($query,$nim){
        return $query->join('ta_pembimbing','ta_pembimbing.pembimbing','=','ref_dosen.id')
        ->join('ta','ta.id','=','ta_pembimbing.ta_id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->join('ta_logbook','ta_logbook.mahasiswa_id','=','ref_mahasiswa.id')
        ->where('nip',$nim)
        ->orderBy('ta_logbook.created_at','desc')
        ->select('*','ta_logbook.id')
        ->get();
    }

    //Digunakan SemhasController (Dosen/Penguji)
    public function scopePengujisemhas($query,$nim){
        return $query->select('*')
        ->join('ta_penguji','ta_penguji.penguji_semhas','=','ref_dosen.id')
        ->join('ta','ta.id','=','ta_penguji.ta_id')
        ->join('ta_seminar','ta_seminar.ta_id','=','ta.id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->where('nip',$nim)
        ->orderBy('ta_seminar.created_at','desc')
        ->get();
    }

    //Digunakan SemhasController (Dosen)
    public function scopeGetpengujisemhas($query,$id,$nim){
        return $query->select('*','ta_penguji.id')
        ->join('ta_penguji','ta_penguji.penguji_semhas','=','ref_dosen.id')
        ->join('ta','ta.id','=','ta_penguji.ta_id')
        ->join('ta_seminar','ta_seminar.ta_id','=','ta.id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->join('ref_peminatan','ref_peminatan.id','=','ta.peminatan_id')
        ->where('ta_seminar.ta_id',$id)
        ->where('nip',$nim)
        ->first();
    }

    //Digunakan Pendadarantroller (Dosen/Penguji)
    public function scopePengujipendadaran($query,$nim){
        return $query->select('*')
        ->join('ta_penguji','ta_penguji.penguji_pendadaran','=','ref_dosen.id')
        ->join('ta','ta.id','=','ta_penguji.ta_id')
        ->join('ta_pendadaran','ta_pendadaran.ta_id','=','ta.id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->where('nip',$nim)
        ->orderBy('ta_pendadaran.created_at','desc')
        ->get();
    }

    //Digunakan PendadaranController (Dosen/Penguji)
    public function scopeGetpengujipendadaran($query,$id,$nim){
        return $query->select('*','ta_penguji.id')
        ->join('ta_penguji','ta_penguji.penguji_pendadaran','=','ref_dosen.id')
        ->join('ta','ta.id','=','ta_penguji.ta_id')
        ->join('ta_pendadaran','ta_pendadaran.ta_id','=','ta.id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->join('ref_peminatan','ref_peminatan.id','=','ta.peminatan_id')
        ->where('ta_pendadaran.ta_id',$id)
        ->where('nip',$nim)
        ->first();
    }

    public function statusKp($mhsid){
        return Kp::join('ref_mahasiswa','kp.mahasiswa_id','=','ref_mahasiswa.id')
        ->where('ref_mahasiswa.id', $mhsid)->get();
    }

    //Index Logbookta(Dosen)
    public function logcount($idta){
        return Mahasiswa::join('ta_logbook','ta_logbook.mahasiswa_id','=','ref_mahasiswa.id')
        ->where('ref_mahasiswa.id',$idta)->count();
    }

    //Index Logbookta(Dosen)
    public function accepted1($idta){
        return Mahasiswa::join('ta_logbook','ta_logbook.mahasiswa_id','=','ref_mahasiswa.id')
        ->where('ref_mahasiswa.id',$idta)->where('status_logbook1',1)->count();
    }

    //Index Logbookta(Dosen)
    public function draft1($idta){
        return Mahasiswa::join('ta_logbook','ta_logbook.mahasiswa_id','=','ref_mahasiswa.id')
        ->where('ref_mahasiswa.id',$idta)->where('status_logbook1',2)->count();
    }

    //Digunkan di dosen/draft/index
    public function statusHalpengesahan($id){
        return Halpengesahan::join('ref_mahasiswa','ref_mahasiswa.id','=','hal_pengesahan.mahasiswa_id')
            ->where('mahasiswa_id',$id)->get();
    }

}
