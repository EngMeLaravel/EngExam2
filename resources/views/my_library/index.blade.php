@extends('layouts.app')

@section('content')
    <style>
        .btn-create-folder {
            height: 40px;
            border: 1px solid #337AB7;
            border-radius: 24px;
            color: white;
            background-color: #337AB7;
            padding: 0 12px;
            outline: none;
        }

        .btn-create-folder:hover {
            opacity: 0.8;
        }

        #content {
            margin-top: 20px;
        }

        .card {
            margin-bottom: 15px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            height: 60px;
            background-size: cover;
            font-weight: bolder;
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

        div#context-menu1 {
            line-height: 15px;
            background: #eeeeee;
            margin: 0;
        }

        div#context-menu1 a {
            padding: 7px 20px;
            display: block;
            color: black;
        }

        div#context-menu1 a:hover {
            background: white;
        }

        .nganh-con {
            margin-bottom: 15px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            height: 120px;
            background-size: cover;
            font-weight: bolder;
        }

        .nganh-con a.name_subcate {
            text-transform: uppercase;
            margin: 0;
            text-align: center;
            color: white;
            font-size: 20px;
            text-decoration: none;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
    </style>
    <div class="container" id="content">
        <h3 class="text-center" style="color: black;">Kho cá nhân</h3>
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
        <div class="row">
            <div class="col-md-2" style="position: unset;margin-top: 15px;">
                @if(isset($my_category) && count($my_category) > 0)
                    @foreach($my_category as $my_category_item)
                        <div class="card"
                             style="background-image: url({{ pare_url_file($my_category_item->my_cate_avatar) }});">
                            <a class="name_cate"
                               href="{{ route("show_mysubcategory.my_lib.index",$my_category_item->id) }}">{{ $my_category_item->my_cate_name  }}</a>
                            <div class="dropdown-menu dropdown-menu-sm" id="context-menu" style="">
                                <a id="edit_category" data-toggle="modal" data-target="#editcategory"
                                   data-id="{{ $my_category_item->id }}"
                                   data-name="{{ $my_category_item->my_cate_name }}"
                                   data-avatar="{{ pare_url_file($my_category_item->my_cate_avatar) }}"
                                   class="dropdown-item" href="#">Sửa</a>
                                <a id="delete_category" data-toggle="modal" data-target="#deletecategory"
                                   data-id="{{ $my_category_item->id }}" class="dropdown-item" href="#">Xóa</a>
                                <a id="add_sub_category" data-toggle="modal" data-target="#addsubcategory"
                                   data-id="{{ $my_category_item->id }}" class="dropdown-item" href="#">Thêm ngành
                                    con</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    CHƯA CÓ DANH MỤC NÀO
                @endif
            </div>
            <div class="col-md-7" style="position: unset;margin: 15px 0;">
                @if(isset($mysubcategory))
                    @foreach($mysubcategory as $my_sub_category_item)
                        <div class="nganh-con"
                             style="background-image: url({{ pare_url_file($my_sub_category_item->my_subcate_avatar) }});">
                            <a class="name_subcate"
                               href="{{ route("show_mysubcategory.my_lib.index",$my_sub_category_item->id) }}">{{ $my_sub_category_item->my_subcate_name  }}</a>
                            <div class="dropdown-menu dropdown-menu-sm" id="context-menu1" style="">
                                <a id="edit_subcategory" data-toggle="modal" data-target="#editsubcategory"
                                   data-id="{{ $my_sub_category_item->id }}"
                                   data-name="{{ $my_sub_category_item->my_subcate_name }}"
                                   data-avatar="{{ pare_url_file($my_sub_category_item->my_subcate_avatar) }}"
                                   class="dropdown-item" href="#">Sửa</a>
                                <a id="delete_subcategory" data-toggle="modal" data-target="#deletesubcategory"
                                   data-id="{{ $my_sub_category_item->id }}" class="dropdown-item"
                                   href="#">Xóa</a>
                                <a id="add_vocabulary" data-toggle="modal" data-target="#addvocabulary"
                                   data-id="{{ $my_sub_category_item->id }}" class="dropdown-item" href="#">Thêm
                                    từ
                                    vựng</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    ĐÂY LÀ PHẦN GIỚI THIỆU LÚC MỚI VÔ TRANG
                @endif
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
    <div class="modal fade" id="addGroupVoca" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tạo nhóm từ mới</h4>
                </div>
                <form action="{{ route('add.my_lib.index')  }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="c_name">Tên Danh Mục:</label>
                            <input type="text" class="form-control" id="c_name" placeholder="Ten Danh Muc"
                                   value="{{old('my_cate_name',isset($my_category->my_cate_name) ? $my_category->my_cate_name : '')}}"
                                   name="my_cate_name">
                            @if ($errors->has('my_cate_name'))
                                <span class="error-text">
                                    {{$errors->first('my_cate_name')}}
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="input_img">Avatar:</label>
                            <input type="file" name="my_cate_avatar" id="input_img" class="form-control"
                                   value="{{old('my_cate_avatar',isset($my_category->my_cate_avatar) ? $my_category->my_cate_avatar : '')}}">
                            @if ($errors->has('my_cate_avatar'))
                                <span class="error-text">
                                    {{$errors->first('my_cate_avatar')}}
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <img
                                src="{{isset($my_category->my_cate_avatar) ? pare_url_file($my_category->my_cate_avatar) : asset('img/no-image-available-grid.jpg')}}"
                                id="output_img" alt="" style="width: 500px;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tạo</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>
                </form>
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
                <form action="{{ route('save.my_lib.index')  }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="my_cate_id_edit" name="my_cate_id">
                        <div class="form-group">
                            <label for="c_name">Tên Danh Mục:</label>
                            <input type="text" class="form-control" id="my_cate_name" placeholder="Ten Danh Muc"
                                   value="" name="my_cate_name">
                            @if ($errors->has('my_cate_name'))
                                <span class="error-text">
                                    {{$errors->first('my_cate_name')}}
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="input_img">Avatar:</label>
                            <input type="file" name="my_cate_avatar" class="form-control"
                                   value="">
                            @if ($errors->has('my_cate_avatar'))
                                <span class="error-text">
                                    {{$errors->first('my_cate_avatar')}}
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <img src="" id="my_cate_avatar" alt="" style="width: 500px;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="save_cate">Lưu</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>
                </form>
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
                <form action="{{ route('delete.my_lib.index')  }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <h4 class="modal-title text-center">Bạn có chắc là muốn xóa nhóm này không?</h4>
                        <input type="hidden" id="my_cate_id_delete" name="my_cate_id">
                    </div>
                    <div class="modal-footer" style="border-top: none">
                        <button type="submit" class="btn btn-primary">Có</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                    </div>
                </form>
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
                <form action="{{ route('addsubcate.my_lib.index')  }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" id="my_cate_id_add" name="my_cate_id">
                            <label for="c_name">Tên Danh Mục Con</label>
                            <input type="text" class="form-control" placeholder="Ten Danh Muc Con"
                                   value="{{old('my_subcate_name',isset($my_category->my_subcate_name) ? $my_category->my_subcate_name : '')}}"
                                   name="my_subcate_name">
                            @if ($errors->has('my_subcate_name'))
                                <span class="error-text">
                                    {{$errors->first('my_subcate_name')}}
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="input_img">Avatar:</label>
                            <input type="file" name="my_subcate_avatar" class="form-control"
                                   value="{{old('my_subcate_avatar',isset($my_category->my_subcate_avatar) ? $my_category->my_subcate_avatar : '')}}">
                            @if ($errors->has('my_subcate_avatar'))
                                <span class="error-text">
                                    {{$errors->first('my_subcate_avatar')}}
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <img
                                src="{{isset($my_category->my_sub_cate_avatar) ? pare_url_file($my_category->my_sub_cate_avatar) : asset('img/no-image-available-grid.jpg')}}"
                                id="output_img" alt="" style="width: 500px;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tạo</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editsubcategory" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Sửa nhóm con</h4>
                </div>
                <form action="{{ route('savesubcate.my_lib.index')  }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="my_subcate_id_edit" name="my_subcate_id">
                        <div class="form-group">
                            <label for="c_name">Tên Danh Mục:</label>
                            <input type="text" class="form-control" id="my_subcate_name" placeholder="Ten Danh Muc"
                                   value="" name="my_subcate_name">
                            @if ($errors->has('my_subcate_name'))
                                <span class="error-text">
                                    {{$errors->first('my_subcate_name')}}
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="input_img">Avatar:</label>
                            <input type="file" name="my_subcate_avatar" class="form-control"
                                   value="">
                            @if ($errors->has('my_subcate_avatar'))
                                <span class="error-text">
                                    {{$errors->first('my_subcate_avatar')}}
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <img src="" id="my_subcate_avatar" alt="" style="width: 500px;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="save_subcate">Lưu</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deletesubcategory" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center" style="border-bottom: none">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <img src="{{ asset("img/cancel.png") }}" alt="">
                </div>
                <form action="{{ route('deletesubcate.my_lib.index')  }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <h4 class="modal-title text-center">Bạn có chắc là muốn xóa nhóm con này không?</h4>
                        <input type="hidden" id="my_subcate_id_delete" name="my_subcate_id">
                    </div>
                    <div class="modal-footer" style="border-top: none">
                        <button type="submit" class="btn btn-primary">Có</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    // pass my_cate_id va my_cate_name và my_cate_avatar vao input trong modal #editcategory
    <script>
        $(document).on("click", "#edit_category", function () {
            var my_cate_id = $(this).data('id');
            var my_cate_name = $(this).data('name');
            var my_cate_avatar = $(this).data('avatar');
            $(".modal-body #my_cate_id_edit").val(my_cate_id);
            $(".modal-body #my_cate_name").val(my_cate_name);
            document.getElementById('my_cate_avatar').src = my_cate_avatar;
            // As pointed out in comments,
            // it is unnecessary to have to manually call the modal.
            // $('#addBookDialog').modal('show');
        });
    </script>

    // pass my_cate_id va my_cate_name vao input trong modal #editsubcategory
    <script>
        $(document).on("click", "#edit_subcategory", function () {
            var my_subcate_id = $(this).data('id');
            var my_subcate_name = $(this).data('name');
            var my_subcate_avatar =$(this).data('avatar');
            $(".modal-body #my_subcate_id_edit").val(my_subcate_id);
            $(".modal-body #my_subcate_name").val(my_subcate_name);
            document.getElementById('my_subcate_avatar').src = my_subcate_avatar;
            // As pointed out in comments,
            // it is unnecessary to have to manually call the modal.
            // $('#addBookDialog').modal('show');
        });
    </script>

    // pass my_cate_id input trong modal #deletecategory
    <script>
        $(document).on("click", "#delete_category", function () {
            var my_cate_id = $(this).data('id');
            $(".modal-body #my_cate_id_delete").val(my_cate_id);
            // As pointed out in comments,
            // it is unnecessary to have to manually call the modal.
            // $('#addBookDialog').modal('show');
        });
    </script>

    // pass my_cate_id input trong modal #deletesubcategory
    <script>
        $(document).on("click", "#delete_subcategory", function () {
            var my_subcate_id = $(this).data('id');
            $(".modal-body #my_subcate_id_delete").val(my_subcate_id);
            // As pointed out in comments,
            // it is unnecessary to have to manually call the modal.
            // $('#addBookDialog').modal('show');
        });
    </script>

    // pass my_cate_id input trong modal #addsubcategory
    <script>
        $(document).on("click", "#add_sub_category", function () {
            var my_cate_id = $(this).data('id');
            $(".modal-body #my_cate_id_add").val(my_cate_id);
            console.log(my_cate_id);
            // As pointed out in comments,
            // it is unnecessary to have to manually call the modal.
            // $('#addBookDialog').modal('show');
        });
    </script>

    <script>
        $('.card').on('contextmenu', function (e) {
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
            $(this).find("#context-menu").on('contextmenu', function (e) {
                $(this).find("#context-menu").removeClass("show").hide();
            });
        }).on("click", function () {
            $("#context-menu").removeClass("show").hide();
        });

        $("#context-menu a").on("click", function () {
            $(this).parent().removeClass("show").hide();
        });
        $(document).click(function () {
            $(".dropdown-menu").removeClass("show").hide();
        });
        $(document).on('contextmenu', function (e) {
            $(".dropdown-menu").removeClass("show").hide();
        });
    </script>

    <script>
        $('.nganh-con').on('contextmenu', function (e) {
            $(this).prevAll().find("#context-menu1").removeClass("show").hide();
            $(this).nextAll().find("#context-menu1").removeClass("show").hide();
            var top = e.pageY;
            var left = e.pageX;
            $(this).find('#context-menu1').css({
                display: "block",
                top: top,
                left: left
            }).addClass("show");
            return false; //blocks default Webbrowser right click menu
            $(this).find("#context-menu1").on('contextmenu', function (e) {
                $(this).find("#context-menu1").removeClass("show").hide();
            });
        }).on("click", function () {
            $("#context-menu1").removeClass("show").hide();
        });

        $("#context-menu1 a").on("click", function () {
            $(this).parent().removeClass("show").hide();
        });
        $(document).click(function () {
            $(".dropdown-menu").removeClass("show").hide();
        });
        $(document).on('contextmenu', function (e) {
            $(".dropdown-menu").removeClass("show").hide();
        });
    </script>
@endsection
