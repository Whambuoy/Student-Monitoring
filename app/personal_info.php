<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personal_info extends Model
{
    public $primaryKey = 'reg_no';

    public function financials(){
    	return $this->hasOne('App\personal_info');
    }
}
