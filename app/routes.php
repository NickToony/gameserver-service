<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array(
    'as' => 'home',
    'uses' => 'HomeController@getHome'
));



/**
 * Auth routes
 */
Route::post('/login', array(
    'before' => 'guest',
    'uses' => 'AuthController@postLogin'
));

Route::get('/login', array(
    'as' => 'login',
    'before' => 'guest',
    'uses' => 'AuthController@getLogin'
));

Route::post('/register', array(
    'before' => 'guest',
    'uses' => 'AuthController@postRegister'
));

Route::get('/register', array(
    'as' => 'register',
    'before' => 'guest',
    'uses' => 'AuthController@getRegister'
));

Route::get('/logout', array(
    'as' => 'logout',
    'uses' => 'AuthController@getLogout'
));

Route::get('/dashboard', array(
    'as' => 'dashboard',
    'before' => 'auth',
    'uses' => 'DashboardController@getDashboard'
));



/**
 * Game Routes
 */
Route::get('/game/add', array(
    'as' => 'game-add',
    'before' => 'auth',
    'uses' => 'GameController@getAdd'
));

Route::post('/game/add', array(
    'as' => 'game-add',
    'before' => 'auth',
    'uses' => 'GameController@postAdd'
));

Route::get('/game/manage/{id}', array(
    'as' => 'game-manage',
    'before' => 'auth',
    'uses' => 'GameController@getManage'
))->where(array("id" => "[0-9]+"));

Route::get('/game/manage/{id}/delete', array(
    'as' => 'game-delete',
    'before' => 'auth',
    'uses' => 'GameController@getDelete'
))->where(array("id" => "[0-9]+"));

Route::get('/game/manage/{id}/toggle-status', array(
    'as' => 'game-toggle-status',
    'before' => 'auth',
    'uses' => 'GameController@getToggleStatus'
))->where(array("id" => "[0-9]+"));

Route::get('/game/manage/{id}/toggle-public', array(
    'as' => 'game-toggle-public',
    'before' => 'auth',
    'uses' => 'GameController@getTogglePublic'
))->where(array("id" => "[0-9]+"));

Route::get('/game/view/{id}', array(
    'as' => 'game-view',
    'uses' => 'GameController@getViewGame'
))->where(array("id" => "[0-9]+"));



/**
 * User Routes
 */
Route::get('/user/account', array(
    'as' => 'user-account',
    'before' => 'auth',
    'uses' => 'UserController@getAccount'
));


/**
 * API Routes
 */
Route::get('/api/game/{id}', array(
    'as' => 'api-game-get',
    'uses' => 'APIController@getGame'
));

Route::post('/api/game/{id}', array(
    'as' => 'api-game-add',
    'uses' => 'APIController@postGame'
));

Route::post('/api/game/{gameAPI}/{serverId}', array(
    'as' => 'api-game-update',
    'uses' => 'APIController@postUpdate'
))->where(array("serverId" => "[0-9]+"));;