<?php

class GameController extends BaseController
{
    public function getAdd()
    {
        return View::make('game.add');
    }

    public function postAdd()
    {
        $name = Input::get("name");

        $rules = [
            'name' => 'required|min:4|max:30|unique:games',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {
            $game = new Game();
            $game->name = $name;
            $game->user_id = Auth::User()->id;
            $game->active = true;
            $game->public = true;
            //$game->api_key = Hash::make(str_random(40));
            $game->api_key = str_random(60);
            $game->save();

            return Redirect::route('game-manage', array($game->id));
        } else {
            return Redirect::route('game-add')
                ->withInput()
                ->withErrors($validator);
        }
    }

    public function getManage($id)
    {
        $game = Game::findOrFail($id);
        return View::make("game.manage", array("game" => $game));
    }

    public function getDelete($id)
    {
        $game = Game::findOrFail($id);
        if (!empty($game)) {
            $game->delete();
        }

        return Redirect::route('dashboard');
    }

    public function getToggleStatus($id)
    {
        $game = Game::findOrFail($id);
        $game->active = !$game->active;
        $game->save();

        return Redirect::back();
    }

    public function getTogglePublic($id)
    {
        $game = Game::findOrFail($id);
        $game->public = !$game->public;
        $game->save();

        return Redirect::back();
    }

    public function getViewGame($id)
    {
        // Check game belongs to user
        $game = Game::find($id);

        if (!$game->public) {
            if (!Auth::check() || $game->user_id != Auth::getUser()->id) {
                App::abort(404);
            }
        }

        // Get all servers for specified game
        $servers = Server::where('game_id', '=', $game->id)
            ->paginate(15);

        return View::make('game.view', array(
            "game" => $game,
            "servers" => $servers,
            "mine" => (Auth::check() && Auth::user()->id == $game->user_id)
        ));
    }

}
