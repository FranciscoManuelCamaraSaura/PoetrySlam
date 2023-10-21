<?php

namespace App\Http\Controllers;

use App\Mail\NewUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$output = new \Symfony\Component\Console\Output\ConsoleOutput();
		// $output->writeln($request);

		return view("users.index_users", ["users" => User::all()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view("users.create_user");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$user = new User($request -> input());

		$user -> saveOrFail();
		Mail::to($user -> email) -> send(new NewUser($user));

		return redirect() -> route("users.index_users") -> with(["mensaje" => "Usuario creado"]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function show(User $user) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $user) {
		return view("users.edit_user", ["user" => $user]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Models\User  $user
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $user) {
		$user -> fill($request -> input()) -> saveOrFail();

		return redirect() -> route("users.index_users") -> with(["mensaje" => "Usuario actualizado"]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(User $user) {
		$user -> delete();

		return redirect() -> route("users.index_users") -> with(["mensaje" => "Usuario eliminado"]);
	}

}
