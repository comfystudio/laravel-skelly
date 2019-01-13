@extends('layouts/layout')

@section('content')
    @include('partials.projects-carousel')

    <!-- ====================================
    /////// Begin blog single cection ///////
    ===================================== -->
    <section id="blog-single-cection">
        <div class="blog-single-inner tt-wrap"> <!-- add/remove class "tt-wrap" to enable/disable element boxed layout (class "tt-boxed" is required in <body> tag! ) -->

            <div class="row no-margin">

                <!-- Content column -->
                <div class="col-md-8 no-padding-left no-padding-right">

                    <!-- Begin blog single post
                    ============================= -->
                    <article class="blog-single-post lightgallery">

                        <!-- Begin blog single featured image -->
                        @if(isset($news->newsImages[0]))
                            <a href="/{{$news->newsImages[0]['image']}}" class="blog-single-featured-image lg-trigger" @if(isset($news->newsImages[0])) data-exthumbnail="/{{$news->newsImages[0]['image']}}"@endif>
                               <img src="/{{$news->newsImages[0]['image']}}" alt="{{$news->newsImages[0]['title']}}" />
                            </a>
                        @endif
                        <!-- End blog single featured image -->

                        <!-- Begin blog single heading -->
                        <div class="blog-single-post-heading">
                            <h1 class="blog-single-post-title">{{$news->title}}</h1>
                            <div class="blog-single-post-category">
                                @foreach($news->Category as $category)
                                    <a href="/all?category={{$category->name}}">{{$category->name}}</a>
                                @endforeach
                            </div>
                        </div>
                        <!-- End blog single heading -->

                        <!-- Begin blog single post inner -->
                        <div class="blog-single-post-inner">

                            <!-- Begin blog single attributes -->
                            <div class="blog-single-attributes">
                                <div class="row">
                                    <div class="col-sm-8">

                                        <!-- Begin blog single meta -->
                                        <div class="blog-single-meta-wrap">

                                            <!-- Blog single author avatar -->
                                            {{--<a href="" class="author-avatar pull-left bg-image" style="background-image: url(assets/img/blog/small/avatar/avatar-1.jpg);"></a>--}}

                                            <div class="blog-single-meta">
                                                <div class="article-author">by: <a href="#">Agent O</a></div>
                                                <div class="article-time-cat">
                                                    <span class="article-time">{{date("F d, Y", strtotime($news->publish_date))}}</span>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- End blog single meta -->

                                    </div> <!-- /.col -->

                                    <div class="col-sm-4">

                                        <!-- Begin blog single links -->
                                        {{--<ul class="blog-single-links list-unstyled list-inline">--}}
                                            {{--<li>--}}
                                                {{--<!-- Begin comments count -->--}}
                                                {{--<a href="#blog-post-comments" class="blog-single-comment-count sm-scroll" title="Read the comments"><i class="far fa-comment"></i> 9</a>--}}
                                                {{--<!-- End comments count -->--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<!-- Begin views count -->--}}
                                                {{--<div class="blog-single-views-count" title="Post Views"><i class="fas fa-eye"></i> 924</div>--}}
                                                {{--<!-- End views count -->--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                        <!-- End blog single links -->

                                    </div> <!-- /.col -->
                                </div> <!-- /.row -->
                            </div>
                            <!-- End blog single attributes -->

                            <!-- Begin post content -->
                            <div class="post-content">

                                <!-- Begin content carousel (https://owlcarousel2.github.io/OwlCarousel2/)
                                ====================================================================
                                * Use class "nav-outside" for outside nav (requires boxed layout).
                                * Use class "nav-outside-top" for outside top nav (requires enough space at the top of the slider).
                                * Use class "nav-bottom-right" for bottom right nav.
                                * Use class "nav-rounded" for rounded nav.
                                * Use class "nav-light" to enable nav light style.
                                * Use class "dots-outside" for outside dots (requires enough space at the bottom of the slider).
                                * Use class "dots-left", "dots-right" or "dots-center-right" to align dots.
                                * Use class "dots-rounded" for rounded dots.
                                * Use class "owl-mousewheel" to enable mousewheel support.
                                * Use class "cursor-grab" to enable cursor grab icon (no effect on links!).
                                ====================================================================
                                * Available carousel data attributes:
                                        data-items="5".......................(items visible on desktop)
                                        data-tablet-landscape="4"............(items visible on mobiles)
                                        data-tablet-portrait="3".............(items visible on mobiles)
                                        data-mobile-landscape="2"............(items visible on tablets)
                                        data-mobile-portrait="1".............(items visible on tablets)
                                        data-loop="true".....................(true/false)
                                        data-margin="10".....................(space between items)
                                        data-center="true"...................(true/false)
                                        data-start-position="0"..............(item start position)
                                        data-animate-in="fadeIn".............(more animations: http://daneden.github.io/animate.css/)
                                        data-animate-out="fadeOut"...........(more animations: http://daneden.github.io/animate.css/)
                                        data-mouse-drag="false"..............(true/false)
                                        data-touch-drag="false"..............(true/false)
                                        data-autoheight="true"...............(true/false)
                                        data-autoplay="true".................(true/false)
                                        data-autoplay-timeout="5000".........(milliseconds)
                                        data-autoplay-hover-pause="true".....(true/false)
                                        data-autoplay-speed="800"............(milliseconds)
                                        data-drag-end-speed="800"............(milliseconds)
                                        data-nav="true"......................(true/false)
                                        data-nav-speed="800".................(milliseconds)
                                        data-dots="false"....................(true/false)
                                        data-dots-speed="800"................(milliseconds)
                                -->
                                <div class="owl-carousel dots-right dots-rounded" data-items="1" data-nav="true" data-loop="true">

                                    @foreach($news->newsImages as $image)
                                        <a href="/{{$image['image']}}" class="cc-item bg-image lg-trigger" style="background-image: url(/{{$image['image']}}); background-position: 50% 50%;" data-exthumbnail="/{{$image['image']}}"></a>
                                    @endforeach

                                </div>
                                <!-- End content carousel -->

                                <p> {!! $news->text !!}</p>
                            </div>
                            <!-- End post content -->

                            <!-- Begin blog single attributes -->
                            <div class="blog-single-attributes margin-top-60">
                                <div class="row">
                                    <div class="col-sm-8">

                                        <!-- Begin blog single tags -->
                                        <div class="blog-single-tags">
                                            <ul>
                                                <li><span>Tags:</span></li>
                                                @foreach($news->Tag as $tag)
                                                    <li><a href="/all?tag={{$tag->name}}">{{$tag->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <!-- End blog single tags -->

                                    </div> <!-- /.col -->

                                    {{--<div class="col-sm-4 text-right">--}}

                                        {{--<!-- Begin blog single links -->--}}
                                        {{--<ul class="blog-single-links list-unstyled list-inline">--}}
                                            {{--<li>--}}
                                                {{--<!-- Begin add to favorites button -->--}}
                                                {{--<div class="favorite-btn">--}}
                                                    {{--<div class="fav-inner">--}}
                                                        {{--<div class="icon-heart">--}}
                                                            {{--<span class="icon-heart-empty" title="Like"></span>--}}
                                                            {{--<span class="icon-heart-filled" title="Unlike"></span>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="fav-count" title="Like counter">56</div>--}}
                                                {{--</div>--}}
                                                {{--<!-- End add to favorites button -->--}}
                                            {{--</li>--}}

                                            {{--<li>--}}
                                                {{--<!-- Begin leave a comment button -->--}}
                                                {{--<a href="#post-comment-form" class="leave-comment-btn sm-scroll">Leave a Comment</a>--}}
                                                {{--<!-- End leave a comment button -->--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                        {{--<!-- End blog single links -->--}}

                                    {{--</div> <!-- /.col -->--}}
                                </div> <!-- /.col -->
                            </div>
                            <!-- End blog single attributes -->

                            <!-- Begin blog single post share -->
                            <div class="blog-single-share">
                                <ul>
                                    <li class="bss-text">Share:</li>
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{env('APP_URL')}}%2Fview%2F{{$news->slug}}" target="_blank" class="btn btn-social-min btn-facebook btn-sm" title="Share on facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://twitter.com/intent/tweet?text={{$news->title}}&amp;url={{env('APP_URL')}}%2Fview%2F{{$news->slug}}" target="_blank" class="btn btn-social-min btn-twitter btn-sm" title="Share on twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="http://pinterest.com/pin/create/button/?url={{env('APP_URL')}}%2Fview%2F{{$news->slug}}&description={{$news->title}}" target="_blank" class="btn btn-social-min btn-pinterest btn-sm" title="Share on pinterest"><i class="fab fa-pinterest-p"></i></a></li>
                                    <li><a href="https://plus.google.com/share?url={{env('APP_URL')}}%2Fview%2F{{$news->slug}}" target="_blank" class="btn btn-social-min btn-google btn-sm" title="Share on google"><i class="fab fa-google"></i></a></li>
                                </ul>
                            </div>
                            <!-- End blog single post share -->

                        </div>
                        <!-- End blog single post inner -->

                    </article>
                    <!-- End blog single post -->


                    <!-- Begin blog single nav
                    =========================== -->
                    <div class="blog-single-nav">
                        <div class="bs-nav-col bs-nav-left">
                            @if(isset($otherNews[0]) && !empty($otherNews[0]))
                                <div class="bs-nav-text"><i class="fas fa-angle-left"></i> Prev Post</div>
                                <a href="{{url('/view/'.$otherNews[0]->slug)}}" class="bs-nav-title"><h4>{{$otherNews[0]->title}}</h4></a>
                            @endif
                        </div>
                        <div class="bs-nav-col bs-nav-right">
                            @if(isset($otherNews[1]) && !empty($otherNews[1]))
                                <div class="bs-nav-text">Next Post <i class="fas fa-angle-right"></i></div>
                                <a href="{{url('/view/'.$otherNews[1]->slug)}}" class="bs-nav-title"><h4>{{$otherNews[1]->title}}</h4></a>
                            @endif
                        </div>
                    </div>
                    <!-- End blog single nav -->


                    <!-- Begin related posts
                    ========================= -->
                    <div class="related-posts">
                        <h3 class="related-posts-heading">You Might Also Like:</h3>

                        <!-- Begin content carousel (https://owlcarousel2.github.io/OwlCarousel2/)
                        ====================================================================
                        * Use class "nav-outside" for outside nav (requires boxed layout).
                        * Use class "nav-outside-top" for outside top nav (requires enough space at the top of the slider).
                        * Use class "nav-bottom-right" for bottom right nav.
                        * Use class "nav-rounded" for rounded nav.
                        * Use class "nav-light" to enable nav light style.
                        * Use class "dots-outside" for outside dots (requires enough space at the bottom of the slider).
                        * Use class "dots-left", "dots-right" or "dots-center-right" to align dots.
                        * Use class "dots-rounded" for rounded dots.
                        * Use class "owl-mousewheel" to enable mousewheel support.
                        * Use class "cursor-grab" to enable cursor grab icon (no effect on links!).
                        ====================================================================
                        * Available carousel data attributes:
                                data-items="5".......................(items visible on desktop)
                                data-tablet-landscape="4"............(items visible on mobiles)
                                data-tablet-portrait="3".............(items visible on mobiles)
                                data-mobile-landscape="2"............(items visible on tablets)
                                data-mobile-portrait="1".............(items visible on tablets)
                                data-loop="true".....................(true/false)
                                data-margin="10".....................(space between items)
                                data-center="true"...................(true/false)
                                data-start-position="0"..............(item start position)
                                data-animate-in="fadeIn".............(more animations: http://daneden.github.io/animate.css/)
                                data-animate-out="fadeOut"...........(more animations: http://daneden.github.io/animate.css/)
                                data-mouse-drag="false"..............(true/false)
                                data-touch-drag="false"..............(true/false)
                                data-autoheight="true"...............(true/false)
                                data-autoplay="true".................(true/false)
                                data-autoplay-timeout="5000".........(milliseconds)
                                data-autoplay-hover-pause="true".....(true/false)
                                data-autoplay-speed="800"............(milliseconds)
                                data-drag-end-speed="800"............(milliseconds)
                                data-nav="true"......................(true/false)
                                data-nav-speed="800".................(milliseconds)
                                data-dots="false"....................(true/false)
                                data-dots-speed="800"................(milliseconds)
                        -->
                        <div class="owl-carousel nav-outside-top nav-light" data-items="3" data-margin="20" data-nav="true" data-dots="false" data-mobile-landscape="2" data-mobile-portrait="1">

                            @foreach($otherNews as $oNews)
                                <!-- Begin related posts item -->
                                <div class="related-posts-item">

                                    @if(isset($oNews->newsImages[0]))
                                        <a href="{{url('/view/'.$oNews->slug)}}" class="rp-item-image bg-image" style="background-image: url(/{{$oNews->newsImages[0]['image']}});"></a>
                                    @endif
                                    <div class="rp-item-info">
                                        <div class="rp-item-category">
                                            @foreach($oNews->Category as $category)
                                                <a href="/all?category={{$category->name}}">{{$category->name}}</a>
                                            @endforeach
                                        </div>

                                        <a href="{{url('/view/'.$oNews->slug)}}" class="rp-item-title"><h4>{{$oNews->title}}</h4></a>
                                    </div>
                                </div>
                                <!-- End related posts item -->
                            @endforeach
                        </div>
                        <!-- End content carousel -->

                    </div>
                    <!-- End related posts -->
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
                                    <form id="blog-search-form" class="form-btn-inside" method="get" action="/all">
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
                                            <li><a href = "/all?category={{$category}}">{{$category}}</a></li>
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
                                            <li><a href = "/all?tag={{$tag}}">{{$tag}}</a></li>
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

                        </div> <!-- /.row -->
                    </div>
                    <!-- End sidebar -->

                </div> <!-- /.col (Sidebar column) -->

            </div> <!-- /.row -->

        </div> <!-- /.blog-single-inner -->
    </section>
    <!-- End blog single cection -->
@stop