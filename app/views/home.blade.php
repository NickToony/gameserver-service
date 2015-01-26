@extends('layout.main')

@section('content')
    <p>This is the homepage.</p>

    @if (!Auth::check())
        @include('layout.login')
    @else
        <p>You're logged in.</p>
    @endif
@stop