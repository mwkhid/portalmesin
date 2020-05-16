<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logpembimbing2ta extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'log_pembimbing2_ta';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    //TapembimbingController (Dosen)
    public function scopePembimbinglama($query,$id){
        return $query->where('log_pembimbing_ta_id',$id)
        ->join('ref_dosen','log_pembimbing2_ta.pembimbing_lama','=','ref_dosen.id')
        ->select('*','log_pembimbing2_ta.id')
        ->get();
    }

    //TapembimbingController (Dosen)
    public function scopePembimbingbaru($query,$id){
        return $query->where('log_pembimbing_ta_id',$id)
        ->join('ref_dosen','log_pembimbing2_ta.pembimbing_baru','=','ref_dosen.id')
        ->select('*','log_pembimbing2_ta.id')
        ->get();
    }
}
