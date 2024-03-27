<!DOCTYPE html>
<html>
<head>
    <title>NewsFeed</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font.css">
    <link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="assets/css/theme.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
    <header id="header">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="header_top">
                    <div class="header_top_left">
                        <ul class="top_nav">
                            <li><a href="/">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="pages/contact.html">Contact</a></li>
                        </ul>
                    </div>
                    <div class="header_top_right">
                        <p><i class="fa fa-clock-o" aria-hidden="true"></i>
                            {{ now()->toDateString() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="header_bottom">
                    <div class="logo_area"><a href="/" class="logo"><img src="storage/images/logo.jpg" alt=""></a></div>
                    <div class="add_banner"><a href="#"><img src="storage/images/addbanner_728x90_V1.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="navArea">
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav main_nav">
                    <li class="active"><a href="/"><span class="fa fa-home desktop-home"></span><span
                                class="mobile-show">Home</span></a></li>
                    @foreach($categories as $category)
                        <li><a href="/{{$category->slug}}">{{$category->name}}</a></li>
                    @endforeach
                    {{--          <li><a href="pages/contact.html">Contact Us</a></li>--}}
                    {{--          <li><a href="pages/404.html">404 Page</a></li>--}}
                </ul>
            </div>
        </nav>
    </section>

    <section id="newsSection">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="latest_newsarea"><span>Latest News</span>
                    <ul id="ticker01" class="news_sticker">
                        @foreach($scrollers as $scroller)
                            <li><a href="#">{{$scroller->title}}</a></li>
                        @endforeach
                    </ul>
                    <div class="social_area">
                        <ul class="social_nav">
                            <li class="facebook"><a href="#"></a></li>
                            <li class="twitter"><a href="#"></a></li>
                            <li class="flickr"><a href="#"></a></li>
                            <li class="pinterest"><a href="#"></a></li>
                            <li class="googleplus"><a href="#"></a></li>
                            <li class="vimeo"><a href="#"></a></li>
                            <li class="youtube"><a href="#"></a></li>
                            <li class="mail"><a href="#"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contentSection">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="left_content">
                    <div class="single_page">


                    </div>
                </div>
            </div>
            <nav class="nav-slit"> <a class="prev" href="#"> <span class="icon-wrap"><i class="fa fa-angle-left"></i></span>
                    <div>
                        <h3>City Lights</h3>
                        <img src="../storage/images/post_img1.jpg" alt=""/> </div>
                </a> <a class="next" href="#"> <span class="icon-wrap"><i class="fa fa-angle-right"></i></span>
                    <div>
                        <h3>Street Hills</h3>
                        <img src="../storage/images/post_img1.jpg" alt=""/> </div>
                </a> </nav>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="latest_post">
                    <h2><span>Latest post</span></h2>
                    <div class="latest_post_container">
                        <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
                        <ul class="latest_postnav">

                            @foreach($latestposts as $latestpost)
                                <li>
                                    <div class="media"><a href="#" class="media-left"> <img alt=""
                                                                                            src="storage/{{$latestpost->image}}">
                                        </a>
                                        <div class="media-body"><a href=# class="catg_title">{{$latestpost->title}}</a>
                                        </div>
                                    </div>
                                </li>

                            @endforeach
                        </ul>

                        <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
                    </div>


                    <div class="single_sidebar">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab"
                                                                      data-toggle="tab">Category</a></li>
                            <li role="presentation"><a href="#video" aria-controls="profile" role="tab"
                                                       data-toggle="tab">Video</a></li>
                            <li role="presentation"><a href="#comments" aria-controls="messages" role="tab"
                                                       data-toggle="tab">Comments</a></li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="category">
                                <ul>

                                    @foreach($categories as $category)
                                        <li class="cat-item"><a href="/{{$category->slug}}">{{$category->name}}</a></li>
                                    @endforeach

                                </ul>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="video">
                                <div class="vide_area">
                                    <iframe width="100%" height="250"
                                            src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage"
                                            frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>


                            <div role="tabpanel" class="tab-pane" id="comments">
                                <ul class="spost_nav">
                                    <li>
                                        <div class="media wow fadeInDown"><a href="pages/single_page.html"
                                                                             class="media-left"> <img alt=""
                                                                                                      src="storage/images/post_img1.jpg">
                                            </a>
                                            <div class="media-body"><a href="pages/single_page.html" class="catg_title">
                                                    Aliquam malesuada diam eget turpis varius 1</a></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media wow fadeInDown"><a href="pages/single_page.html"
                                                                             class="media-left"> <img alt=""
                                                                                                      src="storage/images/post_img2.jpg">
                                            </a>
                                            <div class="media-body"><a href="pages/single_page.html" class="catg_title">
                                                    Aliquam malesuada diam eget turpis varius 2</a></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media wow fadeInDown"><a href="pages/single_page.html"
                                                                             class="media-left"> <img alt=""
                                                                                                      src="storage/images/post_img1.jpg">
                                            </a>
                                            <div class="media-body"><a href="pages/single_page.html" class="catg_title">
                                                    Aliquam malesuada diam eget turpis varius 3</a></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media wow fadeInDown"><a href="pages/single_page.html"
                                                                             class="media-left"> <img alt=""
                                                                                                      src="storage/images/post_img2.jpg">
                                            </a>
                                            <div class="media-body"><a href="pages/single_page.html" class="catg_title">
                                                    Aliquam malesuada diam eget turpis varius 4</a></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="single_sidebar wow fadeInDown">
                        <h2><span>Sponsor</span></h2>
                        <a class="sideAdd" href="#"><img src="storage/images/add_img.jpg" alt=""></a></div>

                    </aside>
                </div>

            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="footer_top">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer_widget wow fadeInLeftBig">
                        <h2>Flickr Images</h2>

                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer_widget wow fadeInDown">
                        <h2>Tag</h2>
                        <ul class="tag_nav">
                            @foreach($categories as $category)
                                <li><a href="/{{$category->slug}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>


                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer_widget wow fadeInRightBig">
                        <h2>Contact</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <address>
                            Perfect News,1238 S . 123 St.Suite 25 Town City 3333,USA Phone: 123-326-789 Fax: 123-546-567
                        </address>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <p class="copyright">Copyright &copy; 2045 <a href="/">NewsFeed</a></p>
            <p class="developer">Developed By Wpfreeware</p>
        </div>
    </footer>


</div>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/wow.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/slick.min.js"></script>
<script src="../assets/js/jquery.li-scroller.1.0.js"></script>
<script src="../assets/js/jquery.newsTicker.min.js"></script>
<script src="../assets/js/jquery.fancybox.pack.js"></script>
<script src="../assets/js/custom.js"></script>
</body>
</html>
