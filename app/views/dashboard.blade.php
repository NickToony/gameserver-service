@extends('layout.main')

@section('content')

    <div class="row vertical-align">
        <div class="col-sd-6 col-md-6 col-xs-6">
            <p class="no-margin">This is the dashboard. You can see the status of all your active games here.</p>
        </div>
        <div class="col-sd-6 col-md-6 col-xs-6">
            <div class="pull-right">
                <a href="{{ URL::route("game-add") }}">
                    <button type="button" class="btn btn-primary">Add Game</button>
                </a>
            </div>
        </div>
    </div>

    <hr/>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Game Name</th>
                <th>Status</th>
                <th>Privacy</th>
                <th>Players</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @if (!empty($games))
                @foreach($games->all() as $game)
                    <tr>
                        <td>{{ $game['name'] }}</td>
                        <td>{{ $game->active ? "Active" : "Inactive" }}</td>
                        <td>{{ $game->public ? "Public" : "Private" }}</td>
                        <td>{{ $game->server->sum('current_players') }} / {{ $game->server->sum('max_players') }}</td>
                        <td>
                            <div class="pull-right">
                                <a href="{{ URL::route("game-manage", array($game['id'])) }}">
                                    <button type="button" class="btn btn-warning">Manage</button>
                                </a>
                                <a href="{{ URL::route("game-view", array($game['id'])) }}">
                                    <button type="button" class="btn btn-success">View</button>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif


            </tbody>
        </table>
    </div>
@stop