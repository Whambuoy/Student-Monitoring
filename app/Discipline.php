<?php

namespace App;
use App\personal_info;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    public function student(){
		return $this->belongsTo('App\personal_info');
	}
}
