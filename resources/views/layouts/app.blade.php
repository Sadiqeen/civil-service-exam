<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-light">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-dark navbar-theme-primary mb-4">
            <div class="container position-relative">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <div class="navbar-collapse collapse" id="navbar-default-primary">
                    <div class="navbar-collapse-header">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <a href="{{ url('/') }}">
                                    {{ config('app.name', 'Laravel') }}
                                </a>
                            </div>
                            <div class="col-6 collapse-close">
                                <i class="fas fa-times" data-toggle="collapse" role="button"
                                    data-target="#navbar-default-primary" aria-controls="navbar-default-primary"
                                    aria-expanded="false" aria-label="Toggle navigation"></i>
                            </div>
                        </div>
                    </div>
                    <ul class="navbar-nav navbar-nav-hover align-items-lg-center ml-auto">
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
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                                <i class="fas fa-angle-down nav-link-arrow ml-2"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
                <div class="d-flex align-items-center">
                    <button class="navbar-toggler ml-2" type="button" data-toggle="collapse"
                        data-target="#navbar-default-primary" aria-controls="navbar-default-primary"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @guest
            @yield('content')
            @else
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="nav-wrapper position-relative">
                                    <ul class="nav nav-pills square nav-fill flex-column vertical-tab">
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->routeIs('dashboard.*') ? 'active' : '' }}"
                                                href="{{ route('dashboard.index') }}">
                                                <span class="d-block"><i
                                                        class="fas fa-tachometer-alt mr-3"></i>Home</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->routeIs('subject.*') ? 'active' : '' }}"
                                                href="{{ route('subject.index') }}">
                                                <span class="d-block"><i
                                                        class="fas fa-book mr-3"></i>Subjects</span></a>
                                        </li>
                                        {{-- <li class="nav-item">
                                            <a class="nav-link {{ request()->routeIs('subject.question.*') ? 'active' : '' }}"
                                                href="{{ route('subject.question.index') }}">
                                                <span class="d-block"><i
                                                        class="fas fa-question-circle mr-3 "></i>Questions</span></a>
                                        </li> --}}
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->routeIs('setting.*') ? 'active' : '' }}"
                                                href="{{ route('setting.index') }}"><span class="d-block">
                                                <i class="fas fa-cog"></i> Setting</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endguest
        </main>
    </div>
</body>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
@include('sweetalert::alert')
@stack('script')

</html>
