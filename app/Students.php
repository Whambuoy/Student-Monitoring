<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    public function financial(){
    	return $this->hasOne('App\Financials', 'foreign_key', 'reg_no');
    }
}
