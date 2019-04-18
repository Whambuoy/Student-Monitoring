<?php

namespace App;
use App\personal_info;

use Illuminate\Database\Eloquent\Model;

class Financials extends Model
{
	public function student(){
		return $this->belongsTo('App\personal_info');
	}

	public function populate(){
		$students = personal_info::all();
		$financial = new Financials;

		foreach($students as $student){
			$financial->reg_no = $student->reg_no;
			$financial->student_name = $student->student_name;
			$financial->save();
		}

		return $financial;
	}
}
