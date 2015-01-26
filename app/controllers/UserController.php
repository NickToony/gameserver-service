<?php

class UserController extends BaseController {

	public function getAccount()
	{
        return View::make('user.account', array("user" => Auth::User()));
	}

}
