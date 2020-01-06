<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="../../favicon.ico">

    <title>Admin System</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('theme_admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="{{ asset('theme_admin/css/dassboard.css') }}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- <script src="../../assets/js/ie-emulation-modes-warning.js"></script> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .btn_customer_action{
            padding: 5px 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 12px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('admin.home') }}">Xin chào {{ get_data_user('admins','name') }}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li></li>
                <li><a href="{{ route('admin.logout') }}">Đăng xuất</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="{{ \Request::route()->getName() == 'admin.home' ? 'active' : '' }}">
                    <a href="{{ route('admin.home') }}">Trang Chu <span class="sr-only">(current)</span></a>
                </li>
                <li class="{{ \Request::route()->getName() == 'admin.get.list.category' ? 'active' : '' }}"><a href="{{ route('admin.get.list.category') }}">Danh Muc</a></li>
                <li class="{{ \Request::route()->getName() == 'admin.get.list.sub_category' ? 'active' : '' }}"><a href="{{ route('admin.get.list.sub_category') }}">Danh Muc Con</a></li>
                <li class="{{ \Request::route()->getName() == 'admin.get.list.vocabulary' ? 'active' : '' }}"><a href="{{ route('admin.get.list.vocabulary') }}">Tu Vung</a></li>
                <li class="{{ \Request::route()->getName() == 'admin.get.list.user' ? 'active' : '' }}"><a href="{{ route('admin.get.list.user') }}">Thanh Vien</a></li>
                <li class="{{ \Request::route()->getName() == 'admin.get.list.contact' ? 'active' : '' }}"><a href="{{ route('admin.get.list.contact') }}">Lien He</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
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
            @yield('content')

        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('theme_admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('theme_admin/js/bootstrap.min.js') }}"></script>
<script src="https://kit.fontawesome.com/46c2bd36d6.js" crossorigin="anonymous"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#output_img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#input_img").change(function() {
        readURL(this);
    });
</script>
@yield('script')
</body>
</html>
