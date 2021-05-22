<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <script src="{{asset('vendors/js/vendor.bundle.base.js')}}" defer></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('vendors/chart.js/Chart.min.js')}}" defer></script>
    <script src="{{asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}" defer></script>
    <script src="{{asset('vendors/flot/jquery.flot.js')}}" defer></script>
    <script src="{{asset('vendors/flot/jquery.flot.resize.js')}}" defer></script>
    <script src="{{asset('vendors/flot/jquery.flot.categories.js')}}" defer></script>
    <script src="{{asset('vendors/flot/jquery.flot.fillbetween.js')}}" defer></script>
    <script src="{{asset('vendors/flot/jquery.flot.stack.js')}}" defer></script>
    <script src="{{asset('vendors/flot/jquery.flot.pie.js')}}" defer></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('js/off-canvas.js')}}" defer></script>
    <script src="{{asset('js/hoverable-collapse.js')}}" defer></script>
    <script src="{{asset('js/misc.js')}}" defer></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('js/dashboard.js')}}" defer></script>
    <script src="{{asset('js/main.js')}}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendors/flag-icon-css/css/flag-icon.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}" />
    <link rel="stylesheet" href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link rel="shortcut icon" href="{{asset('/images/favicon.png')}}" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
<div class="container-scroller">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
            <a class="sidebar-brand brand-logo" href="{{url('teacher/'. app()->getLocale())}}"><img src="/images/logo.svg" alt="logo" /></a>
            <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="{{url('teacher/'. app()->getLocale())}}"><img src="/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{route('teacher.all_student')}}">
                    <i class="mdi mdi-contacts menu-icon"></i>
                    <span class="menu-title">{{__('My students')}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('teacher.teacher_group')}}">
                    <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                    <span class="menu-title">My Classes</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('teacher.teacher_timetable')}}">
                    <i class="mdi mdi-timetable menu-icon"></i>
                    <span class="menu-title">My timetable</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('teacher.test-title.index')}}">
                    <i class="mdi mdi-book-open-page-variant menu-icon"></i>
                    <span class="menu-title">test</span>
                </a>
            </li>
            <li class="nav-item">
            <span class="nav-link" href="#">
              <span class="menu-title">Docs</span>
            </span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://www.bootstrapdash.com/demo/breeze-free/documentation/documentation.html">
                    <i class="mdi mdi-file-document-box menu-icon"></i>
                    <span class="menu-title">Documentation</span>
                </a>
            </li>
            <li class="nav-item sidebar-actions">
                <div class="nav-link">
                    <div class="mt-4">
                        <div class="border-none">
                            <p class="text-black">Notification</p>
                        </div>
                        <ul class="mt-4 pl-0">
                            <li>Sign Out</li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
    <div class="container-fluid page-body-wrapper">
        <nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
            <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
                <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="{{url('admin/')}}"><img src="/images/logo-mini.svg" alt="logo" /></a>
                <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
                    <i class="mdi mdi-menu"></i>
                </button>
                <ul class="navbar-nav">
                    <li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">
                        <form class="nav-link form-inline mt-2 mt-md-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" />
                                <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-magnify"></i>
                      </span>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right ml-lg-auto">
                    <li class="nav-item dropdown d-none d-xl-flex border-0">
                        <a class="nav-link dropdown-toggle" id="languageDropdown" href="" data-toggle="dropdown">
                            <i class="mdi mdi-earth"></i> Uzb </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                            <a class="dropdown-item" href="{{route('teacher.lang','en')}}"> Eng </a>
                            <a class="dropdown-item" href="{{route('teacher.lang', 'uz')}}"> Uzb </a>
                        </div>
                    </li>
                    <li class="nav-item nav-profile dropdown border-0">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
                            <img class="nav-profile-img mr-2" alt="" src="/images/faces/face1.jpg" />
                            <span class="profile-name">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout text-primary">{{ __('Logout') }}</i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        @yield('content')
    </div>
</div>
</body>
</html>
