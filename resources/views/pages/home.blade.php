@extends('layout')
@section('add_more_css')
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css')  }}">
@endsection
@section('main_content')
    @php
        use Stichoza\GoogleTranslate\GoogleTranslate;

        $tr = new GoogleTranslate(); // Auto-detected language by default
        $tr->setSource(); // Detect language automatically
        $tr->setTarget('vi');
        $text = $tr->translate('Detect language automatically');
    @endphp
    <div class="container">
        <div class="col-md-9">
            <div class="translate_title">
                <div class="left float-left"><a href="">Vietnamese</a></div>
                <span class="ml-2"><a href=""><img src="{{ asset("frontend/images/home/exchange-arrows.png") }}" alt=""></a></span>
                <div class="right float-right"><a href="">English</a></div>
            </div>
            <div class="translate_content">
                <textarea name="" id="" cols="30" rows="10" placeholder="Nhập nội dung"></textarea>
                <textarea name="" id="" cols="30" rows="10" placeholder="Dịch">@php echo $text @endphp</textarea>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection
