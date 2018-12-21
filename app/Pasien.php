<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';

    protected $fillable = [
    	'id',
    	'no_rm',
    	'nama',
    	'id_sex',
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
}
