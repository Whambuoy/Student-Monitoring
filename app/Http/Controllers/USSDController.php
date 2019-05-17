<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use App\Discipline;
use App\Financials;
use App\Exam1;

class USSDController extends Controller
{
    public function index(){

		// Reads the variables sent via POST from our gateway
		$sessionId   = $_POST["sessionId"];
		$serviceCode = $_POST["serviceCode"];
		$phoneNumber = $_POST["phoneNumber"];
		$text        = $_POST["text"];

		$user_responses = explode('*', $text);
		$Students = Students::all();

		if ($text == "") {
		    // This is the first request. Note how we start the response with CON
		    $response  = "CON Welcome to SMPS Parent Portal \n";
		    $response .= "Please enter your child's registration number\n";

		} else if (((count($user_responses)) == 1) && ($user_responses[0] !== "")){
		    foreach ($Students as $student) {
	            if ($user_responses[0] == $student->reg_no){
	                $response = "CON Enter service number: \n";
		    		$response .= "(Use the parent phone number submitted during student registration) \n";
		    		break;
	            }

	        $response = "END Registration number not found.";
        }
		    

		} else if (((count($user_responses)) == 2) && ($user_responses[1] !== "")){
			foreach ($Students as $student) {
	            if ($user_responses[1] == $student->parent_phone){
				    $response = "CON Please select an option: \n";
				    $response .= "1. Discipline status \n";
				    $response .= "2. Exam results \n";
				    $response .= "3. Financial information \n";
		    		break;
	            }

	        $response = "END Invalid service number";
			}
	        


		} else if($user_responses[2] == "1") { 
			$student = Discipline::where('reg_no', $user_responses[0])->first();

		    $response = "END Discipline status:\n" .$student->reg_no."\n" .$student->student_name ."\n" .$student->status;

		} else if($user_responses[2] == "2") {
			$student = Exam1::where('reg_no', $user_responses[0])->first();

		    $response = "END Exam results:\n" .$student->reg_no."\n" .$student->student_name ."\nCIT 3451:" .$student->unit_code1 ."\nCIT 3451:" .$student->unit_code2 ."\nCIT 3451:" .$student->unit_code3 ."\nCCS 3350:" .$student->unit_code4 ."\nBFB 3252:" .$student->unit_code5 ."\nCIT 2252:" .$student->unit_code6 ."\nCIc 3454:" .$student->unit_code7 ."\nCIT 3453:" .$student->unit_code8 ."\nSPS 3300:" .$student->unit_code9;

		} else if($user_responses[2] == "3") {
			$student = Financials::where('reg_no', $user_responses[0])->first();
		    $response = "END Financial information\n" .$student->reg_no."\n" .$student->student_name ."\nAmount to be paid: " .$student->amount_to_be_paid ."\nAmount paid: " .$student->amount_paid ."\nBalance: " .$student->balance;
		}

		// Echo the response back to the API
		header('Content-type: text/plain');
		echo $response;


    }
}
