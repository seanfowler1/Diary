<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



<link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|PT+Sans|Raleway|Slabo+27px|Source+Sans+Pro" rel="stylesheet">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.26/css/uikit.min.css" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <!-- DateDropper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datedropper3@3.0.0/datedropper.css">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- jQuery Bar Rating -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.2/jquery.barrating.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.2/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.2/themes/css-stars.css">

    <!-- UIkit JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.26/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.26/js/uikit-icons.min.js"></script>

    <!-- DateDropper -->
    <script src="https://cdn.jsdelivr.net/npm/datedropper3@3.0.0/datedropper.js"></script>

    
</head>
<body>
    <div id="app">
        <div class="uk-box-shadow-medium uk-navbar-container uk-navbar-primary" uk-navbar="mode: click">
            <div class="uk-container uk-container-expand uk-width-1-1">

                <nav class="uk-navbar">

                    <div class="uk-navbar-left">
                        <!-- Branding Image -->
                        @if (Auth::guest())
                        <a class="uk-navbar-item uk-logo" href="{{ url('/') }}">
                        @else
                        <a class="uk-navbar-item uk-logo" href="{{ url('/dashboard') }}">
                        @endif
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>

                    <div class="uk-navbar-right">
                        <ul class="uk-navbar-nav">
                            @if (Auth::guest())
                                <!-- <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li> -->
                            @else
                                <a class="uk-navbar-toggle" uk-toggle="target: #offcanvas-nav">
                                    <span uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Menu</span>
                                </a>

                                <div id="offcanvas-nav" uk-offcanvas="overlay: true; flip: true">
                                    <div class="uk-offcanvas-bar">
                                        
                                        <button class="uk-offcanvas-close uk-margin" type="button" uk-close></button>
                                        <ul class="uk-nav uk-nav-default uk-margin-large-top">
                                            <li class="uk-active"><a href="/dashboard">Dashboard</a></li>
                                            <li class="uk-parent">
                                                <a href="/diary">Address Book</a>
                                                <ul class="uk-nav-sub">
                                                    <li><a href="/diary/create">New Entry</a></li>
                                                    <li><a href="/diary">View Entry</a></li>
                                                </ul>
                                            </li>
                                            <li class="uk-parent">
                                                <a href="/diary">Calendar</a>
                                            </li>
                                            <li class="uk-parent">
                                                <a href="/diary">Diary</a>
                                                <ul class="uk-nav-sub">
                                                    <li><a href="/diary/create">New Entry</a></li>
                                                    <li><a href="/diary">View Entry</a></li>
                                                    <li><a href="/diary/search">Search</a></li>
                                                </ul>
                                            </li>
                                            <li class="uk-parent">
                                                <a href="/diary">Finances</a>
                                            </li>
                                            <li class="uk-parent">
                                                <a href="/diary"></span>Habits</a>
                                                <ul class="uk-nav-sub">
                                                    <li><a href="/habits">New Habit</a></li>
                                                    <li><a href="/habits">View Habits</a></li>
                                                </ul>
                                            </li>
                                            <li class="uk-parent">
                                                <a href="/diary">Notepad</a>
                                            </li>
                                            <li class="uk-parent">
                                                <a href="/diary">Objectives</a>
                                            </li>
                                            <li class="uk-parent">
                                                <a href="/diary">Statistics</a>
                                            </li>


                                            <li class="uk-nav-divider"></li>
                                            <!-- <li class="uk-parent">
                                                <a href="#"><span class="uk-margin-small-right" uk-icon="aicon: list"></span>Settings</a>
                                            </li> -->
                                            <li class="uk-parent">
                                                <a href="{{ route('logout') }}" 
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>

                                    </div>
                                </div>

                                <!-- <li>
                                    <a href="#">{{ Auth::user()->name }}</a>
                                    <div class="uk-navbar-dropdown">
                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </li> -->
                            @endif
                        </ul>
                    </div>

                </nav>

            </div>
        </div>

        @yield('content')
    </div>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->

    
</body>
</html>
