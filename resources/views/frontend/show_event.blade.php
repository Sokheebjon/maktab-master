@extends('layouts.app')

@section('content')
    <section class="hero hero-page">
        <div style="background: url(/home_style/img/head_event.jpg)" class="hero-banner">       </div>
    </section>
    <section class="blogpost-full">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="blog.html">Blog</a></li>
                            <li aria-current="page" class="breadcrumb-item active">Blog post</li>
                        </ol>
                    </nav>
                    <h2 class="mb-5">Projects help to aim those experiencing mental </h2>
                    <p><img src="{{URL::to($event->image)}}" alt="..." class="img-fluid"></p>
                    <div class="post-meta d-flex align-items-center flex-wrap">
                        <div class="date"><i class="fa fa-calendar"></i>{{$event->begin_date}}</div>
                        <div class="comments"><i class="fa fa-comments-o"></i>240</div>
                    </div>
                    <div class="text-content">
                        <p>{!!$event->about_uz!!}</p>
                    </div>
                    <div class="post-footer mt-5">
                        <div class="row">
                            <div class="col-lg-12 d-flex flex-wrap align-items-center">
                                <div class="shares mr-3"><strong>235</strong><span>Shares</span></div>
                                <ul class="social-buttons list-inline mb-0">
                                    <li class="list-inline-item"><a href="#" class="twitter d-flex mb-0">
                                            <div class="icon">                   <i class="fa fa-twitter"></i></div>
                                            <div class="text text-enter"><strong>Share Post</strong></div></a></li>
                                    <li class="list-inline-item"><a href="#" class="facebook d-flex mb-0">
                                            <div class="icon">                   <i class="fa fa-facebook"></i></div>
                                            <div class="text text-enter"><strong>Share Post</strong></div></a></li>
                                    <li class="list-inline-item"><a href="#" class="google-plus d-flex mb-0">
                                            <div class="icon">                   <i class="fa fa-google-plus"></i></div>
                                            <div class="text text-enter"><strong>Share Post</strong></div></a></li>
                                </ul>
                            </div>
                            <div class="col-lg-12 d-flex flex-wrap align-items-center mt-5">
                                <div class="tags mr-3">
                                    <h5>Tags</h5>
                                </div>
                                <ul class="tags list-inline mb-0">
                                    <li class="list-inline-item"><a href="#" class="tag">Education</a></li>
                                    <li class="list-inline-item"><a href="#" class="tag">Photography</a></li>
                                    <li class="list-inline-item"><a href="#" class="tag">Photoshop</a></li>
                                    <li class="list-inline-item"><a href="#" class="tag">Online Learning</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="post-author mt-5">
                        <div class="d-flex">
                            <div class="avatar"><img src="../../../d19m59y37dris4.cloudfront.net/university/1-1-1/img/avatar-2.jpg" alt="..." class="img-fluid"></div>
                            <div class="info d-flex justify-content-between">
                                <div class="left"><small>Posted by</small><strong>Ashley Williams</strong></div>
                                <div class="right d-none d-sm-block">
                                    <ul class="list-inline social">
                                        <li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-vimeo"></i></a></li>
                                        <li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <p>orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </p>
                    </div>
                    <div class="post-comments">
                        <h5>3 Comments</h5>
                        <div class="comment">
                            <div class="d-flex">
                                <div class="left d-flex flex-column align-items-center mr-3">
                                    <div class="avatar"><img src="../../../d19m59y37dris4.cloudfront.net/university/1-1-1/img/avatar-3.jpg" alt="..." class="img-fluid"></div><a href="#" class="reply"><i class="fa fa-reply"></i></a>
                                </div>
                                <div class="right">
                                    <div class="info"><a href="#" class="no-anchor-style"><strong>Frank Wood</strong></a>
                                        <div class="date"><i class="fa fa-calendar"></i>14 August 2018</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </p>
                                    </div>
                                </div>
                            </div>
                            <div class="comment">
                                <div class="d-flex">
                                    <div class="left d-flex flex-column align-items-center mr-3">
                                        <div class="avatar"><img src="../../../d19m59y37dris4.cloudfront.net/university/1-1-1/img/avatar-3.jpg" alt="..." class="img-fluid"></div><a href="#" class="reply"><i class="fa fa-reply"></i></a>
                                    </div>
                                    <div class="right">
                                        <div class="info"></div><a href="#" class="no-anchor-style">   <strong>Frank Wood</strong></a>
                                        <div class="date"><i class="fa fa-calendar"></i>14 August 2018</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment mb-5">
                            <div class="d-flex">
                                <div class="left d-flex flex-column align-items-center mr-3">
                                    <div class="avatar"><img src="../../../d19m59y37dris4.cloudfront.net/university/1-1-1/img/avatar-3.jpg" alt="..." class="img-fluid"></div><a href="#" class="reply"><i class="fa fa-reply"></i></a>
                                </div>
                                <div class="right">
                                    <div class="info"><a href="#" class="no-anchor-style"><strong>Frank Wood</strong></a>
                                        <div class="date"><i class="fa fa-calendar"></i>14 August 2018</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-holder"><strong class="mb-3">Leave a Comment</strong>
                            <form id="post-comment-form" action="#">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="text" name="name" placeholder="Full Name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="email" name="email" placeholder="Email Address" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <textarea name="comment" placeholder="comment" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <button type="submit" class="btn btn-primary">Submit a Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
                                    <li><a href="#" class="d-flex align-items-end justify-content-between"><strong>Medicine</strong><strong>30</strong></a></li>
                                    <li><a href="#" class="d-flex align-items-end justify-content-between"><strong>Chemistry</strong><strong>41</strong></a></li>
                                    <li><a href="#" class="d-flex align-items-end justify-content-between"><strong>Computer Science</strong><strong>312</strong></a></li>
                                    <li><a href="#" class="d-flex align-items-end justify-content-between"><strong>Mathematics</strong><strong>70</strong></a></li>
                                    <li class="border-bottom-0 pb-0"><a href="#" class="d-flex align-items-end justify-content-between"><strong>Modern Art</strong><strong>65</strong></a></li>
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
