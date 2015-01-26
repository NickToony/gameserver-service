<h2>Register</h2>

@include('layout.errors')

{{ Form::open(array('url'=> URL::route('register'))) }}
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="username" class="form-control" name="username" value="{{ Input::old("username") }}">
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" class="form-control" name="password_confirmation">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" value="{{ Input::old("email") }}">
    </div>
    <button type="submit" class="btn btn-default">Register</button>
{{ Form::close() }}