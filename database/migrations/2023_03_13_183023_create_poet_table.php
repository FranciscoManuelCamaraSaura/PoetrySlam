<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoetTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('poet', function (Blueprint $table) {
			$table -> id();
			$table -> string('name');
			$table -> integer('board_1');
			$table -> integer('board_2');
			$table -> integer('board_3');
			$table -> integer('board_4');
			$table -> integer('board_5');
			$table -> integer('average');
			$table -> integer('order');
			$table -> string('time_consumed');
			$table -> string('time_left');
			$table -> timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('poet');
	}
	
}
