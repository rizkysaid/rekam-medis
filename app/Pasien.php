<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';

    public $timestamps = true;

    protected $fillable = [
    	'id',
    	'no_rm',
    	'nama',
    	'id_gender',
    	'tgl_lahir',
    	'tgl_daftar',
    	'usia',
    	'alamat',
    	'no_telp',
    	'id_pekerjaan',
    	'id_pendidikan',
    	'id_status_kawin',
    	'id_gol_darah',
    	'id_pasien_tp',
    	'nm_wali',
    	'no_ktp',
    	'no_bpjs',
    	'created_at',
    	'updated_at',
    ];

    public function gender(){
        return $this->belongsTo(Gender::class);
    }
    public function pekerjaan(){
        return $this->belongsTo(Pekerjaan::class);
    }
    public function pendidikan(){
        return $this->belongsTo(Pendidikan::class);
    }
    public function status_kawin(){
        return $this->belongsTo(Status_kawin::class);
    }
    public function pasien_tp(){
        return $this->belongsTo(Pasien_tp::class);
    }
}
