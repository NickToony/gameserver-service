<?php

class APIController extends BaseController {

	/**
	 * Helper method provides the rules for validating a server's details
	 * @param $serverId
	 * @param $gameId
	 * @return array
	 */
	private function getValidationRules($serverId, $gameId)
	{
		return [
			'name' => 'required|min:5|max:60|unique:servers,name,' . $serverId . ',id,game_id,' . $gameId,
			'current_players' => 'required|integer|min:0',
			'max_players' => 'required|integer|min:0'
		];
	}

	/**
	 * Get all servers for the specified game
	 *
	 * @param $id
	 * @return mixed
	 */
	public function getGame($id)
	{
		// Get game based on API key
		$game = Game::where('api_key', '=', $id)->firstOrFail();

		// Get all servers for specified game (with pagination)
		$servers = Server::where('game_id', '=', $game->id)
			->select('id', 'name', 'current_players', 'max_players', 'meta')
			->paginate(30);

		return Response::make($servers);
	}

	/**
	 * Post a new server to the list
	 *
	 * @param $id
	 * @return mixed
	 */
	public function postGame($id)
	{
		// Get game based on API key
		$game = Game::where('api_key', '=', $id)->firstOrFail();

		// Check input
		$rules = $this->getValidationRules(null, $game->id);
		$validator = Validator::make(Input::all(), $rules);
		if (!$validator->passes()) {
			return Response::make(array("success" => false, "errors" => $validator->messages()));
		}

		// Setup the server
		$server = new Server;
		$server->name = Input::get('name');
		$server->current_players = Input::get('current_players');
		$server->max_players = Input::get('max_players');
		$server->game_id = $game->id;
		$server->meta = Input::except("current_players", "max_players", "name");
		$server->api_password = Hash::make(str_random(40));

		$server->save();

		return Response::make(array("success" => true, "password" => $server->api_password, "id" => $server->id));
	}

	/**
	 * Post an update to the specified server, using the api_password
	 *
	 * @param $gameAPI
	 * @param $serverId
	 * @return mixed
	 */
	public function postUpdate($gameAPI, $serverId) {
		// Get game based on API key
		$game = Game::where('api_key', '=', $gameAPI)->firstOrFail();

		// Get the server
		$server = Server::where('game_id', '=', $game->id)->findOrFail($serverId);

		if ($server->api_password != Input::get('password')) {
			App::abort(403);
		}

		// Check input
		$rules = $this->getValidationRules($serverId, $game->id);
		$validator = Validator::make(Input::all(), $rules);
		if (!$validator->passes()) {
			return Response::make(array("success" => false, "errors" => $validator->messages()));
		}

		// Assign new values
		$server->name = Input::get('name');
		$server->current_players = Input::get('current_players');
		$server->max_players = Input::get('max_players');
		$server->meta = Input::except("current_players", "max_players", "name", "password");
		$server->touch();

		$server->update();

		return Response::make(array("success" => true));
	}

}
