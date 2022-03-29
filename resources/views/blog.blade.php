@extends('layout.main')

@section('container')
<!--::breadcrumb part start::-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h1>Our Blog</h1>
                        <p>Home<span>/</span>Blog</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--::breadcrumb part start::-->


<!--================Blog Area =================-->
<section class="blog_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">             
                    @foreach($news as $item)
                    <article class="blog_item">
                      <div class="blog_item_img">
                        <img class="card-img rounded-0" src="{{ url('storage/news-image/'.$item->image) }}" alt="" height="400">
                        <a href="#" class="blog_item_date">
                          <h3>{{ $item->created_at->format('d') }}</h3>
                          <p>{{ $item->created_at->format('M') }}</p>
                        </a>
                      </div>
                      
                      <div class="blog_details">
                          <a class="d-inline-block" href="{{ url('/blog/'.$item->slug) }}">
                              <h2>{{ $item->title }}</h2>
                          </a>
                          <p>{!! substr($item->news,0,300) !!} <a href="{{ url('/blog/'.$item->slug) }}">Read More</a></p>
                          <ul class="blog-info-link">
                            <!-- <li><a href="#"><i class="far fa-user"></i> Travel, Lifestyle</a></li>
                            <li><a href="#"><i class="far fa-comments"></i> 03 Comments</a></li> -->
                          </ul>
                      </div>
                    </article>
                    @endforeach

                    <nav class="blog-pagination justify-content-center d-flex">
                        {{ $news->links() }}
                    </nav>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="#">
                          <div class="form-group">
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder = 'Search Keyword' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                              <div class="input-group-append">
                                <button class="btn" type="button"><i class="ti-search"></i></button>
                              </div>
                            </div>
                          </div>
                          <button class="button rounded-0 primary-bg text-white w-100" type="submit">Search</button>
                        </form>
                    </aside>

                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Recent Post</h3>
                        @foreach($recent_news as $item)
                            <div class="media post_item">
                                <img src="{{ url('storage/news-image/'.$item['image']) }}" alt="post" width="80px" height="80px">
                                <div class="media-body">
                                    <a href="{{ url('blog/'.$item->slug) }}">
                                        <h3>{{$item['title']}}</h3>
                                    </a>
                                    <p>{{ $item['created_at']->format('d M Y, G:i:s' ) }} WIB</p>
                                </div>
                            </div>
                        @endforeach
                        <!-- <div class="media post_item">
                            <img src="img/post/post_2.png" alt="post">                              
                            <div class="media-body">
                                <a href="single-blog.html">
                                    <h3>The Amazing Hubble</h3>
                                </a>
                                <p>02 Hours ago</p>
                            </div>
                        </div>
                        <div class="media post_item">
                            <img src="img/post/post_3.png" alt="post">                              
                            <div class="media-body">
                                <a href="single-blog.html">
                                    <h3>Astronomy Or Astrology</h3>
                                </a>
                                <p>03 Hours ago</p>
                            </div>
                        </div>
                        <div class="media post_item">
                            <img src="img/post/post_4.png" alt="post">
                            <div class="media-body">
                                <a href="single-blog.html">
                                    <h3>Asteroids telescope</h3>
                                </a>
                                <p>01 Hours ago</p>
                            </div>
                        </div> -->
                    </aside>
                    <!-- <aside class="single_sidebar_widget tag_cloud_widget">
                        <h4 class="widget_title">Tag Clouds</h4>
                        <ul class="list">
                            <li>
                                <a href="#">project</a>
                            </li>
                            <li>
                                <a href="#">love</a>
                            </li>
                            <li>
                                <a href="#">technology</a>
                            </li>
                            <li>
                                <a href="#">travel</a>
                            </li>
                            <li>
                                <a href="#">restaurant</a>
                            </li>
                            <li>
                                <a href="#">life style</a>
                            </li>
                            <li>
                                <a href="#">design</a>
                            </li>
                            <li>
                                <a href="#">illustration</a>
                            </li>
                        </ul>
                    </aside> -->


                    <!-- <aside class="single_sidebar_widget instagram_feeds">
                      <h4 class="widget_title">Instagram Feeds</h4>
                      <ul class="instagram_row flex-wrap">
                          <li>
                              <a href="#">
                                <img class="img-fluid" src="img/post/post_5.png" alt="">
                              </a>
                          </li>
                          <li>
                              <a href="#">
                                <img class="img-fluid" src="img/post/post_6.png" alt="">
                              </a>
                          </li>
                          <li>
                              <a href="#">
                                <img class="img-fluid" src="img/post/post_7.png" alt="">
                              </a>
                          </li>
                          <li>
                              <a href="#">
                                <img class="img-fluid" src="img/post/post_8.png" alt="">
                              </a>
                          </li>
                          <li>
                              <a href="#">
                                <img class="img-fluid" src="img/post/post_9.png" alt="">
                              </a>
                          </li>
                          <li>
                              <a href="#">
                                <img class="img-fluid" src="img/post/post_10.png" alt="">
                              </a>
                          </li>
                      </ul>
                    </aside>


                    <aside class="single_sidebar_widget newsletter_widget">
                      <h4 class="widget_title">Newsletter</h4>

                      <form action="#">
                        <div class="form-group">
                          <input type="email" class="form-control" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'" placeholder = 'Enter email' required>
                        </div>
                        <button class="button rounded-0 primary-bg text-white w-100" type="submit">Subscribe</button>
                      </form>
                    </aside> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->

<!-- footer part start-->
<!-- <section class="footer-area section_padding">
  <div class="container">
      <div class="row">
          <div class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget">
              <h4>Top Products</h4>
              <ul>
                  <li><a href="#">Managed Website</a></li>
                  <li><a href="#">Manage Reputation</a></li>
                  <li><a href="#">Power Tools</a></li>
                  <li><a href="#">Marketing Service</a></li>
              </ul>
          </div>
          <div class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget">
              <h4>Quick Links</h4>
              <ul>
                  <li><a href="#">Jobs</a></li>
                  <li><a href="#">Brand Assets</a></li>
                  <li><a href="#">Investor Relations</a></li>
                  <li><a href="#">Terms of Service</a></li>
              </ul>
          </div>
          <div class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget">
              <h4>Features</h4>
              <ul>
                  <li><a href="#">Jobs</a></li>
                  <li><a href="#">Brand Assets</a></li>
                  <li><a href="#">Investor Relations</a></li>
                  <li><a href="#">Terms of Service</a></li>
              </ul>
          </div>
          <div class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget">
              <h4>Resources</h4>
              <ul>
                  <li><a href="#">Guides</a></li>
                  <li><a href="#">Research</a></li>
                  <li><a href="#">Experts</a></li>
                  <li><a href="#">Agencies</a></li>
              </ul>
          </div>
          <div class="col-xl-4 col-sm-8 mb-4 mb-xl-0 single-footer-widget">
              <h4>Newsletter</h4>
              <p>You can trust us. we only send promo offers,</p>
              <div class="form-wrap" id="mc_embed_signup">
                  <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
                      <input class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '" required="" type="email">
                      <button class="click-btn btn btn-default text-uppercase">subscribe</button>
                      <div style="position: absolute; left: -5000px;">
                          <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                      </div>

                      <div class="info"></div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</section> -->
@endsection