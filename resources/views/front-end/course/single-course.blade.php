@extends('front-end.layout.app')
@section('title','Home')
@section('description','Home Descripiton.')
@section('keywords','Home Keywords')

@section('content')
<div id="wrapper" class="clearfix">
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row gutter-40 col-mb-80">
                    <!-- Post Content
                    ============================================= -->
                    <div class="postcontent col-lg-9">

                        <div class="single-post mb-0">

                            <!-- Single Post
                            ============================================= -->
                            <div class="entry clearfix">

                                <!-- Entry Title
                                ============================================= -->
                                <div class="entry-title">
                                    <h2>This is a Standard post with a Preview Image</h2>
                                </div><!-- .entry-title end -->

                                <!-- Entry Meta
                                ============================================= -->
                                <div class="entry-meta">
                                    <ul>
                                        <li><i class="icon-calendar3"></i> 10th July 2021</li>
                                        <li><a href="#"><i class="icon-user"></i> admin</a></li>
                                        <li><i class="icon-folder-open"></i> <a href="#">General</a>, <a href="#">Media</a></li>
                                        <li><a href="#"><i class="icon-comments"></i> 43 Comments</a></li>
                                        <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                                    </ul>
                                </div><!-- .entry-meta end -->

                                <!-- Entry Image
                                ============================================= -->
                                <div class="entry-image">
                                    <a href="#"><img src="{{asset('app-assets')}}/client/images/blog/full/1.jpg" alt="Blog Single"></a>
                                </div><!-- .entry-image end -->

                                <!-- Entry Content
                                ============================================= -->
                                <div class="entry-content mt-0">

                                    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>

                                    <p>Nullam id dolor id nibh ultricies vehicula ut id elit. <a href="#">Curabitur blandit tempus porttitor</a>. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Donec id elit non mi porta gravida at eget metus. Vestibulum id ligula porta felis euismod semper.</p>

                                    <blockquote><p>Vestibulum id ligula porta felis euismod semper. Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper.</p></blockquote>

                                    <p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cras mattis consectetur purus sit amet fermentum. Donec id elit non mi porta gravida at eget metus.</p>

                                    <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean lacinia bibendum nulla sed consectetur. Cras justo odio, dapibus ac facilisis in, egestas eget quam. <a href="#">Nullam quis risus eget urna</a> mollis ornare vel eu leo. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>

