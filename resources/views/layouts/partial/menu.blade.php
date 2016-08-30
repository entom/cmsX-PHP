<div class="navbar-fixed">
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="{{ url('/account') }}">My Account</a></li>
        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
    </ul>
    <nav class="light-blue darken-1">
        <div class="nav-wrapper container">
            <a href="{{ url('/') }}" class="brand-logo">Logo</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{ url('/') }}">Home</a></li>
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li><a href="{{ url('/Shopping Cart') }}">Tasks</a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
                @endif
            </ul>
        </div>
    </nav>
</div>