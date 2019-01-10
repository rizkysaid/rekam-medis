<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    protected $table = 'kunjungan';

    protected $fillable = [
    	'id', 'tgl_daftar', 'id_pasien', 'id_poli', 'id_pasien_tp', 'id_status', 'created_at', 'updated_at'
    ];

    public function poli(){
        return $this->belongsTo(Poli::class);
    }

    public function pasien_tp(){
        return $this->belongsTo(Pasien_tp::class);
    }
}
