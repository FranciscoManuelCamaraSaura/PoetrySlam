<?php

namespace App\Http\Controllers;

use App\Models\Poet;
use Illuminate\Http\Request;

class PoetController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$output = new \Symfony\Component\Console\Output\ConsoleOutput();
		// $output->writeln($request);

		return view("poets.index_poets", ["poets" => Poet::all()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view("poets.create_poet");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$poet = new Poet($request -> input());

		$poet -> saveOrFail();

		return redirect() -> route("poets.index") -> with(["mensaje" => "Usuario creado"]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Poet  $poet
	 * @return \Illuminate\Http\Response
	 */
	public function show(Poet $poet) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Poet  $poet
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Poet $poet) {
		return view("poets.edit_poets", ["poet" => $poet]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Models\Poet  $poet
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Poet $poet) {
		$poet -> fill($request -> input()) -> saveOrFail();

		return redirect() -> route("poets.index") -> with(["mensaje" => "Usuario actualizado"]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Poet  $poet
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Poet $poet) {
		$poet -> delete();

		return redirect() -> route("poets.index") -> with(["mensaje" => "Usuario eliminado"]);
	}

}
