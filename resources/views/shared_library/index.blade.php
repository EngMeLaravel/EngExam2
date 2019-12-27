@extends('layouts.app')

@section('content')
    <style>
        #content{
            margin-top: 20px;
        }
        h4{
            margin: 0;
            padding: 15px;
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
    </style>
    <div class="container-fluid" id="content">
        <div class="row">
            <div class="col-md-2">
                <div class="card bg-primary">
                    <div class="card-body"><h4 class="text-center">Day la nganh cha</h4></div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-3" id="mot-khoi">
                        <div class="nganh-con">
                            <div class="bg-blur"></div>
                            <a href="">
                                <img src="{{ asset('img/nganh-con/khoa-hoc-may-tinh.jpg') }}" alt="">
                                <span class="text-center">Nganh con</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3" id="mot-khoi">
                        <div class="nganh-con">
                            <div class="bg-blur"></div>
                            <a href="">
                                <img src="{{ asset('img/nganh-con/khoa-hoc-may-tinh.jpg') }}" alt="">
                                <span class="text-center">Nganh con</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3" id="mot-khoi">
                        <div class="nganh-con">
                            <div class="bg-blur"></div>
                            <a href="">
                                <img src="{{ asset('img/nganh-con/khoa-hoc-may-tinh.jpg') }}" alt="">
                                <span class="text-center">Nganh con</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3" id="mot-khoi">
                        <div class="nganh-con">
                            <div class="bg-blur"></div>
                            <a href="">
                                <img src="{{ asset('img/nganh-con/khoa-hoc-may-tinh.jpg') }}" alt="">
                                <span class="text-center">Nganh con</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3" id="mot-khoi">
                        <div class="nganh-con">
                            <div class="bg-blur"></div>
                            <a href="">
                                <img src="{{ asset('img/nganh-con/khoa-hoc-may-tinh.jpg') }}" alt="">
                                <span class="text-center">Nganh con</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3" id="mot-khoi">
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
            <div class="col-md-2">
                <h3>Day la nganh rieng</h3>
            </div>
        </div>
    </div>
@endsection
