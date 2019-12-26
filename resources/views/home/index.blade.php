@extends('layouts.app')
@section('add_more_css')
    <link rel="stylesheet" href="{{ asset('css/home.css')  }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset("js/jquery-3.4.1.min.js") }}"> </script>
    <script>
        $(document).ready(function(){
            $('#textarea_one').keyup(function(event) {
                var keyword = $(this).val();
                var voca_single = keyword.split(" ");
                for(i = 0;i<voca_single.length;i++){
                    $('#voca_array'+i).html(voca_single[i]);
                    document.querySelector("#voca_array"+i).href = "voca/"+voca_single[i];
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ url('translate') }}',
                    type: 'post',
                    data: {keyword: keyword},
                    dataType: 'json',
                    success: function(data){
                        $('#textarea_two').text(data.text);
                    }
                });
            });
            $('#textarea_one').keydown(function(event) {
                var keyword = $(this).val();
                var voca_single = keyword.split(" ");
                for(i = 0;i<voca_single.length;i++){
                    $('#voca_array'+i).html(voca_single[i]);
                    document.querySelector("#voca_array"+i).href = "voca/"+voca_single[i];
                }
            });
        });
    </script>
@endsection
@section('content')
    <div class="container">
        <div class="col-md-9">
            <div class="row translate_head">
                <div class="text-center"><a href="">Vietnamese</a></div>
                <div class="text-center ex_arrows"><a href=""><img src="{{ asset("img/exchange-arrows.png") }}" alt=""></a></div>
                <div class="text-center"><a href="">English</a></div>
            </div>
            <div class="row translate_body" style="clear: left">
                <div class="col-md-6" style="padding: 0px;"><textarea style="resize: none;" class="form-control" name="" id="textarea_one" cols="30" rows="10" placeholder="Nhập nội dung"></textarea></div>
                <div class="col-md-6" style="padding: 0px;"><textarea style="resize: none;" class="form-control" name="" id="textarea_two" cols="30" rows="10" placeholder="Bản dịch"></textarea></div>
            </div>
            <div class="row translate_more">
                <div class="col-md-12">
                    <div id="test">
                        <h6>Details vocabulary</h6>
                        <a href="" id="voca_array0"></a>
                        <a href="" id="voca_array1"></a>
                        <a href="" id="voca_array2"></a>
                        <a href="" id="voca_array3"></a>
                        <a href="" id="voca_array4"></a>
                        <a href="" id="voca_array5"></a>
                        <a href="" id="voca_array6"></a>
                        <a href="" id="voca_array7"></a>
                        <a href="" id="voca_array8"></a>
                        <a href="" id="voca_array9"></a>
                        <a href="" id="voca_array10"></a>
                        <a href="" id="voca_array11"></a>
                        <a href="" id="voca_array12"></a>
                        <a href="" id="voca_array13"></a>
                        <a href="" id="voca_array14"></a>
                        <a href="" id="voca_array15"></a>
                        <a href="" id="voca_array16"></a>
                        <a href="" id="voca_array17"></a>
                        <a href="" id="voca_array18"></a>
                        <a href="" id="voca_array19"></a>
                        <a href="" id="voca_array20"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
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
@endsection
