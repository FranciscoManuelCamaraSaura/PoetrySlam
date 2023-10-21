<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$output = new \Symfony\Component\Console\Output\ConsoleOutput();
		// $output->writeln($request);

		return view("events.index_events", ["events" => Event::all()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view("events.create_event");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$event = new Event($request -> input());

		$event -> saveOrFail();

		return redirect() -> route("events.index") -> with(["mensaje" => "Usuario creado"]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Event  $event
	 * @return \Illuminate\Http\Response
	 */
	public function show(Event $event) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Event  $event
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Event $event) {
		return view("events.edit_events", ["event" => $event]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Models\Event  $event
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Event $event) {
		$event -> fill($request -> input()) -> saveOrFail();

		return redirect() -> route("events.index") -> with(["mensaje" => "Usuario actualizado"]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Event  $event
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Event $event) {
		$event -> delete();

		return redirect() -> route("events.index") -> with(["mensaje" => "Usuario eliminado"]);
	}

}
