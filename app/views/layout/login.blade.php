<h2>Login</h2>

@include('layout.errors')


{{ Form::open(array('url'=> URL::route('login'))) }}
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" name="username" value="{{ Input::old("username") }}">
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="checkbox">
        <label><input type="checkbox" name="remember" {{ Input::old("remember") ? "checked" : "" }}> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Login</button>
{{ Form::close() }}