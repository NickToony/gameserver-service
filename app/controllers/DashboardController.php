<?php

class DashboardController extends BaseController {

	public function getDashboard()
	{
		$games = Game::query()
			->where("user_id", "=", Auth::User()->id)
			->with('server')
			->get();

        return View::make('dashboard', array("games" => $games));
	}

}
