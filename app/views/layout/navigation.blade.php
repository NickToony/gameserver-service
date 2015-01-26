<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::route('home') }}">Gameserver Service</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                @if ( !Auth::check() )
                    <li><a href="{{ URL::route('home') }}">Home</a></li>
                    <li><a href="{{ URL::route('register') }}">Register</a></li>
                    <li><a href="{{ URL::route('login') }}">Login</a></li>
                @else
                    <li><a href="{{ URL::route('home') }}">Home</a></li>
                    <li><a href="{{ URL::route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ URL::route('game-add') }}">Add Game</a></li>
                @endif

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Account<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        @if ( !Auth::check() )
                            <li><a href="{{ URL::route('login') }}">Login</a></li>
                            <li><a href="{{ URL::route('register') }}">Register</a></li>
                        @else
                            <li><a href="{{ URL::route('user-account') }}">View Account</a></li>
                            <li><a href="{{ URL::route('logout') }}">Logout</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>