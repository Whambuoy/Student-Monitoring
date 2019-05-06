<?php

namespace App\Http\Controllers;
use App\Messages\AfricasTalkingGateway;

class SMSController extends Controller{
	public function test(){
		// Set your app credentials
		$username   = "MyAppsUsername";
		$apiKey     = "MyAppAPIKey";

		$sms         = new AfricasTalking($username, $apiKey);


				// Set the numbers you want to send to in international format
		$recipients = "+254720068917";

		// Set your message
		$message    = "I'm a lumberjack and its ok, I sleep all night and I work all day";

		try {
		    // Thats it, hit send and we'll take care of the rest
		    $result = $sms->sendMessage($recipients, $message);

		    print_r($result);
		} catch (Exception $e) {
		    echo "Error: ".$e->getMessage();
		}
	}

}

