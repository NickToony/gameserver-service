@extends('layout.main')

@section('content')



    <div class="row vertical-align">
        <div class="col-sd-6 col-md-6 col-xs-6">
            <h1>{{ $user->username or "" }}</h1>
            @if ($user == Auth::User())
                <p>You're viewing your own account</p>
            @else
                <p>You're viewing someone else's account</p>
            @endif
        </div>
        <div class="col-sd-6 col-md-6 col-xs-6">
            <div class="pull-right">
                <button type="button" class="btn btn-danger">Delete Account</button>
            </div>
        </div>
    </div>

    <hr/>

    <div class="row">
        <div class="col-sd-6 col-md-6 col-xs-6">
            <h3>Change Password</h3>
            {{ Form::open(array('url'=> URL::route('register'))) }}
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Change Password</button>
            {{ Form::close() }}
        </div>
        <div class="col-sd-6 col-md-6 col-xs-6">
            <h3>Change Email</h3>
            {{ Form::open(array('url'=> URL::route('register'))) }}
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="email_confirmation">Confirm Email:</label>
                <input type="email" class="form-control" name="email_confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Change Email</button>
            {{ Form::close() }}
        </div>
    </div>
@stop