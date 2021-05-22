<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Maktab</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/home_style/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="/home_style/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic CSS-->
    <link rel="stylesheet" href="/home_style/css/font.css">
    <!-- Google fonts - Open Sans-->
    <link rel="stylesheet" href="/home_style/css8a7c.css?family=Open+Sans:300,400,700">
    <!-- Swiper carousel-->
    <link rel="stylesheet" href="/home_style/vendor/swiper/css/swiper.css">
    <!-- Lity-->
    <link rel="stylesheet" href="/home_style/vendor/lity/lity.css">
    <!-- Bootstrap Select-->
    <link rel="stylesheet" href="/home_style/vendor/bootstrap-select/css/bootstrap-select.css">
    <!-- Theme stylesheet-->
    <link rel="stylesheet" href="/home_style/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/home_style/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/home_style/img/favicon.ico">

    <script src="/home_style/vendor/jquery/jquery.min.js"></script>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<!-- header-->
<header class="header">
    <!-- top bar-->
    <div class="top-bar d-none d-md-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0"> <i class="icon-placeholder"></i>33 New West Side, New Jersey, NJ, USA</p>
                </div>
                <div class="col-md-6 text-right">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="mailto:info@university.com"><i class="icon-envelope"></i>info@university.com</a></li>
                        <li class="list-inline-item"><a href="tel:+998913203536"><i class="icon-telephone"></i>91 320 35 36</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- navbar-->
    <nav class="navbar navbar-expand-lg">
        <div class="search">
            <div class="search-inner d-flex align-items-center justify-content-center">
                <div class="close-btn"><i class="icon-close"></i></div>
                <form action="#" class="search-form">
                    <div class="form-group mb-0">
                        <input type="search" name="search" id="search" placeholder="What are you searching for...">
                        <button type="submit" class="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container"><a href="{{url('/')}}" class="navbar-brand"><strong>University</strong><small>Smart education platform</small></a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right mt-0"><span></span><span></span><span></span></button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <div class="navbar-nav ml-auto">
                    <div class="nav-item"><a href="{{url('/')}}" class="nav-link active">Home <span class="sr-only">(current)</span></a></div>
                    <div class="nav-item"><a href="{{url('/all_news')}}" class="nav-link">News <span class="sr-only"></span></a></div>
                    <div class="nav-item"><a href="{{url('/best_students')}}" class="nav-link">Best Students <span class="sr-only"></span></a></div>
                    <!-- multi-level dropdown-->
                    <div class="nav-item dropdown"><a id="navbarDropdownMenuLink" href="http://example.com/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">Dropdown <i class="fa fa-angle-down"></i></a>
                        <ul aria-labelledby="navbarDropdownMenuLink" class="dropdown-menu">
                            <li><a href="#" class="dropdown-item nav-link">Action</a></li>
                            <li><a href="#" class="dropdown-item nav-link">Another action</a></li>
                            <li class="dropdown-submenu"><a id="navbarDropdownMenuLink2" href="http://example.com/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">Dropdown link <i class="fa fa-angle-down"></i></a>
                                <ul aria-labelledby="navbarDropdownMenuLink2" class="dropdown-menu">
                                    <li><a href="#" class="dropdown-item nav-link">Action</a></li>
                                    <li class="dropdown-submenu"><a id="navbarDropdownMenuLink3" href="http://example.com/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">

                                            Another action <i class="fa fa-angle-down"></i></a>
                                        <ul aria-labelledby="navbarDropdownMenuLink3" class="dropdown-menu">
                                            <li><a href="#" class="dropdown-item nav-link">Action</a></li>
                                            <li><a href="#" class="dropdown-item nav-link">Action</a></li>
                                            <li><a href="#" class="dropdown-item nav-link">Action</a></li>
                                            <li><a href="#" class="dropdown-item nav-link">Action</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#" class="dropdown-item nav-link">Something else here   </a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    @guest
                        @if (Route::has('login'))
                            <div class="nav-item"><a href="{{ route('login') }}" class="nav-link">{{ __('Login') }}</a></div>
                        @endif

                        @if (Route::has('register'))
                                <div class="nav-item"><a href="{{ route('register') }}" class="nav-link">{{ __('Register') }}</a></div>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                    <div class="nav-item"><a href="#" class="nav-link search-btn"><i class="fa fa-search"></i></a></div>
                </div>
            </div>
        </div>
    </nav>
</header>
@yield('content')
<footer class="footer pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="logo"><strong>University</strong><small>Smart Education Platform</small></div>
                <ul class="social list-inline">
                    <li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a><a href="#" target="_blank"><i class="fa fa-twitter"></i></a><a href="#" target="_blank"><i class="fa fa-instagram"></i></a><a href="#" target="_blank"><i class="fa fa-youtube-play"></i></a><a href="#" target="_blank"><i class="fa fa-vimeo"></i></a></li>
                </ul>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos.</p>
            </div>
            <div class="col-lg-3">
                <h4 class="text-thin">Navigation</h4>
                <div class="d-flex flex-wrap">
                    <ul class="navigation list-unstyled">
                        <li><a href="#">Home </a></li>
                        <li><a href="#">About </a></li>
                        <li><a href="#">Course</a></li>
                        <li><a href="#">Jobs</a></li>
                        <li><a href="#">Gallery</a></li>
                    </ul>
                    <ul class="navigation list-unstyled">
                        <li><a href="#">Blog </a></li>
                        <li><a href="#">Teachers </a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 newsletter">
                <h4 class="text-thin">Newsletter</h4>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus </p>
                <form action="#" class="newsletter-form">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Enter your email address." class="form-control">
                        <button type="submit">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="copyrights">
        <div class="container text-center">
            <p>&copy; 2018 University</p>
        </div>
    </div>
</footer>
<button type="button" data-toggle="collapse" data-target="#style-switch" id="style-switch-button" class="btn btn-primary btn-sm hidden-xs hidden-sm"><i class="fa fa-cog fa-2x"></i></button>
<div id="style-switch" class="collapse">
    <h4 class="mb-3">Select theme colour</h4>
    <form class="mb-3">
        <select name="colour" id="colour" class="form-control">
            <option value="">select colour variant</option>
            <option value="default">violet</option>
            <option value="red">red</option>
            <option value="green">green</option>
            <option value="pink">pink</option>
            <option value="sea">sea</option>
            <option value="blue">blue</option>
        </select>
    </form>
    <p><img src="/home_style/img/template-mac.png" alt="" class="img-fluid"></p>
    <p class="text-muted text-small">Stylesheet switching is done via JavaScript and can cause a blink while page loads. This will not happen in your production code.</p>
</div>
<!-- JavaScript files-->
<script src="/home_style/vendor/jquery/jquery.min.js"></script>
<script src="/home_style/vendor/popper.js/umd/popper.min.js"> </script>
<script src="/home_style/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/home_style/vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="/home_style/vendor/swiper/js/swiper.js"></script>
<script src="/home_style/vendor/lity/lity.js"></script>
<script src="/home_style/vendor/bootstrap-select/js/bootstrap-select.js"></script>
<script src="/home_style/js/front.js"></script>

</body>
</html>
