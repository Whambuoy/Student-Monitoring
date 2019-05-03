<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class USSDController extends Controller
{
    public class index(){

		// Reads the variables sent via POST from our gateway
		$sessionId   = $_POST["sessionId"];
		$serviceCode = $_POST["serviceCode"];
		$phoneNumber = $_POST["phoneNumber"];
		$text        = $_POST["text"];

		if ($text == "") {
		    // This is the first request. Note how we start the response with CON
		    $response  = "CON What would you want to check \n";
		    $response .= "1. My Account \n";
		    $response .= "2. My phone number";

		} else if ($text == "1") {
		    // Business logic for first level response
		    $response = "CON Choose account information you want to view \n";
		    $response .= "1. Account number \n";
		    $response .= "2. Account balance";

		} else if ($text == "2") {
		    // Business logic for first level response
		    // This is a terminal request. Note how we start the response with END
		    $response = "END Your phone number is ".$phoneNumber;

		} else if($text == "1*1") { 
		    // This is a second level response where the user selected 1 in the first instance
		    $accountNumber  = "ACC1001";

		    // This is a terminal request. Note how we start the response with END
		    $response = "END Your account number is ".$accountNumber;

		} else if ( $text == "1*2" ) {
		    // This is a second level response where the user selected 1 in the first instance
		    $balance  = "KES 10,000";

		    // This is a terminal request. Note how we start the response with END
		    $response = "END Your balance is ".$balance;
		}

		// Echo the response back to the API
		header('Content-type: text/plain');
		echo $response;


    }
}
