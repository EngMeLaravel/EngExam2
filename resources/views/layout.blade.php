<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/css/header.css')  }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/footer.css')  }}">
    @yield('add_more_css')
    <style>
        div#wrap_content {
            display: block;
            background: #F4F4F4;
            padding-top: 50px;
            height: 700px;
        }
    </style>
    <title>Document</title>
</head>
<body>
    @include('blocks.header')
    <div id="wrap_content">
        @yield('main_content')
    </div>
    @include('blocks.footer')
</body>
</html>
