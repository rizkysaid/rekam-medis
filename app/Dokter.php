<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';

    protected $fillable = [
    	'id',
    	'nama',
    	'alamat',
    	'no_telp',
    	'id_poli',
    	'id_spesialis',
    	'created_at',
    	'updated_at'
    ];

    public function poli(){
        return $this->belongsTo(Poli::class);
    }

    public function spesialis(){
        return $this->belongsTo(Poli::class);
    }    

}
