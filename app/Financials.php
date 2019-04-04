<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Financials extends Model
{
    public function student(){
    	return $this->belongsTo('App\personal_info');
    }
}
