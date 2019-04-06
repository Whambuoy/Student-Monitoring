<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personal_info extends Model
{
    public function financials(){
    	return $this->hasOne('App\Financials');
    }
}
