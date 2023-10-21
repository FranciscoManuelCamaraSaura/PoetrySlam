<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('event', function (Blueprint $table) {
			$table -> id();
			$table -> string('date');
			$table -> integer('creator');
			$table -> integer('ubication');
			$table -> integer('round');

			$table -> unique(array('id', 'date', 'ubication', 'round'));

			$table -> foreign('creator')
				-> references('id')
				-> on('user')
				-> onDelete('cascade');

			$table -> foreign('ubication')
				-> references('id')
				-> on('ubication')
				-> onDelete('cascade');

			$table -> foreign('round')
				-> references('id')
				-> on('round')
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
		Schema::dropIfExists('event');
	}
	
}
