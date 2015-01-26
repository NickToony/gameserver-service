@extends('layout.main')

@section('content')
    @include('layout.errors')

    {{ Form::open(array('url'=> URL::route('game-add'))) }}
    <div class="form-group">
        <label for="name">Game Name:</label>
        <input type="text" class="form-control" name="name" value="{{ Input::old("name") }}">
    </div>
    <button type="submit" class="btn btn-success">Create</button>
    {{ Form::close() }}
@stop