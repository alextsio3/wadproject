<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MyWebSite') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <div >
        <nav class="navbar navbar-expand-md navbar-light bg-white fixed-top">

            @guest
                <div class="navbar-collapse collapse justify-content-stretch" id="navbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    </ul>
                </div>
                @if (Route::has('register'))
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    </ul>
                @endif
            @elseif(auth()->user()->is_admin == '')
                <li class="nav-item d-flex mr-auto">
                <a href="/" class="navbar-brand pl-5">Home</a>
                </li>
                <li class="nav-item d-flex ml-auto">
                    <div class="" >
                        <a href="/profile/{{ auth()->user()->id }}">
                            <img src="{{ auth()->user()->profile->profileImage() }}" style="width:30px;" class="rounded-circle mt-1 mr-2" alt=" ">
                        </a>
                    </div>
                    <div class="navbar-collapse collapse justify-content-stretch" id="navbar">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.display') }}">User List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/profile/{{ auth()->user()->id }}/edit">Edit Profile</a>
                            </li>
                        </ul>
                    </div>
                    <div class="navbar-collapse collapse justify-content-stretch">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}</a>
                            </li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </div>
                </li>
            @else
                <li class="nav-item d-flex mr-auto">
                    <a href="/" class="navbar-brand pl-5">Home</a>
                    <a class="nav-link text-dark" href="{{ route('user.list') }}">User List</a>
                    <a class="nav-link text-dark" href="{{ route('post.list') }}">Post List</a>
                    <a class="nav-link text-dark" href="{{ route('comment.list') }}">Comment List</a>
                </li>
                <li class="nav-item d-flex ml-auto">
                    <div class="" >
                        <a href="/profile/{{ auth()->user()->id }}">
                            <img src="{{ auth()->user()->profile->profileImage() }}" style="width:30px;" class="rounded-circle mt-1 mr-2" alt=" ">
                        </a>
                    </div>
                    <div class="navbar-collapse collapse justify-content-stretch" id="navbar">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/profile/{{ auth()->user()->id }}/edit">Edit profile</a>
                            </li>
                        </ul>
                    </div>
                    <div class="navbar-collapse collapse justify-content-stretch">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}</a>
                            </li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </div>
                </li>


            @endguest

        </nav>

        <main class="py-5">
            @yield('content')
            <!-- Scripts -->
                <script src="{{ asset('js/app.js') }}"></script>

                @yield('scripts')

        </main>
    </div>
</body>
</html>
