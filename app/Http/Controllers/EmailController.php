<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller {
	public function contact(Request $request) {
		Mail::send("email.contact", $request -> all(), function($message, $request) {
			$message -> from($request -> email, $request -> user_name);
			$message -> subject($request -> subject);
			$message -> to("agora@poetryslam.com");
		});
		
		return redirect() -> back();
	}

}
