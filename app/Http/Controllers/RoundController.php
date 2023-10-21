<?php

namespace App\Http\Controllers;

use App\Models\Round;
use Illuminate\Http\Request;

class RoundController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$output = new \Symfony\Component\Console\Output\ConsoleOutput();
		// $output->writeln($request);

		return view("rounds.index_rounds", ["rounds" => Round::all()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view("rounds.create_round");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$round = new Round($request -> input());

		$round -> saveOrFail();

		return redirect() -> route("rounds.index") -> with(["mensaje" => "Usuario creado"]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Round  $round
	 * @return \Illuminate\Http\Response
	 */
	public function show(Round $round) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Round  $round
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Round $round) {
		return view("rounds.edit_rounds", ["round" => $round]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Models\Round  $round
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Round $round) {
		$round -> fill($request -> input()) -> saveOrFail();

		return redirect() -> route("rounds.index") -> with(["mensaje" => "Usuario actualizado"]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Round  $round
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Round $round) {
		$round -> delete();

		return redirect() -> route("rounds.index") -> with(["mensaje" => "Usuario eliminado"]);
	}

}
