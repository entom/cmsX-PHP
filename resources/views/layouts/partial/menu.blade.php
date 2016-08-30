<div class="navbar-fixed">
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="{{ url('/account') }}">My Account</a></li>
        <li>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
        </li>
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
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
                @endif
            </ul>
        </div>
    </nav>
</div>