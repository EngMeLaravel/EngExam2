@extends('layouts.app')

@section('content')
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        #content{
            margin-top: 20px;
        }
        #content .row .col-md-7{
            padding:0 40px;
        }
        .nganh-cha{
            position: relative;
            border-radius: 4px;
            margin-bottom: 15px;
            cursor: pointer;
            width: 100%;
            height: 60px;
            background-size: cover;

        }
        .nganh-cha a{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            font-weight: bolder;
            z-index: 2;
        }
        .nganh-cha .bg-blur{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            transition: 0.2s;
            background-color: black;
            opacity: 0.5;
            border-radius:  4px;
            z-index: 1;
        }
        .nganh-cha:hover .bg-blur{
            opacity: 0.1;
        }
        #content a.name_cate {
            margin: 0;
            text-align: center;
            color: white;
            font-size: 18px;
            text-decoration: none;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        div#context-menu a {
            padding: 7px 20px;
            display: block;
            color: black;
        }

        div#context-menu a:hover {
            background: white;
        }
        .nganh-con{
            position: relative;
            width: 100%;
            height: 120px;
            cursor: pointer;
        }
        .nganh-con a{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;

        }
        .nganh-con a img{
            position: absolute;
            top: 0%;
            left: 0%;
            height: 120px;
            width: 100%;
            border-radius: 4px;
        }
        .nganh-con span{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 100%;
            color: white;
            opacity: 1;
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
            transition: 0.2s;
            background-color: black;
            opacity: 0.5;
            border-radius:  4px;
            z-index: 1;
        }
        .nganh-con:hover .bg-blur{
            opacity: 0.1;
        }

        #mot-khoi{
            margin: 15px 0;
        }
        h4#no_word_found{
            margin-top: 20px;
            padding: 0 20px;
        }

    </style>
    <div class="container" id="content">
        <h3 class="text-center" style="color: black;margin-bottom: 20px;">Thư viện chung</h3>
{{--        <div class="breadcrumbs">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-12">--}}
{{--                        <div class="container-inner">--}}
{{--                            <ul>--}}
{{--                                <li class="home">--}}
{{--                                    <a href="/">Trang chủ</a>--}}
{{--                                    <span><i class="fa fa-angle-right"></i></span>--}}
{{--                                </li>--}}
{{--                                <li class="category3"><span>Thư viện chung</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="row">
            <div class="col-md-2" style="position: unset;margin-top: 15px;">
                @if(isset($category))
                    @foreach($category as $category_item)
                        <div class="nganh-cha" style="background-image: url({{ pare_url_file($category_item->cate_avatar) }});">
                            <div class="bg-blur"></div>
                            <a class="name_cate" href="{{ route("show_subcategory.public_lib.index",$category_item->id) }}">{{ $category_item->cate_name }}</a>
                        </div>
                    @endforeach
                @else
                    Chưa có danh mục
                @endif
            </div>
            <div class="col-md-7">
                <div class="row">
                    @if(isset($subcategory) && count($subcategory) > 0)
                        @foreach($subcategory as $sub_category_item)
                            <div class="col-md-4" id="mot-khoi">
                                <div class="nganh-con">
                                    <a href="{{ route('get_vocabularies.public_lib.index',[$sub_category_item->cate_id, $sub_category_item->id]) }}">
                                        <div class="bg-blur"></div>
                                        <img src="{{ pare_url_file($sub_category_item->subcate_avatar) }}" alt="">
                                        <span class="text-center">{{ $sub_category_item->subcate_name  }}</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        @if(isset($vocabularies_detail))
                                <div class="col-md-12">
                                    @include('vocabulary.detail_voca')
                                </div>
                            @else
                            @if(isset($subcategory) && count($subcategory) <= 0)
                                <div class="col-md-12">
                                    <hr>
                                    <h4 id="no_word_found">khong co sub nao trong cate nay</h4>
                                </div>
                            @else
                                @if(isset($vocabularies) && count($vocabularies) > 0)
                                    <div class="col-md-12">
                                        @include('vocabulary.list_voca')
                                    </div>
                                @else
                                    @if(isset($vocabularies) && count($vocabularies) <=0)
                                        <div class="col-md-12">
                                            <hr>
                                            <h4 id="no_word_found">khong co voca nao trong subcate nay</h4>
                                        </div>
                                    @endif
                                @endif
                            @endif
                        @endif
                    @endif
                </div>
            </div>
            <div class="col-md-3" style="margin-top: 15px">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Từ hot</h3>
                    </div>
                    <div class="panel-body">
                        <p><a href="" class="text-primary">Listen</a></p>
                        <p><a href="" class="text-primary">Good</a></p>
                        <p><a href="" class="text-primary">Happen</a></p>
                        <p><a href="" class="text-primary">Tomorrow</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

