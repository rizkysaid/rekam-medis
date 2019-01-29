<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medical_rec extends Model
{
    protected $fillable = [
    	'id', 'id_pasien', 'anamnesa', 'tinggi_badan', 'berat_badan', 'suhu_badan', 'tekanan_darah', 'diagnosa_1', 'diagnosa_2', 'icd_1', 'icd_2', 'keterangan', 'tgl_periksa', 'id_dokter', 'id_user', 'created_at', 'updated_at',
    ];

    public function pasien(){
    	return $this->belongsTo(Pasien::class);
    }

}
