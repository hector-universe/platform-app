<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>mcHub - Najlepsza zamknięta platforma modyfikacji</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/additional.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('images/mcHub.png') }}" style="float:left; margin-top: -5px;">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li class="nav-item {{{ (Request::is('/') ? 'active' : '') }}}">
                            <a class="nav-link" href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i> Strona główna <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{{ (Request::is('launcher') ? 'active' : '') }}}">
                            <a class="nav-link" href="/launcher"><i class="fa fa-download" aria-hidden="true"></i> Launcher <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{{ (Request::is('modpacks*') ? 'active' : '') }}}">
                            <a class="nav-link" href="{{ route('modpacks') }}"><i class="fa fa-compass"></i> Paczki modyfikacji <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://hectorwilde.com/forums/" target="_blank"><i class="fa fa-wrench" aria-hidden="true"></i> Forum wsparcia <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item {{{ (Request::is('login') ? 'active' : '') }}}"><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Logowanie</a></li>
                            <li class="nav-item {{{ (Request::is('register') ? 'active' : '') }}}"><a href="{{ route('register') }}"><i class="fa fa-pencil" aria-hidden="true"></i> Rejestracja</a></li>
                        @else
                            <li class="dropdown {{{ (Request::is('settings*') ? 'active' : '') }}}">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-address-card" aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    @if(Auth::user()->isAdmin == 1)
                                    <li><a href="{{ route('admin') }}"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Panel Administracyjny</a></li>
                                        <li role="separator" class="divider"></li>
                                    @endif
                                        <li><a href="{{ route('settings') }}"><i class="fa fa-user" aria-hidden="true"></i> Mój profil</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="{{ route('modpacks-u') }}"><i class="fa fa-compass" aria-hidden="true"></i> Moje paczki</a></li>
                                        <li><a href="{{ route('skin') }}"><i class="fa fa-paint-brush" aria-hidden="true"></i> Zmiana skórki</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="{{ route('settings') }}"><i class="fa fa-cog" aria-hidden="true"></i> Ustawienia konta</a></li>
                                        <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i> Wyloguj
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
        <center><a href="http://www.smarthost.pl/partner?id=370"><img src="{{ asset('images/sponsor/smarthost.png') }}"/></a> <a href="https://jetbrains.com/"><img src="{{ asset('images/sponsor/jetbrains.png') }}"/></a></center>
        <br>
    </div>
    <footer class="footer">
        <div class="container">
            <p class="text-muted"> mcHub<sup>v1.3.1</sup> | Made with <a style="color:red;">♥</a> by <a href="https://github.com/hectorsky-network" target="_blank">Hectorsky Network</a><br>
                mcHub is not associated with Mojang AB. Minecraft is a Trademark of Mojang AB.
            </p>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {!! NoCaptcha::renderJs() !!}
</body>
</html>
