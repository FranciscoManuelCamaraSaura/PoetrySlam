<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUser extends Mailable {
	use Queueable, SerializesModels;

	public $user;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($user) {
		$this -> user = $user;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		return $this -> from("no-reply@poetryslam.com", "Sistema automatizado de envio de notificaciones")
			-> subject("Registro de un nuevo usuario")
			-> view("email.new_user", ["usuario" => $this -> user]);
	}

}
