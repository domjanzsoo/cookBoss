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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prof.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    
    <div id="app" class="w-100 main-height {{$current ?? 'loginn' }}">
        <nav class="navbar navbar-fixed-top navbar-expand-md navbar-light bg-white" style="opacity:0.7;-moz-opacity:0.7;-webkit-opacity:0.7;">
            
                <a class="navbar-brand" href="{{ url('/') }}">
                    cookBoss
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav nmr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link custom-color" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link custom-color" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item mt-2 mr-3">
                                <a class="link custom-color" href="{{ '/profile/'.Auth::user()->id }}">{{ Auth::user()->username }}</a>
                            </li>
                            <li class="nav-item mt-2 mr-3">
                                    <a class="link custom-color" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                            </li>
                            <li class="nav-item">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>
                            <li class="nav-item mr-3 mt-2">
                                    <a class="link custom-color" href="{{ route('create-recipe') }}">
                                      New Recipe
                                    </a>
                            </li>
        
                            </li>
                    
                        @endguest
                    </ul>
                </div>
         
        </nav>
        <main  class="w-100 h-100 mt-5 mb-2 pb-1">
            @yield('content')
        </main>
        </div>
    <footer>
        @if(!Auth::user())    
            @include ('partials/footer')
        @endif
    </footer>

</body>
</html>
