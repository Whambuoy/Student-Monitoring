<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Financials extends Model
{
    public function student(){
    	$this->belongsTo('App\Students', 'local_key', 'reg_no');
    }
}
