<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model {
	use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'date',
		'creator',
		'ubication',
		'round'
	];

	public function creator() {
		return $this -> hasOne('App\Models\User', 'creator');
	}

	public function ubication() {
		return $this -> hasOne('App\Models\Ubication', 'ubication');
	}

	public function round() {
		return $this -> hasMany('App\Models\Round', 'round');
	}

	public static function getEvent($event) {
		return Event::where('id', '=', $event) -> get();
	}

}
