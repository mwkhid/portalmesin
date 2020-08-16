<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Kp extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kp';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = ['perusahaan_nama','perusahaan_almt','perusahaan_jenis','pic','tgl_mulai_kp','tgl_selesai_kp'];

    protected $guarded = [];

    const CREATED_AT = 'tgl_ajuan';
    //Eloquent terhadap Tabel Mahasiswa
    public function mahasiswa(){
        return $this->belongsTo('App\Models\Mahasiswa');
    }

    //Eloquent Relationship terhadap Tabel Seminar KP
    public function seminarkp(){
        return $this->hasOne('App\Models\Seminarkp');
    }

    //Digunakan di KpController
    public function scopeSetuju($query,$nim){
        return $query->where('status_kp','=','SETUJU')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
        ->where('nim',$nim)
        ->select('*','kp.id','kp.sks','kp.ipk');
    }

    //Digunakan di KpController
    public function scopeWaiting($query,$nim){
        return $query->where('status_kp','=','WAITING')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
        ->join('kp_dokumen','kp_dokumen.kp_id','=','kp.id')
        ->join('kp_rencana','kp_rencana.kp_id','=','kp.id')
        ->where('nim',$nim)
        ->select('*','kp.id','kp.sks','kp.ipk');
    }
    //Digunakan di KpController
    public function scopePending($query,$nim){
        return $query->where('status_kp','=','PENDING')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
        ->join('kp_rencana','kp_rencana.kp_id','=','kp.id')
        ->where('nim',$nim)
        ->select('*','kp.id','kp.sks','kp.ipk');
    }
    //Digunakan di KpController
    public function scopeTolak($query,$nim){
        return $query->where('status_kp','=','TOLAK')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
        ->where('nim',$nim)
        ->select('*','kp.id');
    }
    //Digunakan di KpController
    public function scopeEdit($query,$nim){
        return $query->where('status_kp','=','EDIT')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
        ->join('kp_rencana','kp_rencana.kp_id','=','kp.id')
        ->where('nim',$nim)
        ->select('*','kp.id');
    }
    //Digunakan di KpController
    public function scopeForm($query,$nim){
        return $query->where('nim',$nim)
            ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
            ->join('ref_dosen','ref_mahasiswa.pem_kp','=','ref_dosen.id')
            ->join('kp_rencana','kp_rencana.kp_id','=','kp.id')
            ->select('*');
    }
    //Digunakan di KpController
    public function scopeCetak($query,$nim){
        return $query->where('nim',$nim)
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
        ->join('ref_dosen','ref_mahasiswa.pem_kp','=','ref_dosen.id')
        ->join('kp_dokumen','kp.id','=','kp_dokumen.kp_id')
        ->select('nama_mhs','nim','nama_dosen','nip','perusahaan_nama','perusahaan_almt','tgl_mulai_kp','tgl_selesai_kp','file_balasan','penugasan_kp','tgl_penugasan_kp','signature_dosen');
    }

    //Digunakan di HomeController
    public function scopeListkp($query){
        return $query->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
            ->select('nama_mhs','nim','perusahaan_nama','perusahaan_almt')
            ->where('status_kp','SETUJU')
            ->orderBy('tgl_ajuan', 'desc')
            ->get();
    }

    //Digunakan di PengajuanController
    public function scopeGetpending($query){
        return $query->where('status_kp','=','PENDING')->orWhere('status_kp','=','WAITING')
        ->orWhere('status_kp','=','TOLAK')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
        ->orderBy('tgl_ajuan','desc')
        ->select('*','kp.id');
    }

    //Digunakan di PermohonanController
    public function scopeGetwaiting($query){
        return $query->where('status_kp','=','WAITING')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
        ->orderBy('tgl_ajuan','desc')
        ->select('*','kp.id');
    }

    //Digunakan di PenugasanController
    public function scopeGetsetuju($query){
        return $query->where('status_kp','=','SETUJU')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
        ->orderBy('tgl_ajuan','desc')
        ->select('*','kp.id');
    }

    //Digunakan di PengajuanController
    public function scopeGetpengajuan($query, $id){
        return $query->where('kp.id',$id)
                // ->where('status_kp','PENDING')->orWhere('status_kp','=','WAITING')
                ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
                ->join('kp_rencana','kp_rencana.kp_id','=','kp.id')
                ->select('*','kp.id','kp.sks','kp.ipk')
                ->firstOrFail();
    }

    //Digunakan di BalasanController
    public function scopeGetbalasan($query, $id){
        return $query->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
                ->join('kp_rencana','kp_rencana.kp_id','=','kp.id')
                ->join('kp_acc_pembimbing','kp_acc_pembimbing.mahasiswa_id','=','kp.mahasiswa_id')
                ->where('status_kp','WAITING')
                ->where('kp.id',$id)
                ->select('*','kp.id','kp.sks','kp.ipk','kp.penugasan_kp')
                ->firstOrFail();
    }

    //Digunakan di PenugasanController
    public function scopeGetpenugasan($query, $id){
        return $query->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
                ->join('kp_surat','kp_surat.kp_id','=','kp.id')
                ->where('status_kp','SETUJU')
                ->where('kp.id',$id)
                ->select('*','kp.id','kp.sks','kp.ipk')
                ->firstOrFail();
    }

    //Digunakan di PenugasanController
    public function scopeCetakpenugasan($query, $id){
        return $query->select('*','kp.id')
                ->join('ref_mahasiswa','ref_mahasiswa.id','=','kp.mahasiswa_id')
                ->join('kp_surat','kp_surat.kp_id','=','kp.id')
                ->join('kp_acc','kp_acc.kp_id','=','kp.id')
                ->where('kp.id',$id)
                ->firstOrFail();
    }

    //DIgunakan di HomeController
    public function scopeStatuskp($query,$id){
        return $query->select('*')
            ->where('mahasiswa_id',$id);
    }

    //DIgunakan di ListController (Semkp)
    public function selesai_kp()
    {
        return Carbon::createFromTimestamp(strtotime($this->tgl_selesai_kp))->addDays(90)->format('Y-m-d');
    }
}
