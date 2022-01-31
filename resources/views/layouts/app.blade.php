<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header class="navbar navbar-expand-md navbar-dark bg-primary">
            <nav class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/logomark.svg') }}" alt="{{ config('app.name', 'Laravel') }}" width="50" height="52">
                    <img src="{{ asset('img/logotype.svg') }}" alt="{{ config('app.name', 'Laravel') }}" width="114" height="29">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="navbar-item">
                            <a class="nav-link text-white" href="{{ route('welcome') }}">Home</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>
        @auth
            <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="width: 280px;">
                <div class="container-fluid d-flex flex-column p-0">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ route('profile') }}" class="nav-link">
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('facilities.index') }}" class="nav-link">
                                Facilities
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('reservations.index') }}" class="nav-link">
                                Your Reservation
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        @endauth

        <main class="py-4">
            @yield('content')
        </main>
        
        <footer class="footer py-5 mt-5 bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('img/logomark.svg') }}" alt="{{ config('app.name', 'Laravel') }}" width="50" height="52">
                            <img src="{{ asset('img/logotype.svg') }}" alt="{{ config('app.name', 'Laravel') }}" width="114" height="29">
                        </a>
                    </div>
                    <div class="col-6">
                        <ul class="list-unstyled">
                            <li class="">
                                <a href="{{ route('welcome') }}" class="text-white text-decoration-none">Home</a>
                            </li>
                            <li class="">
                                <a href="{{ route('about-us') }}" class="text-white text-decoration-none">About Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
