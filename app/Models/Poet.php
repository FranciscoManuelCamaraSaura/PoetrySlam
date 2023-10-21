<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poet extends Model {
	use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'name',
		'board_1',
		'board_2',
		'board_3',
		'board_4',
		'board_5',
		'average',
		'order',
		'time_consumed',
		'time_left'
	];

	public function poet() {
		return $this -> belongsTo('App\Models\Round', 'round');
	}

	public static function getPoet($poet) {
		return Poet::where('id', '=', $poet) -> get();
	}

}
