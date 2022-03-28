<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>EBC USK</title>
    <link rel="icon" href="{{ url('img/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ url('css/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ url('css/owl.carousel.min.css') }}">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{ url('css/themify-icons.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ url('css/flaticon.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ url('css/magnific-popup.css') }}">
    <!-- Nice Select-->
    <link rel="stylesheet" href="{{ url('css/nice-select.css') }}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ url('css/swiper.min.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ url('css/style.css') }}">

    <style>
        div.navbar-collapse ul.navbar-nav li.nav-item  a.active {
            color: #ff8b23;
        }
        input.is-invalid, select.is-invalid{
            /* background-color: rgb(243, 189, 189); */
            border: 1px solid rgb(238, 173, 173);
        }
        div.blog_details ol{
            color: grey;
            font-size: 15px;
        }
        div.blog_details ul.blog-info-link li{
            color: grey;
            font-size: 15px;
            list-style-type: none;
            margin-bottom: 0;
            margin-left: 0;
        }
        div.blog_details ul li{
            color: grey;
            font-size: 15px;
            list-style-type: disc;
            margin-left: 35px;
        }
        div.blog_details ul{
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <!--::header part start::-->
    <header class="header_area">
        <div class="sub_header">
            <div class="container">
                <div class="row align-items-center">
                  <div class="col-md-4 col-xl-6">
                      <div id="logo">
                          <a href="{{ url('/') }}"><img src="img/Logo.png" alt="" title="" /></a>
                      </div>
                  </div>
                  <div class="col-md-8 col-xl-6">
                      <div class="sub_header_social_icon float-right">
                        <a href="#"><i class="flaticon-phone"></i>+0853 4567 89</a>
                        @guest
                            <a href="{{ url('/login') }}" class="register_icon"><i class="ti-arrow-right"></i>LOGIN</a>
                        @endguest
                        
                        @can('user')
                        <a href="{{ url('/register') }}" class="register_icon"><i class="ti-arrow-right"></i>REGISTER</a>
                        @endcan
                        @can('admin')
                        <a href="{{ url('/dashboard') }}" class="register_icon"><i class="ti-arrow-right"></i>DASHBOARD</a>
                        @endcan
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ url('/about') }}" >About us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('team') ? 'active' : '' }}" href="{{ url('team') }}">team</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a href="gallery.html" class="nav-link">gallery</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Pages
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="elements.html">Elements</a>
                                            <a class="dropdown-item" href="single-blog.html">Single blog</a>
                                        </div>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('blog') ? 'active' : '' }}" href="{{ url('/blog') }}">blog</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a href="contact.html" class="nav-link">Contact</a>
                                    </li> -->
                                </ul>
                                <div class="header_social_icon d-none d-lg-block">
                                    <ul>
                                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                                        <li>
                                            <a href="#"> <i class="ti-twitter"></i></a>
                                        </li>
                                        <li><a href="#"><i class="ti-instagram"></i></a></li>
                                        <li><a href="#"><i class="ti-skype"></i></a></li>
                                        @can('user')
                                        <form action="{{ url('/logout') }}" method="post" class="d-inline">@csrf
                                            <li><button type="submit" class="btn text-secondary" style="font-size: 15px;"><i class="ti-shift-right"></i> LOGOUT</button></li>
                                        </form>
                                        @endcan
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <div class="header_social_icon d-block d-lg-none">
                            <ul>
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li>
                                    <a href="#"> <i class="ti-twitter"></i></a>
                                </li>
                                <li><a href="#"><i class="ti-instagram"></i></a></li>
                                <li><a href="#"><i class="ti-skype"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    @yield('container')

    <footer class="copyright_part">
        <div class="container">
            <div class="row align-items-center">
                <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> Downloaded from <a href="https://themeslab.org/" target="_blank">Themeslab</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
                    <a href="#"><i class="ti-facebook"></i></a>
                    <a href="#"> <i class="ti-twitter"></i> </a>
                    <a href="#"><i class="ti-instagram"></i></a>
                    <a href="#"><i class="ti-skype"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="{{ url('js/jquery-1.12.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ url('js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <!-- aos js -->
    <script src="{{ url('js/aos.js') }}"></script>
    <!-- easing js -->
    <script src="{{ url('js/jquery.magnific-popup.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ url('js/swiper.min.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ url('js/masonry.pkgd.js') }}"></script>
    <script src="{{ url('js/jquery.nice-select.min.js') }}"></script>
    <!-- particles js -->
    <script src="{{ url('js/owl.carousel.min.js') }}"></script>
    <!-- carousel js -->
    <script src="{{ url('js/swiper.min.js') }}"></script>
    <!-- custom js -->
    <script src="{{ url('js/custom.js') }}"></script>



</body>

</html>