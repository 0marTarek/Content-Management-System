<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
   

    <!-- Fonts -->

    
    <!-- Styles -->
    
    
    @yield('styleCheet')
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <a class="navbar-brand" href="{{ url('/') }}" style="font-size:15px;">
                    {{ config('app.name', 'Laravel') }}
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
                            <li class="nav-item">
                                <a href="{{route('welcome')}}" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Cateogry</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">About</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Contact</a>
                            </li>
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
                                    <a class=" dropdown-item " href="{{ route('users.allUserPosts', auth()->user()->id) }}" >My posts</a>
                                    <a class="dropdown-item" href="{{route('users.editeProfile', auth()->user()->id)}}" >My Profile </a>
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

@auth

<div class="container">
        @if(session()->has("success"))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
        @endif

        @if(session()->has('EditSuccess'))
        <div class="alert alert-success">
            {{session()->get('EditSuccess')}}
        </div>
        @endif
        @if(session()->has('Deleted'))
        <div class="alert alert-success">
            {{session()->get('Deleted')}}
        </div>
        @endif
        @if (session()->has('Updated'))
            <div class="alert alert-success">
                {{session()->get('Updated')}}
            </div>
        @endif
        
        @if (session()->has('PostTrashed'))
            <div class="alert alert-success">
            a post trashed successfully.
            </div>
        @endif
        @if(session()->has('post_success'))
        <div class="alert alert-success">
            {{session()->get('post_success')}}
        </div>
        @endif
        @if(session()->has('PostDeleted'))
        <div class="alert alert-success">
            {{session()->get('PostDeleted')}}
        </div>
        @endif
        @if(session()->has('Restored'))
        <div class="alert alert-success">
            {{session()->get('Restored')}}
        </div>
        @endif


    <div class="row">
        <div class="col-md-2 py-4">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="/posts" >Posts</a>
                </li>
                <li class="list-group-item">
                    <a href="/category" >Categories</a>
                </li>
                <li class="list-group-item">
                <a href="/trashedPosts">Trashed Posts</a>
                </li>
                <li class="list-group-item">
                <a href="/tags">Tags</a>
                </li>
                @if(auth()->user()->isAdmin())
                <li class="list-group-item">
                    <a href="{{route('users.index')}}" >Users</a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('dashboard.index')}}" >Dashboard</a>
                </li>
                @endif
            </ul>
        </div>
       
        <div class="col-md-10">
        <main class="py-4">
                    @yield('content')
            </main>
        </div>
    </div>

    @endauth

 @guest
<div class="div">
    <main class="py-4">
        @yield('content')
    </main>
</div>
 @endguest



<script src="{{ asset('js/app.js') }}" ></script>
@yield('script')
</body>
</html>
