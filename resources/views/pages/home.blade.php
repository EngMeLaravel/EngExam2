@extends('layout')
@section('add_more_css')
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css')  }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function(){
            $('#textarea_one').keyup(function(event) {
                var keyword = $(this).val();
                console.log(keyword);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ url('translate') }}',
                    type: 'post',
                    data: {keyword: keyword},
                    success: function(data){
                        $('#textarea_two').text(data);
                    }
                });
            });
        });
    </script>
@endsection
@section('main_content')
    <div class="container">
        <div class="col-md-9">
            <div class="translate_title">
                <div class="left float-left"><a href="">Vietnamese</a></div>
                <span class="ml-2"><a href=""><img src="{{ asset("frontend/images/home/exchange-arrows.png") }}" alt=""></a></span>
                <div class="right float-right"><a href="">English</a></div>
            </div>
            <div class="translate_content">
                <textarea name="" id="textarea_one" cols="30" rows="10" placeholder="Nhập nội dung"></textarea>
                <textarea name="" id="textarea_two" cols="30" rows="10" placeholder="Dịch"></textarea>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection
