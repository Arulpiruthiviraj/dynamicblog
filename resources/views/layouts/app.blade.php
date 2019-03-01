<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DynamicBlog') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
     <!-- <script src="{{ asset('js/toastr.min.js') }}" ></script> -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <!-- Styles -->
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Dynamic Blog') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                             <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>

                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    <div class="container">
          <div class="row">
        @if(Auth::check())
        <div class="col-lg-4">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{route('home')}}">Home</a>
                    </li>
                     <li class="list-group-item">
                        <a href="{{route('category.index')}}"> categories</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('category.create')}}">create a new category</a>
                    </li>
                   
                    <li class="list-group-item">
                        <a href="{{route('post.create')}}">create a new post</a>
                    </li>
                     <li class="list-group-item">
                        <a href="{{route('post.index')}}">Posts</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('post.trash')}}">Trashed Posts</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('tag.index')}}">Tags</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('tag.create')}}">Create Tags</a>
                    </li>



                </ul>
            </div>
        @endif
          <div class="col-lg-8">
               @yield('content')
                </div>
            
        </div>
    </div>
        
    </div>
    <script src="{{ asset('js/toastr.min.js') }}" ></script>
     <script type="text/javascript">
        @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}");
        @endif
    </script>
    <script type="text/javascript">
        @if(Session::has('info'))
        toastr.success("{{Session::get('info')}}");
        @endif
    </script>
</body>
</html>
