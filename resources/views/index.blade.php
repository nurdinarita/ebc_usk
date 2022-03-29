@extends('layout.main')

@section('container')
<!-- banner part start-->
<section class="banner_part">
<div class="container">
    <div class="row align-content-center">
        <div class="col-lg-7 col-xl-5">
            <div class="banner_text">
                <h1><span>Defend &</span><br> 
            Dominate</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <!-- <a href="#" class="btn_1">learn more <span class="ti-angle-right"></span> </a> -->
            </div>
        </div>
    </div>
</div>
</section>
<!-- banner part start-->

<!-- about part start-->
<!-- <section class="about_part">
<div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-md-6 offset-xl-1 col-xl-4">
            <div class="about_img">
                <img src="img/about.png" alt="">
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="about_text">
                <h4>About us</h4>
                <h2>Welcome <br>
                to Basketball School</h2>
                <p>A created won't created subdue a every green his set which above firmament earth firmament. Seed firmament be likeness fruitful to called waters. Given great said seasons his midst beast.</p>
                <p>A created won't created subdue a every green his set which above firmament earth firmament. Seed firmament be likeness fruitful to called waters. </p>
                <a href="#" class="btn_2">read more</a>
            </div>
        </div>
    </div>
</div>
</section> -->
<!-- about part start-->

<!-- upcoming_event part start-->
<section class="upcoming_event section_padding">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-5">
            <div class="section_tittle text-center">
                <!-- <h4>Upcoming Event</h4> -->
                <h2>Upcoming Event</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="upcoming_event_1">
                <img src="img/event2.png" alt="#">
                <div class="upcoming_event_text">
                    <div class="date">
                        <h3>15 <span>jun</span> </h3>
                    </div>
                    <div class="time">
                        <ul class="list-unstyle">
                            <li> <span class="ti-time"></span> 12:00 AM - 12:30 AM</li>
                            <li> <span class="ti-location-pin"></span> Banda Aceh</li>
                        </ul>
                    </div>
                    <p>Divided living they're Subdue man also dont. Land morning blessed do that for the best </p>
                    <a href="{{ url('/register') }}" class="btn_2">REGISTER</a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- upcoming_event part start-->

<!-- blog_part part start-->
<section class="blog_part section_padding">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-5">
            <div class="section_tittle text-center">
                <!-- <h4>From The Blog</h4> -->
                <h2>Latest News & Update</h2>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($news as $item)
        <div class="col-sm-6 col-lg-4 col-xl-4">
            <div class="single-home-blog">
                <div class="card">
                    <img src="{{ url('storage/news-image/'.$item->image) }}" class="card-img-top" alt="blog" height="300px" width="100%">
                    <div class="card-body">
                        <span class="dot">{{ $item->updated_at->format('d M Y') }}</span>
                        <a href="{{ url('/'.$item->slug) }}"><h5 class="card-title">{{ $item->title }}</h5></a>
                        <a href=""></a>
                        <!-- <ul>
                            <li> <span class="ti-layers"></span>Sports news</li>
                            <li> <span class="ti-comments"></span>2 Comments</li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <nav class="blog-pagination justify-content-center d-flex">
                {{ $news->links() }}
            </nav>
        </div>
    </div>
</div>
</section>
<!-- blog_part part end-->

<!-- player info part start-->
<!-- <section class="player_info section_padding">
<div class="container">
    <div class="row">
        <div class="player_info_item owl owl-carousel">
            <div class="player_info_iner">
                <div class="row align-items-center">
                    <div class="col-md-6 col-xl-5">
                        <div class="player_info_img">
                            <img src="img/player_info.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 offset-xl-1 col-xl-5">
                        <div class="player_info_text">
                            <h3>Jequline Dodge</h3>
                            <p>Together won't fowl you fish living in signs open which seed Face it above male in him his subdue spirit deep given. Won't forth don't cattle was were second fruitful. Together won't fowl Together won't fowl you fish living in signs open which seed Face it above male in him his subdue spirit deep given. Won't forth don't cattle was were second fruitful.</p>
                            <a href="#" class="">Swords Club</a> <img src="img/club_logo.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="player_info_iner">
                <div class="row align-items-center">
                    <div class="col-md-6 col-xl-5">
                        <div class="player_info_img">
                            <img src="img/about.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 offset-xl-1 col-xl-5">
                        <div class="player_info_text">
                            <h3>Jequline Dodge</h3>
                            <p>Together won't fowl you fish living in signs open which seed Face it above male in him his subdue spirit deep given. Won't forth don't cattle was were second fruitful. Together won't fowl Together won't fowl you fish living in signs open which seed Face it above male in him his subdue spirit deep given. Won't forth don't cattle was were second fruitful.</p>
                            <a href="#" class="">Swords Club</a> <img src="img/club_logo.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section> -->
<!-- about part start-->

