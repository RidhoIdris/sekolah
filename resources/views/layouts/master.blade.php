<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css')}}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/icofont.css')}}">
    {{-- NProgress --}}
    <link rel="stylesheet" href="https://unpkg.com/nprogress@0.2.0/nprogress.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="http://at.alicdn.com/t/font_o5hd5vvqpoqiwwmi.css">
    <!-- Style.css')}} -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.mCustomScrollbar.css')}}">
    <link rel="stylesheet"href="{{ asset('css/_pcmenu.scss')}}">
    {{-- Datatables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">



</head>

<body>
<!-- Pre-loader start -->
<div class="theme-loader">
    <div class="ball-scale">
        <div class='contain'>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
        </div>
    </div>
</div>
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <!-- Navbar Start -->
        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">

                <div class="navbar-logo" logo-theme="theme1" style="background: linear-gradient(-20deg, #00cdac 0%, #8ddad5 100%);">
                    <a class="mobile-menu" id="mobile-collapse" href="#">
                        <i class="feather icon-menu"></i>
                    </a>
                    <a href="index.html">
                        <img class="img-fluid" src="{{ asset('images/logo.png')}}" alt="Theme-Logo" />
                    </a>
                    <a class="mobile-options">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                </div>

                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li class="header-search">
                            <div class="main-search morphsearch-search">
                                <div class="input-group">
                                    <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#" onclick="if (!window.__cfRLUnblockHandlers) return false; javascript:toggleFullScreen()" data-cf-modified-493393c5abdf333f91f78bd4-="">
                                <i class="feather icon-maximize full-screen"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="user-profile header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{ asset('images/user.jpg')}}" class="img-radius" alt="User-Profile-Image">
                                    <span>{{\Auth::user()->name}}</span>
                                    <i class="feather icon-chevron-down"></i>
                                </div>
                                <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <li>
                                        <a href="#" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();
                                        ">
                                            <i class="feather icon-log-out"></i> Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <!-- Menu Start -->
                @include('layouts.menu')
                <!-- Menu End -->
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        @yield('content')
                        <!-- Main-Body End -->
                        <div id="styleSelector">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Required Jquery -->
<script type="493393c5abdf333f91f78bd4-text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
<script type="493393c5abdf333f91f78bd4-text/javascript" src="{{ asset('js/jquery-ui.min.js')}}"></script>
<script type="493393c5abdf333f91f78bd4-text/javascript" src="{{ asset('js/popper.min.js')}}"></script>
<script type="493393c5abdf333f91f78bd4-text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script type="493393c5abdf333f91f78bd4-text/javascript" src="{{ asset('js/jquery.slimscroll.js')}}"></script>
<!-- modernizr js -->
<script type="493393c5abdf333f91f78bd4-text/javascript" src="{{ asset('js/modernizr.js')}}"></script>
<script type="493393c5abdf333f91f78bd4-text/javascript" src="{{ asset('js/css-scrollbars.js')}}"></script>
<!-- i18next.min.js -->
<script type="493393c5abdf333f91f78bd4-text/javascript" src="{{ asset('js/i18next.min.js')}}"></script>
<script type="493393c5abdf333f91f78bd4-text/javascript" src="{{ asset('js/i18nextXHRBackend.min.js')}}"></script>
<script type="493393c5abdf333f91f78bd4-text/javascript" src="{{ asset('js/i18nextBrowserLanguageDetector.min.js')}}"></script>
<script type="493393c5abdf333f91f78bd4-text/javascript" src="{{ asset('js/jquery-i18next.min.js')}}"></script>
<script src="{{ asset('js/pcoded.min.js')}}" type="493393c5abdf333f91f78bd4-text/javascript"></script>
<script src="{{ asset('js/vartical-layout.min.js')}}" type="493393c5abdf333f91f78bd4-text/javascript"></script>
<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js')}}" type="493393c5abdf333f91f78bd4-text/javascript"></script>
{{-- DataTables --}}
<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
{{-- NProgress --}}
<script type="text/javascript" src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
<!-- Custom js -->
<script type="493393c5abdf333f91f78bd4-text/javascript" src="{{ asset('js/script.js')}}"></script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/a2bd7673/cloudflare-static/rocket-loader.min.js" data-cf-settings="493393c5abdf333f91f78bd4-|49" defer=""></script></body>
{{-- validate --}}
<script src="{{ asset('js/jquery.validate.js')}}"></script>
@yield('script')

</html>
