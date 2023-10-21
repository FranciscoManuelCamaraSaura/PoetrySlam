<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Mail\NewUser;
use App\Models\User;

class ExampleTest extends TestCase {
	public function test_mailable_content() {
		$user = User::factory() -> create();

		$mailable = new NewUser($user);

		$mailable -> assertSeeInHtml($user -> email);
		$mailable -> assertSeeInHtml('Invoice Paid');

		$mailable -> assertSeeInText($user -> email);
		$mailable -> assertSeeInText('Invoice Paid');
	}

}
