@extends('admin::layouts.master')
@section('content')
    <script src="{{ asset("js/jquery-3.4.1.min.js") }}"></script>
    <script>
        $(document).ready(function () {
            $("#category").change(function(){
                var cate_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route('admin.ajax_select_sub_cate.vocabulary') }}',
                    type: 'post',
                    data: {cate_id: cate_id},
                    success: function (data) {
                        $('#sub_category').html(data);
                    }
                });
            });
        });
    </script>
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
            <li><a href="{{ route('admin.get.list.vocabulary') }}" title="danh mục">Từ vựng</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form class="form-inline" action="">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Tên từ vựng" value="{{ \Request::get('name') }}">
                </div>
                <div class="form-group">
                    <select name="cate" id="category" class="form-control">
                        <option value="">--Ngành cha--</option>
                        @if ($categories)
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ \Request::get('cate') == $category->id ? "selected='selected'" : '' }} >{{ $category->cate_name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <select name="subcate" id="sub_category" class="form-control">
                        <option value="">--Ngành con--</option>
                        @if ($sub_categories)
                            @foreach ($sub_categories as $sub_category)
                                <option value="{{ $sub_category->id }}" {{ \Request::get('subcate') == $sub_category->id ? "selected='selected'" : '' }} >{{ $sub_category->subcate_name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
    <h2>Quản lí từ vựng <a href="{{ route('admin.get.create.vocabulary') }}" class="pull-right"><i class="fas fa-plus-circle"></i></a></h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
            <tr>
                <th>#</th>
                <th>Từ</th>
                <th>Nghĩa của từ</th>
                <th>Phát âm</th>
                <th>Loại từ</th>
                <th>Ảnh</th>
                <th>Ví dụ En</th>
                <th>Nghĩa VD Vi</th>
                <th>Ngành cha</th>
                <th>Ngành con</th>
                <th>Thao Tác</th>
            </tr>
            </thead>
            <tbody>
                @if (isset($vocabularies))
                    @foreach ($vocabularies as $vocabulary)
                        <tr>
                            <td>{{ $vocabulary->id }}</td>
                            <td>{{ $vocabulary->voca_name }}</td>
                            <td>{{ $vocabulary->voca_mean }}</td>
                            <td>{{ $vocabulary->voca_spell }}</td>
                            <td>{{ isset($vocabulary->vocatype->type_vi) ? $vocabulary->vocatype->type_vi : '[N\A]' }}</td>
                            <td>
                                <img src="{{ pare_url_file($vocabulary->voca_image) }}" alt="" class="img img-responsive" style="width: 120px;">
                            </td>
                            <td>{{ $vocabulary->voca_example_en }}</td>
                            <td>{{ $vocabulary->voca_example_vi }}</td>
                            <td>{{ isset($vocabulary->categories->cate_name) ? $vocabulary->categories->cate_name : '[N\A]' }}</td>
                            <td>{{ isset($vocabulary->subcategories->subcate_name) ? $vocabulary->subcategories->subcate_name : '[N\A]' }}</td>
                            <td>
                                <a style="padding: 5px 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 12px;" href="{{ route('admin.get.edit.vocabulary',$vocabulary->id) }}"><i class="fas fa-edit"></i> Cập nhật</a>
                                <a style="padding: 5px 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 12px;" href="{{ route('admin.get.action.vocabulary',['delete', $vocabulary->id]) }}"><i class="fas fa-trash"></i> Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
