<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Round extends Model {
	use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'number',
		'poet'
	];

	public function round() {
		return $this -> belongsTo('App\Models\Event', 'round');
	}

	public function poet() {
		return $this -> hasMany('App\Models\Poet', 'poet');
	}

	public static function getRound($round) {
		return Round::where('id', '=', $round) -> get();
	}

}
