@extends('layouts.app')
@section('add_more_css')
    <link rel="stylesheet" href="{{ asset('css/home.css')  }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset("js/jquery-3.4.1.min.js") }}"> </script>
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
@section('content')
    <div class="container">
        <div class="col-md-9">
            <div class="row translate_head">
                <div class="text-center"><a href="">Vietnamese</a></div>
                <div class="text-center ex_arrows"><a href=""><img src="{{ asset("frontend/images/home/exchange-arrows.png") }}" alt=""></a></div>
                <div class="text-center"><a href="">English</a></div>
            </div>
            <div class="row translate_body" style="clear: left">
                <div class="col-md-6" style="padding: 0px;"><textarea style="resize: none;" class="form-control" name="" id="textarea_one" cols="30" rows="10" placeholder="Nhập nội dung"></textarea></div>
                <div class="col-md-6" style="padding: 0px;"><textarea style="resize: none;" class="form-control" name="" id="textarea_two" cols="30" rows="10" placeholder="Bản dịch"></textarea></div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection
