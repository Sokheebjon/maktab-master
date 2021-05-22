@extends('layouts.app')
@section('content')
<section class="hero hero-page">
    <div style="background: url(/home_style/img/head_event.jpg)" class="hero-banner"></div>
</section>
<!-- Blog Listings-->
<section class="blog-listings">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li aria-current="page" class="breadcrumb-item active">Blog</li>
                    </ol>
                </nav>
                <h1>Blog</h1>
                <div class="row">
                    <p class="col-lg-8">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos.</p>
                </div>
                <div class="row mt-5">
                    @foreach($news as $new)
                    <div class="col-md-6">
                        <div class="blog-post">
                            <div class="image"><img src="{{URL::to($new->image)}}" class="w-100" alt="Projects aim to help those experiencing mental">
                                <div class="overlay d-flex align-items-center justify-content-center"><a href="{{route('show_news', $new->slug)}}" class="btn btn-outline-light">Read More</a></div>
                            </div>
                            <div class="author"><img src="../../../d19m59y37dris4.cloudfront.net/university/1-1-1/img/avatar.jpg" alt="author" class="img-fluid"></div>
                            <div class="text bg-gray"><a href="blog-post.html">
                                    <h4 class="text-this">Projects aim to help those experiencing mental</h4></a>
                                <ul class="post-meta list-inline">
                                    <li class="list-inline-item"><i class="icon-clock-1"></i> 14 August 2017</li>
                                    <li class="list-inline-item"><i class="icon-chat"></i>340</li>
                                </ul>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                    {{$news->links()}}
                </nav>
            </div>
            <div class="col-lg-4">
                <!-- sidebar-->
                <div class="blog-sidebar">
                    <div class="widget search">
                        <div class="widget-header"><strong>Search</strong></div>
                        <div class="widget-body">
                            <form action="#">
                                <div class="form-group mb-0">
                                    <input type="search" placeholder="Enter your keyword">
                                    <button type="submit"> <i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="widget social border-0 pd-0">
                        <ul class="social-buttons list-unstyled">
                            <li><a href="#" class="twitter d-flex">
                                    <div class="icon">                   <i class="fa fa-twitter"></i></div>
                                    <div class="text d-flex justify-content-between">
                                        <div class="left"><strong>120K</strong><span>Followers</span></div>
                                        <div class="right"><strong>Twitter</strong></div>
                                    </div></a></li>
                            <li><a href="#" class="facebook d-flex">
                                    <div class="icon">                   <i class="fa fa-facebook"></i></div>
                                    <div class="text d-flex justify-content-between">
                                        <div class="left"><strong>120K</strong><span>Likes</span></div>
                                        <div class="right"><strong>Facebook</strong></div>
                                    </div></a></li>
                            <li><a href="#" class="google-plus d-flex">
                                    <div class="icon">                   <i class="fa fa-google-plus"></i></div>
                                    <div class="text d-flex justify-content-between">
                                        <div class="left"><strong>120K</strong><span>Followers</span></div>
                                        <div class="right"><strong>Google Plus</strong></div>
                                    </div></a></li>
                            <li><a href="#" class="vimeo d-flex">
                                    <div class="icon">                   <i class="fa fa-vimeo"></i></div>
                                    <div class="text d-flex justify-content-between">
                                        <div class="left"><strong>120K</strong><span>Subscribers</span></div>
                                        <div class="right"><strong>Vimeo</strong></div>
                                    </div></a></li>
                            <li><a href="#" class="youtube d-flex mb-0">
                                    <div class="icon">                   <i class="fa fa-youtube-play"></i></div>
                                    <div class="text d-flex justify-content-between">
                                        <div class="left"><strong>120K</strong><span>Subscribers</span></div>
                                        <div class="right"><strong>Youtube</strong></div>
                                    </div></a></li>
                        </ul>
                    </div>
                    <div class="widget categoris">
                        <div class="widget-header"><strong>Categories</strong></div>
                        <div class="widget-body">
                            <ul class="categoris-list list-unstyled">
                                @foreach(\App\Models\Category::getCategoryCount() as $key => $c)
                                    <li class="@if($key+1 === count(\App\Models\Category::getCategoryCount())) border-bottom-0 pb-0 @endif">
                                        <a href="{{route('all_news', $c->id)}}" class="d-flex align-items-end justify-content-between @if($c->id == $cat) text-danger @endif"><strong>{{$c->name_uz}}</strong><strong>{{$c->news_count}}</strong></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="widget tags">
                        <div class="widget-header"><strong>Tags</strong></div>
                        <div class="widget-body">
                            <ul class="tags list-inline">
                                <li class="list-inline-item"><a href="#" class="tag">Education</a></li>
                                <li class="list-inline-item"><a href="#" class="tag">Photoshop</a></li>
                                <li class="list-inline-item"><a href="#" class="tag">Photography</a></li>
                                <li class="list-inline-item"><a href="#" class="tag">Online Learning</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
