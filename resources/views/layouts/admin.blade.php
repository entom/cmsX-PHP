<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>CMSX</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/dashboard/css/style.css" type="text/css">

    <script src="/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="/node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="/dashboard/js/init.js"></script>
</head>
<body>
<header class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <a href="{{url('/admin')}}" class="brand-logo">
                cms
                <u>X</u>
            </a>
            <a href="#" data-activates="side-out" class="button-collapse">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li>
                    <a href="sass.html">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="badges.html">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="dropdown-navbar">
                            <span class="navbar__avatar">
                                <img src="/dashboard/images/avatar-male.svg" class="responsive-img">
                            </span>
                        <span class="navbar__user-info">
                                <span class="navbar__user-name">{{ Auth::user()->name }}</span>
                                <u class="navbar__user-role">Administrator</u>
                            </span>
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </a>
                </li>
                <ul id="dropdown-navbar" class="dropdown-content dropdown__navbar">
                    <li><a href="#!">My profile</a></li>
                    <li><a href="#!">Preference</a></li>
                    <li class="divider"></li>

                    <li>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <a href="#!" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off" aria-hidden="true"></i>
                            <span>Wyloguj</span>
                        </a>
                    </li>
                </ul>
            </ul>
        </div>
    </nav>
</header>
<main>
    <div class="row">
        <aside>
            <ul id="side-out" class="side-nav fixed">
                <li>
                    <a href="index.html" class="current-page">
                        <sapn class="icon__container">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </sapn>
                        <span class="side-nav__element">Panel</span>
                    </a>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="collapsible__element">
                            <a class="collapsible-header">
                                <sapn class="icon__container">
                                    <i class="fa fa-th" aria-hidden="true"></i>
                                </sapn>
                                <span>Strony</span>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{url('/admin/sites')}}">Lista</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </aside>
        <div class="col s12 pt80">
            @yield('content')
        </div>
    </div>
</main>
</body>
</html>