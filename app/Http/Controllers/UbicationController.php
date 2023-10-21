<?php

namespace App\Http\Controllers;

use App\Models\Ubication;
use Illuminate\Http\Request;

class UbicationController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$output = new \Symfony\Component\Console\Output\ConsoleOutput();
		// $output->writeln($request);

		return view("ubications.index_ubications", ["ubications" => Ubication::all()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view("ubications.create_ubication");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$ubication = new Ubication($request -> input());

		$ubication -> saveOrFail();

		return redirect() -> route("ubications.index") -> with(["mensaje" => "Usuario creado"]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Ubication  $ubication
	 * @return \Illuminate\Http\Response
	 */
	public function show(Ubication $ubication) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Ubication  $ubication
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Ubication $ubication) {
		return view("ubications.edit_ubications", ["ubication" => $ubication]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Models\Ubication  $ubication
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Ubication $ubication) {
		$ubication -> fill($request -> input()) -> saveOrFail();

		return redirect() -> route("ubications.index") -> with(["mensaje" => "Usuario actualizado"]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Ubication  $ubication
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Ubication $ubication) {
		$ubication -> delete();

		return redirect() -> route("ubications.index") -> with(["mensaje" => "Usuario eliminado"]);
	}

}
