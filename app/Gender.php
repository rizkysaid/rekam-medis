<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = 'gender';
/*
	public function getFullNameAttribute(){
		return $this->id.' '.$this->detail_sex; 
	}*/
	
}
