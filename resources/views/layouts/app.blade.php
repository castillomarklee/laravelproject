<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/downloaded_libraries/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}">

</head>
<body>
    <div id="app">
        <!-- <nav class="navbar navbar-default">
            <div class="container">
               
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
                    <!-- Left Side Of Navbar -->
                    <!-- <ul class="navbar-nav mr-auto">

                    </ul> -->

                    <!-- Right Side Of Navbar -->
                    <!-- <ul class="navbar-nav ml-auto"> -->
                        <!-- Authentication Links -->
                       
   <!--                  </ul>
                </div>
            </div>
        </nav> -->

        <nav class="navbar navbar-default" style="border-radius: 0px; overflow: hidden">
          <div class="container-fluid">
            <div class="navbar-header">
               @guest
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Admin') }}
                </a>
                @else
                <a class="navbar-brand" href="{{ url('/') }}">
                    Hello Admin! Welcome.
                </a>
                @endguest
            </div>

            <ul class="nav navbar-nav navbar-right">
               @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <!-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    
                                </div>
                            </li> -->

                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1</a>
                                <ul class="dropdown-menu">
                                  <li><a href="#">Page 1-1</a></li>
                                  <li><a href="#">Page 1-2</a></li>
                                  <li><a href="#">Page 1-3</a></li>
                                </ul>
                              </li>

                            <!-- <li class="nav navbar-nav navbar-right" style="padding-left: 800px;">
                                 <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li> -->
                        @endguest
            </ul>
          </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script type="text/javascript" src="{{ asset('public/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/downloaded_libraries/bootstrap-3.3.7-dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/moment.js') }}"></script>
</body>
</html>