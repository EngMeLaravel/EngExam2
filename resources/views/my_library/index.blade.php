@extends('layouts.app')

@section('content')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.jumbotrons').contextmenu(function(e) {
                var top = e.pageY - 10;
                var left = e.pageX - 90;
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

        });
    </script>
    <style>
        .btn-create-folder{
            height: 40px;
            border: 1px solid #416dca;
            border-radius: 24px;
            color: white;
            background-color: #4d81ed;
            padding: 0 12px;
            outline: none;
        }
        .btn-create-folder:hover{
            opacity: 0.8;
        }
        .input_type_group_voca {
            width: 100%;
            border-radius: 4px;
            padding: 10px;
            outline: none;
            border: 1px solid #E0E0E0;
        }
        #content{
            margin-top: 20px;
        }
        .main-content{
            margin-top: 15px;
        }
        .main-content h4{
            margin: 0;
            padding: 15px;
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
            <div class="col-md-3">
                <div class="add_group_voca">
                    <button class="btn-create-folder" data-toggle="modal" data-target="#addGroupVoca">
                        <img src="{{ asset("img/add.png") }}" alt="">
                        <span>Tạo nhóm từ mới</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="row main-content">
            <div class="col-md-2">
                <div class="card bg-primary name_category">
                    <div class="card-body jumbotrons">
                        <h4 class="text-center">Công nghệ thông tin</h4>
                        <div class="dropdown-menu dropdown-menu-sm" id="context-menu">
                            <a class="dropdown-item" href="#">Thêm nhóm con</a>
                            <a class="dropdown-item" href="#">Sửa nhóm cha</a>
                            <a class="dropdown-item" href="#">Xóa nhóm cha</a>
                        </div>
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
    <div class="modal fade" id="addGroupVoca" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tạo nhóm từ mới</h4>
                </div>
                <div class="modal-body">
                    <input class="input_type_group_voca" type="text" placeholder="Nhập nhóm cần lưu">
                </div>
                <div class="modal-footer">
                    <a href="google.com" type="button" class="btn btn-primary">Tạo</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
@endsection
