<!--

=========================================================
* Pixel Lite Bootstrap Design System
=========================================================

* Product Page: https://themesberg.com/product/ui-kits/pixel-lite-free-bootstrap-4-ui-kit
* Copyright 2019 Themesberg (https://www.themesberg.com)
* License Themesberg (Crafty Dwarf LLC) (https://themesberg.com/licensing)

* Coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->

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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <header class="header-global">
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-dark navbar-theme-primary">
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
                                <a class="nav-link" href="{{ route('login') }}">เข้าสู่ระบบ</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">ลงทะเบียน</a>
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
                                            ออกจากระบบ
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
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="footer pt-6 pb-6 bg-primary text-white">
            <div class="container">
                <div class="row">
                    <div class="col mb-md-0">
                        <a href="https://themesberg.com" target="_blank" class="d-flex justify-content-center my-4">
                            Themesberg Logo
                        </a>
                        <div class="d-flex text-center justify-content-center align-items-center" role="contentinfo">
                            <p class="font-weight-normal font-small mb-0">Copyright © Themesberg
                                <span class="current-year">2020</span>. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    @include('sweetalert::alert')
    @stack('script')

</body>

</html>
