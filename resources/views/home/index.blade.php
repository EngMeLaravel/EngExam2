@extends('layouts.app')
@section('add_more_css')
    <link rel="stylesheet" href="{{ asset('css/home.css')  }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset("js/jquery-3.4.1.min.js") }}"></script>
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
                <div class="text-center"><a href="">English</a></div>
                <div class="text-center ex_arrows"><a href=""><img src="{{ asset("img/exchange-arrows.png") }}" alt=""></a></div>
                <div class="text-center"><a href="">Vietnamese</a></div>
            </div>
            <div class="row translate_body" style="clear: left">
                <div class="col-md-6" style="padding: 0px;"><textarea style="resize: none;" class="form-control" name="" id="textarea_one" cols="30" rows="10" placeholder="Nhập nội dung"></textarea></div>
                <div class="col-md-6" style="padding: 0px;"><textarea style="resize: none;" class="form-control" name="" id="textarea_two" cols="30" rows="10" placeholder="Bản dịch"></textarea></div>
            </div>
            <div class="row translate_more">
                <div class="col-md-12">
                    <div id="test">
                        <h6>Details vocabulary</h6>
                        @php
                            for($i = 0; $i < 100; $i++){
                                echo "<a href='' id='voca_array$i' style='text-decoration:underline;'></a> ";
                            }
                        @endphp
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


