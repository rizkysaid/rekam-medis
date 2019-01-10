<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';

    public $timestamps = true;

    protected $fillable = [
    	'id',
    	'nama',
        'id_gender',
    	'alamat',
        'tgl_lahir',
        'usia',
    	'no_telp',
    	'id_poli',
    	'id_spesialis',
    	'created_at',
    	'updated_at'
    ];

    public function gender(){
        return $this->belongsTo(Gender::class);
    }    

    public function poli(){
        return $this->belongsTo(Poli::class);
    }

    public function spesialis(){
        return $this->belongsTo(Spesialis::class);
    }    

}
