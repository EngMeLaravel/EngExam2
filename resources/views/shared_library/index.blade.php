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
            padding: 5px;
            font-size: 15px;
            padding: 9px;
            text-align: center;
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
            z-index: 1;
            background-color: white;
            opacity: 0.2;
            border-radius:  4px;
            display: none;
        }
        .nganh-con:hover .bg-blur{
            display: block;
        }
        #mot-khoi{
            margin: 15px 0;
        }
        .name_category{
            margin-top: 15px;
        }
        .card{
            margin-bottom: 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        div#context-menu {
            line-height: 15px;
            background: #eeeeee;
            margin: 0;
        }

        div#context-menu a {
            padding: 7px 20px;
            display: block;
            color: black;
        }

        div#context-menu a:hover {
            background: white;
        }
        .input_same {
            width: 100%;
            border-radius: 4px;
            padding: 10px;
            outline: none;
            border: 1px solid #E0E0E0;
        }
    </style>
    <div class="container" id="content">
        <h3 class="text-center" style="color: black;margin-bottom: 20px;">Thư viện chung</h3>
        <div class="row">
            <div class="col-md-2" style="position: unset;margin-top: 15px;">
                <div class="card bg-primary">
                    <h4>Công nghệ thông tin</h4>
                    <div class="dropdown-menu dropdown-menu-sm" id="context-menu" style="">
                        <a id="edit_category" data-toggle="modal" data-target="#editcategory" class="dropdown-item" href="#">Sửa</a>
                        <a id="delete_category" data-toggle="modal" data-target="#deletecategory" class="dropdown-item" href="#">Xóa</a>
                        <a id="add_sub_category" data-toggle="modal" data-target="#addsubcategory" class="dropdown-item" href="#">Thêm ngành con</a>
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
                                <span class="text-center">Khoa học Máy tính</span>
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
    <div class="modal fade" id="editcategory" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Sửa nhóm cha</h4>
                </div>
                <div class="modal-body">
                    <input class="input_same" type="text">
                </div>
                <div class="modal-footer">
                    <a href="google.com" type="button" class="btn btn-primary">Lưu</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addsubcategory" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm nhóm con mới</h4>
                </div>
                <div class="modal-body">
                    <input class="input_same" type="text" placeholder="Nhập nhóm con cần thêm">
                </div>
                <div class="modal-footer">
                    <a href="google.com" type="button" class="btn btn-primary">Tạo</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deletecategory" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center" style="border-bottom: none">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <img src="{{ asset("img/cancel.png") }}" alt="">
                </div>
                <div class="modal-body">
                    <h4 class="modal-title text-center">Bạn có chắc là muốn xóa nhóm này không?</h4>
                </div>
                <div class="modal-footer" style="border-top: none">
                    <a href="google.com" type="button" class="btn btn-primary">Có</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.card').on('contextmenu', function(e) {
            $(this).prevAll().find("#context-menu").removeClass("show").hide();
            $(this).nextAll().find("#context-menu").removeClass("show").hide();
            var top = e.pageY;
            var left = e.pageX;
            $(this).find('#context-menu').css({
                display: "block",
                top: top,
                left: left
            }).addClass("show");
            return false; //blocks default Webbrowser right click menu
            $(this).find("#context-menu").on('contextmenu', function(e) {
                $(this).find("#context-menu").removeClass("show").hide();
            });
        }).on("click", function() {
            $("#context-menu").removeClass("show").hide();
        });

        $("#context-menu a").on("click", function() {
            $(this).parent().removeClass("show").hide();
        });
        $(document).click(function() {
            $(".dropdown-menu").removeClass("show").hide();
        });
        $(document).on('contextmenu', function(e) {
            $(".dropdown-menu").removeClass("show").hide();
        });
    </script>
@endsection
