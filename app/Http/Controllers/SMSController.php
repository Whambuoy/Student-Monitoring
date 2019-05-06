<?php

namespace App\Http\Controllers;
use App\Messages\AfricasTalkingGateway;
use App\Update;

class SMSController extends Controller{
	public function test($id){
		// Set your app credentials
		$username   = "sandbox";
		$apiKey     = "f6551a8a6366dc6067bc433400c9db194b3eb16f6a22c62902a1c5b26676007c";

		$sms         = new AfricasTalkingGateway($username, $apiKey);


				// Set the numbers you want to send to in international format
		$recipients = "+254720068917";

		// Set your message
		$update = Update::findorFail($id);
		$message    = $update->title ."\n" .$update->message;

		try {
		    // Thats it, hit send and we'll take care of the rest
		    $result = $sms->sendMessage($recipients, $message);
		    $update->sent = "Yes";
		    $update->save();

		    print_r($result);
		} catch (Exception $e) {
		    echo "Error: ".$e->getMessage();
		}
	}

}

