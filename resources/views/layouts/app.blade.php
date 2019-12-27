<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>EngMe</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

    <!-- Fonts
    ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>

    <!-- CSS  -->

    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <!-- owl.carousel CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">

    <!-- owl.theme CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/owl.theme.css')}}">

    <!-- owl.transitions CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/owl.transitions.css')}}">

    <!-- font-awesome.min CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    <!-- font-icon CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('fonts/font-icon.css')}}">

    <!-- jquery-ui CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">

    <!-- mobile menu CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/meanmenu.min.css')}}">

    <!-- animate CSS
   ============================================ -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">

    <!-- normalize CSS
   ============================================ -->
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">

    <!-- main CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <!-- style CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- responsive CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

    @yield('add_more_css')

    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>
<body class="home-one">
{{--@if(get_data_user('web','active') == 1)--}}
{{--    <div class="alert alert-danger" style="position: fixed; left: 0;z-index: 1;">--}}
{{--        <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>--}}
{{--        <strong>Tài khoản của bạn chưa được kích hoạt. Hãy check địa chỉ email của bạn để kích hoạt tài khoản</strong> {{ \Session::get('danger') }} &nbsp;&nbsp;&nbsp;&nbsp;--}}
{{--    </div>--}}
{{--@endif--}}
<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Add your site or application content here -->
<!-- header area start -->

<!-- header area end -->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="z-index: 1;">
    @if(\Session::has('success'))
        <div class="alert alert-success" style="position: fixed; right: 20px;">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Thành công! </strong> {{ \Session::get('success') }} &nbsp;&nbsp;&nbsp;&nbsp;
        </div>
    @endif

    @if(\Session::has('danger'))
        <div class="alert alert-danger" style="position: fixed; right: 0;">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Thất bại! </strong> {{ \Session::get('danger') }} &nbsp;&nbsp;&nbsp;&nbsp;
        </div>
    @endif

</div>
@include('components.header')
<!-- header area end -->
@yield('content')
<!-- FOOTER START -->
@include('components.footer')

<!-- FOOTER START -->
<!-- FOOTER END -->

<!-- JS -->

<!-- jquery-1.11.3.min js
============================================ -->
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('js/jquery.contextMenu.min.js')}}"></script>

<!-- bootstrap js
============================================ -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<!-- owl.carousel.min js
============================================ -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>

<!-- jquery scrollUp js
============================================ -->
<script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>

<!-- price-slider js
============================================ -->
<script src="{{asset('js/price-slider.js')}}"></script>

<!-- elevateZoom js
============================================ -->
<script src="{{asset('js/jquery.elevateZoom-3.0.8.min.js')}}"></script>

<!-- jquery.bxslider.min.js
============================================ -->
<script src="{{asset('js/jquery.bxslider.min.js')}}"></script>

<!-- mobile menu js
============================================ -->
<script src="{{asset('js/jquery.meanmenu.js')}}"></script>

<!-- wow js
============================================ -->
<script src="{{asset('js/wow.js')}}"></script>

<!-- plugins js
============================================ -->
<script src="{{asset('js/plugins.js')}}"></script>

<!-- main js
============================================ -->
<script src="{{asset('js/main.js')}}"></script>

@yield('script')
</body>
</html>
