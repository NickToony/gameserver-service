@extends('layout.main')

@section('content')

    <div class="row vertical-align">
        <div class="col-sd-6 col-md-6 col-xs-6">
            <h3 class="no-margin">{{ $game->name }}</h3>

            <p class="no-margin">You're viewing all currently active servers.</p>
        </div>
        @if ($mine)
            <div class="col-sd-6 col-md-6 col-xs-6">
                <div class="pull-right">
                    <a href="{{ URL::route("game-manage", array($game->id)) }}">
                        <button type="button" class="btn btn-warning">Manage Game</button>
                    </a>
                </div>
            </div>
        @endif
    </div>

    <hr/>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Server Name</th>
                <th>Players</th>
            </tr>
            </thead>
            <tbody>

            @if (!empty($servers))
                @foreach($servers->all() as $server)
                    <tr>
                        <td>{{ $server->name }}</td>
                        <td>{{ $server->current_players }} / {{ $server->max_players }}</td>
                    </tr>
                @endforeach
            @endif


            </tbody>
        </table>
    </div>

    <div class="text-center">{{ $servers->links() }}</div>
@stop