<pre>
#header-inner {
    width: 940px;
    margin: 0 auto;
    padding-top: 40px;
}</pre>

                                    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>

                                    <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Donec id elit non mi porta gravida at eget metus. Vestibulum id ligula porta felis euismod semper.</p>
                                    <!-- Post Single - Content End -->

                                    <!-- Tag Cloud
                                    ============================================= -->
                                    <div class="tagcloud clearfix bottommargin">
                                        <a href="#">general</a>
                                        <a href="#">information</a>
                                        <a href="#">media</a>
                                        <a href="#">press</a>
                                        <a href="#">gallery</a>
                                        <a href="#">illustration</a>
                                    </div><!-- .tagcloud end -->

                                    <div class="clear"></div>

                                    <!-- Post Single - Share
                                    ============================================= -->
                                    <div class="si-share border-0 d-flex justify-content-between align-items-center">
                                        <span>Share this Post:</span>
                                        <div>
                                            <a href="#" class="social-icon si-borderless si-facebook">
                                                <i class="icon-facebook"></i>
                                                <i class="icon-facebook"></i>
                                            </a>
                                            <a href="#" class="social-icon si-borderless si-twitter">
                                                <i class="icon-twitter"></i>
                                                <i class="icon-twitter"></i>
                                            </a>
                                            <a href="#" class="social-icon si-borderless si-pinterest">
                                                <i class="icon-pinterest"></i>
                                                <i class="icon-pinterest"></i>
                                            </a>
                                            <a href="#" class="social-icon si-borderless si-gplus">
                                                <i class="icon-gplus"></i>
                                                <i class="icon-gplus"></i>
                                            </a>
                                            <a href="#" class="social-icon si-borderless si-rss">
                                                <i class="icon-rss"></i>
                                                <i class="icon-rss"></i>
                                            </a>
                                            <a href="#" class="social-icon si-borderless si-email3">
                                                <i class="icon-email3"></i>
                                                <i class="icon-email3"></i>
                                            </a>
                                        </div>
                                    </div><!-- Post Single - Share End -->

                                </div>
                            </div><!-- .entry end -->

                            <!-- Post Navigation
                            ============================================= -->
                            <div class="row justify-content-between col-mb-30 post-navigation">
                                <div class="col-12 col-md-auto text-center">
                                    <a href="#">&lArr; This is a Standard post with a Slider Gallery</a>
                                </div>

                                <div class="col-12 col-md-auto text-center">
                                    <a href="#">This is an Embedded Audio Post &rArr;</a>
                                </div>
                            </div><!-- .post-navigation end -->

                            <div class="line"></div>

                            <!-- Post Author Info
                            ============================================= -->
                            <div class="card">
                                <div class="card-header"><strong>Posted by <a href="#">John Doe</a></strong></div>
                                <div class="card-body">
                                    <div class="author-image">
                                        <img src="images/author/1.jpg" alt="Image" class="rounded-circle">
                                    </div>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, eveniet, eligendi et nobis neque minus mollitia sit repudiandae ad repellendus recusandae blanditiis praesentium vitae ab sint earum voluptate velit beatae alias fugit accusantium laboriosam nisi reiciendis deleniti tenetur molestiae maxime id quaerat consequatur fugiat aliquam laborum nam aliquid. Consectetur, perferendis?
                                </div>
                            </div><!-- Post Single - Author End -->

                            <div class="line"></div>

                            <h4>Related Posts:</h4>

                            <div class="related-posts row posts-md col-mb-30">

                                <div class="entry col-12 col-md-6">
                                    <div class="grid-inner row align-items-center gutter-20">
                                        <div class="col-4">
                                            <div class="entry-image">
                                                <a href="#"><img src="images/blog/small/10.jpg" alt="Blog Single"></a>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="entry-title title-xs">
                                                <h3><a href="#">This is an Image Post</a></h3>
                                            </div>
                                            <div class="entry-meta">
                                                <ul>
                                                    <li><i class="icon-calendar3"></i> 10th July 2021</li>
                                                    <li><a href="#"><i class="icon-comments"></i> 12</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="entry col-12 col-md-6">
                                    <div class="grid-inner row align-items-center gutter-20">
                                        <div class="col-4">
                                            <div class="entry-image">
                                                <a href="#"><img src="images/blog/small/20.jpg" alt="Blog Single"></a>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="entry-title title-xs">
                                                <h3><a href="#">This is a Video Post</a></h3>
                                            </div>
                                            <div class="entry-meta">
                                                <ul>
                                                    <li><i class="icon-calendar3"></i> 24th July 2021</li>
                                                    <li><a href="#"><i class="icon-comments"></i> 16</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="entry col-12 col-md-6">
                                    <div class="grid-inner row align-items-center gutter-20">
                                        <div class="col-4">
                                            <div class="entry-image">
                                                <a href="#"><img src="images/blog/small/21.jpg" alt="Blog Single"></a>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="entry-title title-xs">
                                                <h3><a href="#">This is a Gallery Post</a></h3>
                                            </div>
                                            <div class="entry-meta">
                                                <ul>
                                                    <li><i class="icon-calendar3"></i> 8th Aug 2021</li>
                                                    <li><a href="#"><i class="icon-comments"></i> 8</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="entry col-12 col-md-6">
                                    <div class="grid-inner row align-items-center gutter-20">
                                        <div class="col-4">
                                            <div class="entry-image">
                                                <a href="#"><img src="images/blog/small/22.jpg" alt="Blog Single"></a>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="entry-title title-xs">
                                                <h3><a href="#">This is an Audio Post</a></h3>
                                            </div>
                                            <div class="entry-meta">
                                                <ul>
                                                    <li><i class="icon-calendar3"></i> 22nd Aug 2021</li>
                                                    <li><a href="#"><i class="icon-comments"></i> 21</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div><!-- .postcontent end -->

                    {{-- <!-- Sidebar
                    ============================================= -->
                    <div class="sidebar col-lg-3">
                        <div class="sidebar-widgets-wrap">

                            <div class="widget widget-twitter-feed clearfix">

                                <h4>Twitter Feed</h4>
                                <ul class="iconlist twitter-feed" data-username="envato" data-count="2">
                                    <li></li>
                                </ul>

                                <a href="#" class="btn btn-secondary btn-sm float-end">Follow Us on Twitter</a>

                            </div>

                            <div class="widget clearfix">

                                <h4>Flickr Photostream</h4>
                                <div id="flickr-widget" class="flickr-feed masonry-thumbs grid-container" data-id="613394@N22" data-count="16" data-type="group" data-lightbox="gallery"></div>

                            </div>

                            <div class="widget clearfix">

                                <div class="tabs mb-0 clearfix" id="sidebar-tabs">

                                    <ul class="tab-nav clearfix">
                                        <li><a href="#tabs-1">Popular</a></li>
                                        <li><a href="#tabs-2">Recent</a></li>
                                        <li><a href="#tabs-3"><i class="icon-comments-alt me-0"></i></a></li>
                                    </ul>

                                    <div class="tab-container">

                                        <div class="tab-content clearfix" id="tabs-1">
                                            <div class="posts-sm row col-mb-30" id="popular-post-list-sidebar">
                                                <div class="entry col-12">
                                                    <div class="grid-inner row g-0">
                                                        <div class="col-auto">
                                                            <div class="entry-image">
                                                                <a href="#"><img class="rounded-circle" src="images/magazine/small/3.jpg" alt="Image"></a>
                                                            </div>
                                                        </div>
                                                        <div class="col ps-3">
                                                            <div class="entry-title">
                                                                <h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                                            </div>
                                                            <div class="entry-meta">
                                                                <ul>
                                                                    <li><i class="icon-comments-alt"></i> 35 Comments</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="entry col-12">
                                                    <div class="grid-inner row g-0">
                                                        <div class="col-auto">
                                                            <div class="entry-image">
                                                                <a href="#"><img class="rounded-circle" src="images/magazine/small/2.jpg" alt="Image"></a>
                                                            </div>
                                                        </div>
                                                        <div class="col ps-3">
                                                            <div class="entry-title">
                                                                <h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
                                                            </div>
                                                            <div class="entry-meta">
                                                                <ul>
                                                                    <li><i class="icon-comments-alt"></i> 24 Comments</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="entry col-12">
                                                    <div class="grid-inner row g-0">
                                                        <div class="col-auto">
                                                            <div class="entry-image">
                                                                <a href="#"><img class="rounded-circle" src="images/magazine/small/1.jpg" alt="Image"></a>
                                                            </div>
                                                        </div>
                                                        <div class="col ps-3">
                                                            <div class="entry-title">
                                                                <h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
                                                            </div>
                                                            <div class="entry-meta">
                                                                <ul>
                                                                    <li><i class="icon-comments-alt"></i> 19 Comments</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content clearfix" id="tabs-2">
                                            <div class="posts-sm row col-mb-30" id="recent-post-list-sidebar">
                                                <div class="entry col-12">
                                                    <div class="grid-inner row g-0">
                                                        <div class="col-auto">
                                                            <div class="entry-image">
                                                                <a href="#"><img class="rounded-circle" src="images/magazine/small/1.jpg" alt="Image"></a>
                                                            </div>
                                                        </div>
                                                        <div class="col ps-3">
                                                            <div class="entry-title">
                                                                <h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                                            </div>
                                                            <div class="entry-meta">
                                                                <ul>
                                                                    <li>10th July 2021</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="entry col-12">
                                                    <div class="grid-inner row g-0">
                                                        <div class="col-auto">
                                                            <div class="entry-image">
                                                                <a href="#"><img class="rounded-circle" src="images/magazine/small/2.jpg" alt="Image"></a>
                                                            </div>
                                                        </div>
                                                        <div class="col ps-3">
                                                            <div class="entry-title">
                                                                <h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
                                                            </div>
                                                            <div class="entry-meta">
                                                                <ul>
                                                                    <li>10th July 2021</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="entry col-12">
                                                    <div class="grid-inner row g-0">
                                                        <div class="col-auto">
                                                            <div class="entry-image">
                                                                <a href="#"><img class="rounded-circle" src="images/magazine/small/3.jpg" alt="Image"></a>
                                                            </div>
                                                        </div>
                                                        <div class="col ps-3">
                                                            <div class="entry-title">
                                                                <h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
                                                            </div>
                                                            <div class="entry-meta">
                                                                <ul>
                                                                    <li>10th July 2021</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content clearfix" id="tabs-3">
                                            <div class="posts-sm row col-mb-30" id="recent-comments-list-sidebar">
                                                <div class="entry col-12">
                                                    <div class="grid-inner row g-0">
                                                        <div class="col-auto">
                                                            <div class="entry-image">
                                                                <a href="#"><img class="rounded-circle" src="images/icons/avatar.jpg" alt="User Avatar"></a>
                                                            </div>
                                                        </div>
                                                        <div class="col ps-3">
                                                            <strong>John Doe:</strong> Veritatis recusandae sunt repellat distinctio...
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="entry col-12">
                                                    <div class="grid-inner row g-0">
                                                        <div class="col-auto">
                                                            <div class="entry-image">
                                                                <a href="#"><img class="rounded-circle" src="images/icons/avatar.jpg" alt="User Avatar"></a>
                                                            </div>
                                                        </div>
                                                        <div class="col ps-3">
                                                            <strong>Mary Jane:</strong> Possimus libero, earum officia architecto maiores....
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="entry col-12">
                                                    <div class="grid-inner row g-0">
                                                        <div class="col-auto">
                                                            <div class="entry-image">
                                                                <a href="#"><img class="rounded-circle" src="images/icons/avatar.jpg" alt="User Avatar"></a>
                                                            </div>
                                                        </div>
                                                        <div class="col ps-3">
                                                            <strong>Site Admin:</strong> Deleniti magni labore laboriosam odio...
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="widget clearfix">

                                <h4>Portfolio Carousel</h4>
                                <div id="oc-portfolio-sidebar" class="owl-carousel carousel-widget" data-items="1" data-margin="10" data-loop="true" data-nav="false" data-autoplay="5000">

                                    <div class="oc-item">
                                        <div class="portfolio-item">
                                            <div class="portfolio-image">
                                                <a href="#">
                                                    <img src="images/portfolio/4/3.jpg" alt="Mac Sunglasses">
                                                </a>
                                                <div class="bg-overlay">
                                                    <div class="bg-overlay-content dark" data-hover-animate="fadeIn" data-hover-speed="350">
                                                        <a href="https://vimeo.com/89396394" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="zoomIn" data-hover-speed="350" data-lightbox="iframe"><i class="icon-line-play"></i></a>
                                                    </div>
                                                    <div class="bg-overlay-bg dark" data-hover-animate="fadeIn" data-hover-speed="350"></div>
                                                </div>
                                            </div>
                                            <div class="portfolio-desc text-center pb-0">
                                                <h3><a href="portfolio-single-video.html">Mac Sunglasses</a></h3>
                                                <span><a href="#">Graphics</a>, <a href="#">UI Elements</a></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="oc-item">
                                        <div class="portfolio-item">
                                            <div class="portfolio-image">
                                                <a href="portfolio-single.html">
                                                    <img src="images/portfolio/4/1.jpg" alt="Open Imagination">
                                                </a>
                                                <div class="bg-overlay">
                                                    <div class="bg-overlay-content dark" data-hover-animate="fadeIn" data-hover-speed="350">
                                                        <a href="images/blog/full/1.jpg" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="zoomIn" data-hover-speed="350" data-lightbox="image"><i class="icon-line-plus"></i></a>
                                                    </div>
                                                    <div class="bg-overlay-bg dark" data-hover-animate="fadeIn" data-hover-speed="350"></div>
                                                </div>
                                            </div>
                                            <div class="portfolio-desc text-center pb-0">
                                                <h3><a href="portfolio-single.html">Open Imagination</a></h3>
                                                <span><a href="#">Media</a>, <a href="#">Icons</a></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>

                            <div class="widget clearfix">

                                <h4>Tag Cloud</h4>
                                <div class="tagcloud">
                                    <a href="#">general</a>
                                    <a href="#">videos</a>
                                    <a href="#">music</a>
                                    <a href="#">media</a>
                                    <a href="#">photography</a>
                                    <a href="#">parallax</a>
                                    <a href="#">ecommerce</a>
                                    <a href="#">terms</a>
                                    <a href="#">coupons</a>
                                    <a href="#">modern</a>
                                </div>

                            </div>

                        </div>
                    </div><!-- .sidebar end --> --}}
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
