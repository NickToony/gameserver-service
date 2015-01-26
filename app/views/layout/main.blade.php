<!DOCTYPE html>
<html>
    @include('layout.head')
    <body>
        @include('layout.navigation')

        <div class="container">
            @if(Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif

            @yield('content')
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ asset('bower/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    </body>
</html>