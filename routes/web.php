<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| Route::resource('users', 'UserController') -> parameters(['plurales'=>'plural']);
|
*/

Auth::routes();

// Common's routes for tables
Route::group([
	'middleware' => 'admin', 'auth'
	//, 'prefix' => 'admin', 'namespace' => 'Admin'
], function () {
	Route::get('/home', 'HomeController@index') -> name('home');
});

// Admin's routes for tables
Route::group([
	'middleware' => 'admin'
], function () {
	Route::resource('users', 'UserController@index');
	Route::resource('user', 'UserController@create');
	Route::resource('user', 'UserController@store');
	Route::resource('user', 'UserController@destroy');
});

// User's routes for tables
Route::group([
	'middleware' => 'auth'
], function () {
	Route::get('/profile', 'UserController@show');
	Route::get('/editUser', 'UserController@edit');
	Route::resource('user', 'UserController@update');

	Route::resource('ubication', 'UbicationController');
	Route::resource('round', 'RoundController');
	Route::resource('poet', 'PoetController');
	Route::resource('event', 'EventController');
});

// Public routes
Route::get('/contact', [EmailController::class, 'contact']);

