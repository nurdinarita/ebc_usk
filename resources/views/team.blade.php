@extends('layout.main')

@section('container')
<!--::breadcrumb part start::-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
       <div class="row">
          <div class="col-lg-12">
             <div class="breadcrumb_iner">
                <div class="breadcrumb_iner_item">
                   <h1>Our Players</h1>
                   <p>Home<span>/</span>Players</p>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!--::breadcrumb part start::-->
 <!-- player info part start-->
 <section class="team_member section_padding padding_less_40">
    <div class="container">
       <div class="row d-flex justify-content-center">
          {{-- Content Card Pemain --}}
          @foreach ($teams as $team)
          @for($i=1; $i<=10; $i++)
            @if($team['p_name_'.$i])
            <div class="col-sm-6 col-lg-3">
               <div class="single_team_member single-home-blog">
                  <div class="card">
                     <img src="{{ url('storage/'.$team['p_photo_'.$i]) }}" class="card-img-top" alt="blog">
                     <div class="card-body">
                        <div class="tean_content">
                           <div class="blog_item_date">
                           <h3 style="margin-top: -15px;"><img src="{{ url('storage/'.$team['logo']) }}"></h3>
                           </div>  
                           <h5 class="card-title">{{ $team['p_name_'.$i] }}</h5>
                           <p>{{ $team->team_name }}</p>
                        </div>
                        <div class="tean_right_content">
                           <div class="header_social_icon">
                              <ul>
                                 <li><a href="#"><i class="ti-facebook"></i></a></li>
                                 <li>
                                    <a href="#"> <i class="ti-twitter"></i></a>
                                 </li>
                                 <li><a href="#"><i class="ti-instagram"></i></a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endif
          @endfor
          @endforeach
       </div>
         <nav class="blog-pagination justify-content-center d-flex" style="margin-top: -20px;">
            {{ $teams->links() }}
         </nav>
    </div>
 </section>
 <!-- about part start-->
 <!-- player info part start-->
 <!-- <section class="player_info section_padding">
    <div class="container">
       <div class="row">
          <div class="player_info_item owl owl-carousel">
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