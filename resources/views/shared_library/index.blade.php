@extends('layouts.app')

@section('content')
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        #content{
            margin-top: 20px;
        }
        .card-body{
            cursor: pointer;
        }
        h4{
            margin: 0;
            padding: 10px;
            font-size: 15px;
        }
        .nganh-con{
            position: relative;
            width: 100%;
            height: 120px;
        }
        .nganh-con a{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .nganh-con a img{
            position: absolute;
            top: 0%;
            left: 0%;
            height: 120px;
            width: 100%;
        }
        .nganh-con span{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 100%;
            color: white;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 1.2rem;
            z-index: 2;
        }
        .nganh-con .bg-blur{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 120px;
            background-color: rgba(0,0,0,0.3);
            transition: 0.2s;
            z-index: 1;
        }
        .nganh-con:hover .bg-blur{
            background-color: rgba(0,0,0,0.1);
        }
        #mot-khoi{
            margin: 15px 0;
        }
        .name_category{
            margin-top: 15px;
        }
    </style>
    <div class="container" id="content">
        <div class="row">
            <div class="col-md-2" style="position: unset">
                <div class="card bg-primary">
                    <h4>Day la nganh cha</h4>
                    <div class="dropdown-menu dropdown-menu-sm" id="context-menu">
                        <a class="dropdown-item" href="#">Action</a><br>
                        <a class="dropdown-item" href="#">Another action</a><br>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-4" id="mot-khoi">
                        <div class="nganh-con">
                            <div class="bg-blur"></div>
                            <a href="">
                                <img src="{{ asset('img/nganh-con/khoa-hoc-may-tinh.jpg') }}" alt="">
                                <span class="text-center">Nganh con</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4" id="mot-khoi">
                        <div class="nganh-con">
                            <div class="bg-blur"></div>
                            <a href="">
                                <img src="{{ asset('img/nganh-con/khoa-hoc-may-tinh.jpg') }}" alt="">
                                <span class="text-center">Nganh con</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4" id="mot-khoi">
                        <div class="nganh-con">
                            <div class="bg-blur"></div>
                            <a href="">
                                <img src="{{ asset('img/nganh-con/khoa-hoc-may-tinh.jpg') }}" alt="">
                                <span class="text-center">Nganh con</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <h3>Day la nganh rieng</h3>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $('.card').on('contextmenu', function(e) {
            var top = e.pageY;
            var left = e.pageX;
            console.log(top, left)
            $("#context-menu").css({
                display: "block",
                top: top,
                left: left
            }).addClass("show");
            return false; //blocks default Webbrowser right click menu
        }).on("click", function() {
            $("#context-menu").removeClass("show").hide();
        });

        $("#context-menu a").on("click", function() {
            $(this).parent().removeClass("show").hide();
        });

    </script>
@endsection
