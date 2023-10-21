<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubication extends Model {
	use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'address',
		'location',
		'province',
		'postal_code'
	];

	public function ubication() {
		return $this -> belongsTo('App\Models\Event', 'ubication');
	}

	public static function getUbication($ubication) {
		return Ubication::where('id', '=', $ubication) -> get();
	}

}
