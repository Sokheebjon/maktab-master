@extends('layouts.app')

@section('content')
    <!-- Hero Section-->
    <section class="hero hero-home">
        <div class="swiper-container hero-slider">
            <div class="swiper-wrapper">
                @foreach($news as $new)
                <div class="swiper-slide">
                    <div style="background:url({{URL::to($new->image)}});" class="hero-content has-overlay-dark">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h1>{!!$new->about_uz!!}</h1>
                                    <p class="hero-text pr-5">{{$new->title_uz}}</p>
                                    <div class="CTAs"><a href="{{route('show_news', $new->slug)}}" class="btn btn-primary">Apply now</a><a href="{{route('show_news', $new->slug)}}" class="btn btn-outline-light">Read more</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Add Pagination-->
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- Info Boxes Section-->
    <section class="info-boxes">
        <div class="container">
            <div class="row"><a href="#" style="background: url(home_style/img/boxes-img-1.jpg);" class="info-box cyan col-lg-4">
                    <div class="info-box-content">
                        <h3 class="text-uppercase">Programs</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div></a><a href="#" style="background: url(home_style/img/boxes-img-2.jpg);" class="info-box orange col-lg-4">
                    <div class="info-box-content">
                        <h3 class="text-uppercase">Affordability</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div></a><a href="#" style="background: url(home_style/img/boxes-img-3.jpg);" class="info-box red col-lg-4">
                    <div class="info-box-content">
                        <h3 class="text-uppercase">Certification</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div></a></div>
        </div>
    </section>
    <!-- Intro Section-->
    <section class="intro">
        <div class="container text-center">
            <header>
                <h2><small>We are rock stars...</small>Welcome to university</h2>
            </header>
            <div class="row">
                <p class="col-lg-8 mx-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="signature mx-auto"><img src="home_style/img/signature.png" alt="..." class="img-fluid"></div>
            <div class="author"><strong>katya Henry</strong><span>University Grandmaster</span></div>
        </div>
    </section>
    <!-- Tour Section-->
    <section class="tour bg-gray">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-4">
                    <div class="video"><a href="https://www.youtube.com/watch?v=TqnCbqUg-tc" data-lity><img src="home_style/img/tour-bg.jpg" alt="...">
                            <div class="overlay d-flex align-items-center justify-content-center"><img src="home_style/img/play.svg" alt="..."></div></a></div>
                </div>
                <div class="col-lg-8 text">
                    <header>
                        <h2><small>Discover more about us</small>Take a tour</h2>
                    </header>
                    <p class="h4">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p><a href="#" class="btn btn-primary">Apply now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- News Section-->
    <section class="latest-news">
        <div class="container">
            <header class="text-center">
                <h2> <small>Our latest news</small>Latest News</h2>
            </header>
            <ul id="pills-tab" role="tablist" class="nav nav-pills nav-justified">
                <li class="nav-item"><a id="students-tab" data-toggle="pill" href="#pills-students" role="tab" aria-controls="pills-students" aria-selected="true" class="nav-link active">Students</a></li>
                <li class="nav-item"><a id="teachers-tab" data-toggle="pill" href="#pills-teachers" role="tab" aria-controls="pills-teachers" aria-selected="false" class="nav-link">Teachers</a></li>
                <li class="nav-item"><a id="prospects-tab" data-toggle="pill" href="#pills-prospects" role="tab" aria-controls="pills-prospects" aria-selected="false" class="nav-link">Prospects</a></li>
            </ul>
            <div id="pills-tabContent" class="tab-content">
                <div id="pills-students" role="tabpanel" aria-labelledby="students-tab" class="tab-pane fade show active">
                    <div class="row">
                        @php
                        shuffle($news);
                        @endphp
                        @foreach($news as $new)
                        <div class="col-lg-4">
                            <div class="news-block">
                                <div class="news-block-inner bg-image" style="background:url({{URL::to($new->image)}});"><small class="text-transform">{{$new->created_at}}</small>
                                    <h4>{{$new->title_uz}}</h4>
                                    <p>{!! $new->about_uz !!}</p><a href="#" class="btn btn-outline-primary">Read more</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div id="pills-teachers" role="tabpanel" aria-labelledby="teachers-tab" class="tab-pane fade">
                    <div class="row">
                        @php
                            shuffle($news);
                        @endphp
                            @foreach($news as $new)
                                <div class="col-lg-4">
                                    <div class="news-block">
                                        <div class="news-block-inner bg-image" style="background:url({{URL::to($new->image)}});"><small class="text-transform">{{$new->created_at}}</small>
                                            <h4>{{$new->title_uz}}</h4>
                                            <p>{!! $new->about_uz !!}</p><a href="#" class="btn btn-outline-primary">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                </div>
                <div id="pills-prospects" role="tabpanel" aria-labelledby="prospects-tab" class="tab-pane fade">
                    <div class="row">
                        @php
                            shuffle($news);
                        @endphp
                            @foreach($news as $new)
                                <div class="col-lg-4">
                                    <div class="news-block">
                                        <div class="news-block-inner bg-image" style="background:url({{URL::to($new->image)}});"><small class="text-transform">{{$new->created_at}}</small>
                                            <h4>{{$new->title_uz}}</h4>
                                            <p>{!! $new->about_uz !!}</p><a href="{{route('show_news', $new->slug)}}" class="btn btn-outline-primary">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Statistics Section-->
    <section class="statistics pt-0 pb-0 bg-primary has-pattern">
        <div class="container text-center">
            <div class="row">
                <div class="item col-lg-4 col-md-6"><strong>2021</strong>
                    <p>Year Found</p>
                </div>
                <div class="item col-lg-4 col-md-6"><strong>{{$teachers}}</strong>
                    <p>Qualified Teachers</p>
                </div>
                <div class="item col-lg-4 col-md-6"><strong>{{$students}}</strong>
                    <p>Graduated Students</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Events Section-->
    <section class="events">
        <div class="container">
            <header class="text-center">
                <h2> <small>All About events updates</small>Upcoming Events</h2>
                <div class="row text-center">
                    <p class="col-lg-8 mx-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                </div>
            </header>
            <div class="swiper-container events-slider pb-5">
                <div class="swiper-wrapper">
                    @foreach($events as $event)
                    <div class="swiper-slide">
                        <div class="event row align-items-center align-items-stretch">
                            <div class="col-lg-6 pr-lg-0">
                                <div class="image"><img src="{{URL::to($event->image)}}" alt="Most part fantastic faculty members for the most students">
                                    <div class="overlay d-flex align-items-end">
                                        <div class="date"><strong>27</strong><span>{{$event->begin_date}}</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 pl-lg-0">
                                <div class="text bg-gray d-flex align-items-center">
                                    <div class="text-inner">
                                        <h4>{{$event->title_uz}}</h4>
                                        <p>{!! $event->about_uz !!}</p><a href="{{route('show_event', $event->slug)}}" class="btn btn-outline-primary">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>
                <!-- Add Pagination-->
                <div class="swiper-pagination mt-5"></div>
            </div>
        </div>
    </section>
    <!-- Blog Section-->
    <section class="blog bg-gray">
        <div class="container">
            <header class="text-center">
                <h2> <small>From the blog</small>Recent Posts</h2>
            </header>
            <div class="row">
                <div class="col-lg-4">
                    <div class="blog-post">
                        <div class="image"><img src="home_style/img/blog-img.jpg" alt="Projects aim to help those experiencing mental">
                            <div class="overlay d-flex align-items-center justify-content-center"><a href="blog-post.html" class="btn btn-outline-light">Read more</a></div>
                        </div>
                        <div class="author"><img src="home_style/img/avatar.jpg" alt="author" class="img-fluid"></div>
                        <div class="text"><a href="blog-post.html">
                                <h4 class="text-this">Projects aim to help those experiencing mental</h4></a>
                            <ul class="post-meta list-inline">
                                <li class="list-inline-item"><i class="icon-clock-1"></i> 14 August 2017</li>
                                <li class="list-inline-item"><i class="icon-chat"></i>340</li>
                            </ul>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-post">
                        <div class="image"><img src="home_style/img/blog-img-2.jpg" alt="Projects aim to help those experiencing mental">
                            <div class="overlay d-flex align-items-center justify-content-center"><a href="blog-post.html" class="btn btn-outline-light">Read more</a></div>
                        </div>
                        <div class="author"><img src="home_style/img/avatar-2.jpg" alt="author" class="img-fluid"></div>
                        <div class="text"><a href="blog-post.html">
                                <h4 class="text-this">Projects aim to help those experiencing mental</h4></a>
                            <ul class="post-meta list-inline">
                                <li class="list-inline-item"><i class="icon-clock-1"></i> 14 August 2017</li>
                                <li class="list-inline-item"><i class="icon-chat"></i>340</li>
                            </ul>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-post">
                        <div class="image"><img src="home_style/img/blog-img-3.jpg" alt="Projects aim to help those experiencing mental">
                            <div class="overlay d-flex align-items-center justify-content-center"><a href="blog-post.html" class="btn btn-outline-light">Read more</a></div>
                        </div>
                        <div class="author"><img src="home_style/img/avatar-3.jpg" alt="author" class="img-fluid"></div>
                        <div class="text"><a href="blog-post.html">
                                <h4 class="text-this">Projects aim to help those experiencing mental</h4></a>
                            <ul class="post-meta list-inline">
                                <li class="list-inline-item"><i class="icon-clock-1"></i> 14 August 2017</li>
                                <li class="list-inline-item"><i class="icon-chat"></i>340</li>
                            </ul>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- footer-->
@endsection
