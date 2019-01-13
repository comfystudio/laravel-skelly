@extends('layouts/layout')

@section('content')
    {{--@include('partials.projects-carousel')--}}

    <!-- ==============================
    ///// Begin blog list section /////
    =============================== -->
    <section id="blog-list-section" class="blog-list-classic">
        <div class="blog-list-inner tt-wrap"> <!-- add/remove class "tt-wrap" to enable/disable element boxed layout (class "tt-boxed" is required in <body> tag! ) -->

            <div class="row no-margin">

                <!-- Content column -->
                <div class="col-md-8 no-padding-left no-padding-right">

                    <div class="isotope-wrap">

                        <!-- Begin isotope
                        ===================
                        * Use class "gutter-1", "gutter-2" or "gutter-3" to add more space between items.
                        * Use class "col-1", "col-2", "col-3", "col-4", "col-5" or "col-6" for columns.
                        -->
                        <div class="isotope col-1">

                            <!-- Begin isotope items wrap
                            ============================== -->
                            <div class="isotope-items-wrap no-margin-top">

                                <!-- Grid sizer (do not remove!!!) -->
                                <div class="grid-sizer"></div>


                                <!-- =====================
                                /// Begin isotope item ///
                                ====================== -->
                                @foreach($news as $new)
                                    <div class="isotope-item">

                                        <!-- Begin blog list item -->
                                        <article class="blog-list-item">

                                            <!-- Blog list item image -->
                                            <a href="{{url('/view/')}}/{{$new->slug}}" class="bl-item-image">@if(isset($new->newsImages[0]))<img src="/{{$new->newsImages[0]['image']}}" alt="{{$new->newsImages[0]['title']}}" />@endif</a>

                                            <!-- Begin blog list item info -->
                                            <div class="bl-item-info">
                                                <div class="bl-item-category">@foreach($new->category as $category)<a href="/{{$route}}/?category={{$category->name}}"> {{$category->name}} </a>@endforeach</div>
                                                <a href="{{url('/view/')}}/{{$new->slug}}" class="bl-item-title"><h2>{{$new->title}}</h2></a>
                                                <div class="bl-item-meta">
                                                    <span class="published">{{date("F d, Y", strtotime($new->publish_date))}}</span>
                                                    <span class="posted-by">- by <a title="View all posts by Martin Vegas">Agent O</a></span>
                                                </div>
                                                <div class="bl-item-desc">
                                                    {!! str_limit(strip_tags($new->text), 200) !!}
                                                </div>
                                                <a href="{{url('/view/')}}/{{$new->slug}}" class="btn btn-primary btn-sm margin-top-30">Read More</a>

                                            </div>
                                            <!-- End blog list item info -->

                                        </article>
                                        <!-- End blog list item -->

                                    </div>
                                @endforeach
                                <!-- End isotope item -->

                            </div>
                            <!-- End isotope items wrap -->

                        </div>
                        <!-- End isotope -->

                    </div> <!-- /.isotope-wrap -->

                    <!-- Begin pagination -->
                    {{$news->links('partials/paginator')}}
                    <!-- End pagination -->

                </div> <!-- /.col (Content column) -->

                <!-- Sidebar column -->
                <div class="col-md-4 no-padding-left no-padding-right">

                    <!-- Begin sidebar (sidebar right)
                    =================================== -->
                    <div class="sidebar sidebar-right">
                        <div class="row">


                            <div class="col-sm-12">

                                <!-- Begin sidebar widget -->
                                <div class="sidebar-widget sidebar-social">
                                    <h3 class="sidebar-heading">Follow</h3>
                                    <!-- Begin social buttons -->
                                    <div class="social-buttons">
                                        <ul>
                                            <li><a href="{{FACEBOOK}}" class="btn btn-social-min btn-facebook" title="Follow me on Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="{{TWITTER}}" class="btn btn-social-min btn-twitter" title="Follow me on Twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="{{INSTAGRAM}}" class="btn btn-social-min btn-instagram" title="Follow me on instagram" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                    <!-- End social buttons -->
                                </div>
                                <!-- End sidebar widget -->

                            </div> <!-- /.col -->

                            <div class="col-sm-12">

                                <!-- Begin sidebar widget -->
                                <div class="sidebar-widget sidebar-search">
                                    <h3 class="sidebar-heading">Search</h3>
                                    <form id="blog-search-form" class="form-btn-inside" method="get" action="/{{$route}}">
                                        <div class="form-group no-margin">
                                            <input type="text" class="form-control" id="blog-search" name="keywords" placeholder="Search..." value = "{{Request::query('keywords')}}">
                                            <button type="submit" style="top:55%;"><i class="fas fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <!-- End sidebar widget -->

                            </div> <!-- /.col -->

                            <div class="col-md-12 col-sm-6">

                                <!-- Begin sidebar widget -->
                                <div class="sidebar-widget sidebar-categories">
                                    <h3 class="sidebar-heading">Categories</h3>
                                    <ul class="list-unstyled">
                                         @foreach($categories as $category)
                                            <li><a href = "/{{$route}}?category={{$category}}">{{$category}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- End sidebar widget -->

                            </div> <!-- /.col -->

                            <div class="col-md-12 col-sm-6">

                                <!-- Begin sidebar widget -->
                                <div class="sidebar-widget sidebar-post-list">
                                    <h3 class="sidebar-heading">Most Popular</h3>
                                    <ul class="list-unstyled">
                                        @foreach($otherNews as $oNews)
                                            <li>

                                                <a href="/view/{{$oNews->slug}}" class="post-thumb bg-image" @if(isset($oNews->newsImages[0])) style="background-image: url(/{{$oNews->newsImages[0]['image']}}); background-position: 50% 50%;"@endif></a>
                                                <div class="post-data">
                                                    <h5 class="post-title"><a href="/view/{{$oNews->slug}}">{{$oNews->title}}</a></h5>
                                                    <span class="date">{{date("F d, Y", strtotime($oNews->publish_date))}}</span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- End sidebar widget -->

                            </div> <!-- /.col -->

                            <div class="col-md-12 col-sm-6">

                                <!-- Begin sidebar widget -->
                                <div class="sidebar-widget sidebar-tags">
                                    <h3 class="sidebar-heading">Popular Tags</h3>
                                    <ul>
                                        @foreach($tags as $tag)
                                            <li><a href = "/{{$route}}?tag={{$tag}}">{{$tag}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- End sidebar widget -->
                            </div> <!-- /.col -->

                            <div class="col-md-12 col-sm-6">

                                <!-- Begin sidebar widget -->
                                <div class="sidebar-widget sidebar-photo-stream">
                                    <h3 class="sidebar-heading"><i class="fab fa-instagram"></i> Instagram</h3>

                                    <!-- Begin thumbnail list
                                    ==========================
                                    * Use class "col-2", "col-3", "col-4" "col-5" or "col-6" for thumbnail list columns.
                                    * Use class "gutter-1", "gutter-2", "gutter-3", "gutter-4" or "gutter-5" to add more space between items.
                                    -->
                                    <ul class="thumb-list col-4 gutter-5">
                                        <li><a href="https://www.instagram.com/p/BjCe8LpFcYS/" target="_blank" class="thumb-list-item bg-image" style="background-image: url(/img/instagram/1.jpg);"></a></li>
                                        <li><a href="https://www.instagram.com/p/BjR4roYlN7h/" target="_blank" class="thumb-list-item bg-image" style="background-image: url(/img/instagram/2.jpg);"></a></li>
                                        <li><a href="https://www.instagram.com/p/BjXzXP9FCqt/" target="_blank" class="thumb-list-item bg-image" style="background-image: url(/img/instagram/3.jpg);"></a></li>
                                        <li><a href="https://www.instagram.com/p/BjZoYl9F1dk/" target="_blank" class="thumb-list-item bg-image" style="background-image: url(/img/instagram/4.jpg);"></a></li>
                                        <li><a href="https://www.instagram.com/p/BjcJ3ZilrNd/" target="_blank" class="thumb-list-item bg-image" style="background-image: url(/img/instagram/5.jpg);"></a></li>
                                        <li><a href="https://www.instagram.com/p/Bj0fTKwhrp1/" target="_blank" class="thumb-list-item bg-image" style="background-image: url(/img/instagram/6.jpg);"></a></li>
                                        <li><a href="https://www.instagram.com/p/Bj20_X-BSsL/" target="_blank" class="thumb-list-item bg-image" style="background-image: url(/img/instagram/7.jpg);"></a></li>
                                        <li><a href="https://www.instagram.com/p/BkADoAvB88p/" target="_blank" class="thumb-list-item bg-image" style="background-image: url(/img/instagram/8.jpg);"></a></li>
                                        <li><a href="https://www.instagram.com/p/BkAj80uhtoj/" target="_blank" class="thumb-list-item bg-image" style="background-image: url(/img/instagram/9.jpg);"></a></li>
                                        <li><a href="https://www.instagram.com/p/BkFMwhThm3I/" target="_blank" class="thumb-list-item bg-image" style="background-image: url(/img/instagram/10.jpg);"></a></li>
                                        <li><a href="#" class="thumb-list-item bg-image" target="_blank" style="background-image: url(/img/instagram/11.jpg);"></a></li>
                                        <li><a href="#" class="thumb-list-item bg-image" target="_blank" style="background-image: url(/img/instagram/12.jpg);"></a></li>

                                    </ul>
                                    <!-- End thumbnail list -->

                                </div>
                                <!-- End sidebar widget -->

                            </div> <!-- /.col -->

                            {{--<div class="col-md-12 col-sm-6">--}}

                                {{--<!-- Begin sidebar widget -->--}}
                                {{--<div class="sidebar-widget sidebar-subscribe">--}}
                                    {{--<h3 class="sidebar-heading">Subscribe</h3>--}}
                                    {{--<p class="small text-gray">Subscribe to our newsletter and stay updated on the latest news! Do not worry, we will not send spam.</p>--}}

                                    {{--<!-- Begin subscribe form -->--}}
                                    {{--<form id="sidebar-subscribe-form">--}}
                                        {{--<div class="form-group no-margin">--}}
                                            {{--<input type="email" class="form-control" id="sidebar-subscribe" name="subscribe" placeholder="Enter your email address..." required="">--}}
                                            {{--<button type="submit" class="btn btn-primary btn-block btn-lg">Subscribe</button>--}}
                                        {{--</div>--}}
                                    {{--</form>--}}
                                    {{--<!-- End subscribe form -->--}}

                                {{--</div>--}}
                                {{--<!-- End sidebar widget -->--}}

                            {{--</div> <!-- /.col -->--}}

                            {{--<div class="col-md-12 col-sm-6">--}}

                                {{--<!-- Begin sidebar widget -->--}}
                                {{--<div class="sidebar-widget sidebar-meta">--}}
                                    {{--<h3 class="sidebar-heading">Meta</h3>--}}
                                    {{--<ul class="list-unstyled">--}}
                                        {{--<li><a href="">Log In</a></li>--}}
                                        {{--<li><a href="">Entries RSS</a></li>--}}
                                        {{--<li><a href="">Comments RSS</a></li>--}}
                                        {{--<li><a href="https://wordpress.org/">WordPress.org</a></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                                {{--<!-- End sidebar widget -->--}}

                            {{--</div> <!-- /.col -->--}}

                        </div> <!-- /.row -->
                    </div>
                    <!-- End sidebar -->

                </div> <!-- /.col (Sidebar column) -->

            </div> <!-- /.row -->

        </div> <!-- /.blog-list-inner -->
    </section>
    <!-- End blog list section -->
@stop