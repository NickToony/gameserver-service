@extends('layout.main')

@section('content')

    <div class="row vertical-align">
        <div class="col-sd-8 col-md-8 col-xs-8">
            <h1>{{ $game->name }}</h1>

            <p>You can manage your game here</p>
        </div>
        <div class="col-sd-4 col-md-4 col-xs-4">
            <div class="pull-right">
                <a href="{{ URL::route("game-view", array($game->id)) }}">
                    <button type="button" class="btn btn-success">View</button>
                </a>
                <a href="{{ URL::route("game-delete", array($game->id)) }}">
                    <button type="button" class="btn btn-danger">Delete Game</button>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sd-6 col-md-6 col-xs-6">
            <h3>Statistics</h3>

            <table class="table table-striped table-bordered">


                <tbody>
                <tr>
                    <td>Current Players Online</td>
                    <td>{{ $game->server->sum("current_players") }}</td>
                </tr>
                <tr>
                    <td>Player Slots Available</td>
                    <td>{{ $game->server->sum("max_players") }}</td>
                </tr>
                <tr>
                    <td>Lowest Players Online</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td>Servers Online</td>
                    <td>{{ $game->server->count() }}</td>
                </tr>
                </tbody>

            </table>


        </div>
        <div class="col-sd-6 col-md-6 col-xs-6">
            <h3>Settings</h3>

            <p><b>Status: </b>{{ $game->active ? "Active" : "Inactive" }}
                <a class="pull-right" href="{{ URL::route("game-toggle-status", array($game->id)) }}">
                    <button type="button" class="btn btn-primary">Toggle</button>
                </a>
            </p>

            <p>An inactive server list will not accept new servers.</p>

            <p><b>Privacy: </b>{{ $game->public ? "Public" : "Private" }}
                <a class="pull-right" href="{{ URL::route("game-toggle-public", array($game->id)) }}">
                    <button type="button" class="btn btn-primary">Toggle</button>
                </a></p>

            <p>A private server can only be accessed with valid API key.</p>

        </div>

    </div>

    <hr/>

    <div>

        <h3>API Access</h3>

        <p>To access the API, you must attach a header with the following API key:</p>

        <p style="word-wrap: break-word;"><b>API Key: </b>{{ $game->api_key }}</p>

    </div>


@stop