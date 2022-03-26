@extends('layout.main')

@section('container')
<!-- Start banner Area -->
<!--::breadcrumb part start::-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h1>LOGIN</h1>
                        <p>Home<span>/</span>Login</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--::breadcrumb part start::-->
<!-- End banner Area -->


<!-- Start Align Area -->
<div class="whole-wrap">
    <div class="container box_1170">
        <div class="section-top-border">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h3 class="mb-30 text-center">Login Page</h3>
                    @if(session()->has('loginError'))
                    <div class="row">
                        {{-- <div class="col-md-4"></div> --}}
                        <div class="col-md-12">
                            <div class="text-danger text-center">
                                {{ session('loginError') }}
                            </div>
                        </div>
                    </div>
                    @endif
                    <form action="{{ url('/login') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4 mt-10">
                                <input type="text" name="username" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'"
                                     class="single-input" required>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4 mt-10">
                                <input type="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'"
                                     class="single-input" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-5 text-center">
                                <button type="submit" class="genric-btn primary">LOGIN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Align Area -->

@endsection