<!-- gallery_part part start-->
<!-- <section class="gallery_part">
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-5">
            <div class="section_tittle text-center">
                <h4>Our Gallery</h4>
                <h2>Latest Player Showcase</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="gallery_part_item">
                <div class="grid">
                    <div class="grid-sizer"></div>
                    <a href="img/gallery/gallery_item_1.png" class="grid-item grid-item--height1 bg_img img-gal" style="background-image: url('img/gallery/gallery_item_1.png')">
                        <div class="single_gallery_item">
                            <div class="single_gallery_item_iner">
                                <div class="gallery_item_text">
                                    <h3>Face is had place image</h3>
                                    <p>Swords Club vs Uknights Club</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="img/gallery/gallery_item_2.png" class="grid-item grid-item--height2 bg_img img-gal" style="background-image: url('img/gallery/gallery_item_2.png')">
                        <div class="single_gallery_item">
                            <div class="single_gallery_item_iner">
                                <div class="gallery_item_text">
                                    <h3>Face is had place image</h3>
                                    <p>Swords Club vs Uknights Club</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="img/gallery/gallery_item_3.png" class="grid-item grid-item--width2 grid-item--height2 bg_img img-gal" style="background-image: url('img/gallery/gallery_item_3.png')">
                        <div class="single_gallery_item">
                            <div class="single_gallery_item_iner">
                                <div class="gallery_item_text">
                                    <h3>Face is had place image</h3>
                                    <p>Swords Club vs Uknights Club</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="img/gallery/gallery_item_4.png" class="grid-item grid-item--height3 bg_img img-gal" style="background-image: url('img/gallery/gallery_item_4.png')">
                        <div class="single_gallery_item">
                            <div class="single_gallery_item_iner">
                                <div class="gallery_item_text">
                                    <h3>Face is had place image</h3>
                                    <p>Swords Club vs Uknights Club</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="img/gallery/gallery_item_5.png" class="grid-item grid-item--height3 bg_img img-gal" style="background-image: url('img/gallery/gallery_item_5.png')">
                        <div class="single_gallery_item">
                            <div class="single_gallery_item_iner">
                                <div class="gallery_item_text">
                                    <h3>Face is had place image</h3>
                                    <p>Swords Club vs Uknights Club</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="img/gallery/gallery_item_6.png" class="grid-item grid-item--width2 grid-item--height2 bg_img img-gal" style="background-image: url('img/gallery/gallery_item_6.png')">
                        <div class="single_gallery_item">
                            <div class="single_gallery_item_iner">
                                <div class="gallery_item_text">
                                    <h3>Face is had place image</h3>
                                    <p>Swords Club vs Uknights Club</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="img/gallery/gallery_item_7.png" class="grid-item grid-item--height2 bg_img img-gal" style="background-image: url('img/gallery/gallery_item_7.png')">
                        <div class="single_gallery_item">
                            <div class="single_gallery_item_iner">
                                <div class="gallery_item_text">
                                    <h3>Face is had place image</h3>
                                    <p>Swords Club vs Uknights Club</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="img/gallery/gallery_item_8.png" class="grid-item grid-item--height1 bg_img img-gal" style="background-image: url('img/gallery/gallery_item_8.png')">
                        <div class="single_gallery_item">
                            <div class="single_gallery_item_iner">
                                <div class="gallery_item_text">
                                    <h3>Face is had place image</h3>
                                    <p>Swords Club vs Uknights Club</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</section> -->
<!-- gallery_part part end-->



<!-- social_connect_part part start-->
<!-- <section class="social_connect_part">
<div class="container-fluid">
    <div class="row justify-content-center ">
        <div class="col-xl-5">
            <div class="section_tittle text-center">
                <h4>Social Media</h4>
                <h2> Follow Us Instagram</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="social_connect">
            <div class="single-social_connect">
                <div class="social_connect_img">
                    <img src="img/insta/instagram_1.png" class="" alt="blog">
                    <div class="social_connect_overlay">
                        <a href="#"><span class="ti-instagram"></span></a> 
                    </div>
                </div>
            </div>
            <div class="single-social_connect">
                <div class="social_connect_img">
                    <img src="img/insta/instagram_2.png" class="" alt="blog">
                    <div class="social_connect_overlay">
                        <a href="#"><span class="ti-instagram"></span></a> 
                    </div>
                </div>
            </div>
            <div class="single-social_connect">
                <div class="social_connect_img">
                    <img src="img/insta/instagram_3.png" class="" alt="blog">
                    <div class="social_connect_overlay">
                        <a href="#"><span class="ti-instagram"></span></a> 
                    </div>
                </div>
            </div>
            <div class="single-social_connect">
                <div class="social_connect_img">
                    <img src="img/insta/instagram_4.png" class="" alt="blog">
                    <div class="social_connect_overlay">
                        <a href="#"><span class="ti-instagram"></span></a> 
                    </div>
                </div>
            </div>
            <div class="single-social_connect">
                <div class="social_connect_img">
                    <img src="img/insta/instagram_5.png" class="" alt="blog">
                    <div class="social_connect_overlay">
                        <a href="#"><span class="ti-instagram"></span></a> 
                    </div>
                </div>
            </div>
            <div class="single-social_connect">
                <div class="social_connect_img">
                    <img src="img/insta/instagram_6.png" class="" alt="blog">
                    <div class="social_connect_overlay">
                        <a href="#"><span class="ti-instagram"></span></a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</section> -->
<!-- social_connect_part part end-->

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
            <div class="col-xl-4 col-sm-8 col-md-8 mb-4 mb-xl-0 single-footer-widget">
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