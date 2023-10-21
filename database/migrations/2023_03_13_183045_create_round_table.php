<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoundTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('round', function (Blueprint $table) {
			$table -> id();
			$table -> integer('number');
			$table -> integer('poet');

			$table -> unique(array('id', 'number', 'poet'));

			$table -> foreign('poet')
				-> references('id') -> on('poet')
				-> onDelete('cascade');

			$table -> timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('round');
	}
	
}
