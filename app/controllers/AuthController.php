<?php

class AuthController extends BaseController {

    public function postLogin()
    {
        $username = Input::get("username");
        $password = Input::get("password");
        $checked = Input::get("remember") or false;

        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes())
        {
            if (Auth::attempt(array('username' => $username, 'password' => $password), $checked))
            {
                return Redirect::intended(URL::route('home'))
                    ->with('message', 'You are now logged in!');
            }
            else
            {
                return Redirect::route('login')
                    ->withInput()
                    ->withErrors(array("login" => "Invalid username and password combination."));
            }
        }
        else
        {
            return Redirect::route('login')
                ->withInput()
                ->withErrors($validator);
        }
    }

    public function getLogin()
    {
        $received = Session::has("errors") ? Session::get("errors")->getBag("default") : null;
        $errors = array(
            "error_username" => "",
            "error_password" => "",
            "error_login" => "",
            "username" => Input::old("username")
        );


        if (!empty($received)) {
            $errors["error_username"] = $received->first("username");
            $errors["error_password"] = $received->first("password");
            $errors["error_login"] = $received->first("login");
        }
        return View::make('auth.login', $errors);
    }

    public function getRegister()
    {
        $received = Session::has("errors") ? Session::get("errors")->getBag("default") : null;
        $errors = array(
            "error_username" => "",
            "error_password" => "",
            "error_email" => "",
            "error_register" => "",
            "username" => Input::old("username"),
            "email" => Input::old("email")
        );

        if (!empty($received)) {
            $errors["error_username"] = $received->first("username");
            $errors["error_password"] = $received->first("password");
            $errors["error_email"] = $received->first("email");
            $errors["error_register"] = $received->first("register");
        }
        return View::make('auth.register', $errors);
    }

    public function postRegister()
    {
        $username = Input::get("username");
        $password = Input::get("password");
        $password_confirmation = Input::get("password_confirmation");
        $email = Input::get("email");

        $rules = [
            'username' => 'required|min:5|max:30|alpha_num|unique:users',
            'password' => 'required|alpha_num|between:6,30|confirmed',
            'password_confirmation' => 'required|alpha_num|between:6,30',
            'email' => 'required|email|unique:users'
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes())
        {
            $user = new User;
            $user->username = $username;
            $user->password = Hash::make($password);
            $user->email = $email;
            $user->save();

            return Redirect::route('home')
                ->with('message', 'You have registered successfully, you may now login!');;
        }
        else
        {
            return Redirect::route('register')
                ->withInput()
                ->withErrors($validator);
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::route("home");
    }

}
