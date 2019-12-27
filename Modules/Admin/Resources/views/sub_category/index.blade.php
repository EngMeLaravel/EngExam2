@extends('admin::layouts.master')
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
        <li><a href="{{ route('admin.get.list.sub_category') }}" title="danh mục">Danh mục con</a></li>
        <li class="active">Danh mục</li>
    </ol>
</div>
<div class="row">
    <div class="col-sm-12">
        <form class="form-inline" action="">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm" value="{{ \Request::get('name') }}">
            </div>
            <div class="form-group">
                <select name="cate" id="" class="form-control">
                    <option value="">Danh mục</option>
                    @if ($categories)
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ \Request::get('cate') == $category->id ? "selected='selected'" : '' }} >{{ $category->cate_name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
        </form>
    </div>
</div>
<h2>Quản lí danh mục con <a href="{{ route('admin.get.create.sub_category') }}" class="pull-right"><i class="fas fa-plus-circle"></i></a></h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
            <tr>
                <th>#</th>
                <th>Tên danh mục con</th>
                <th>Tên danh mục cha</th>
                <th>Avatar</th>
                <th>Trạng Thái</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($sub_categories))
                @foreach ($sub_categories as $sub_category)
                    <tr>
                        <td>{{ $sub_category->id }}</td>
                        <td>{{ $sub_category->subcate_name }}</td>
                        <td>{{ $sub_category->cate_id }}</td>
                        <td>
                            <img src="{{ pare_url_file($sub_category->subcate_avatar) }}" alt="" class="img img-responsive" style="width: 120px;height: 120px;">
                        </td>
                        <td>
                            <a href="{{ route('admin.get.action.sub_category',['active',$sub_category->id]) }}" class="label {{ $sub_category->getStatus($sub_category->subcate_active)['class'] }}">{{ $sub_category->getStatus($sub_category->subcate_active)['name'] }}</a>
                        </td>
                        <td>
                            <a style="padding: 5px 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 12px;" href="{{ route('admin.get.edit.sub_category',$sub_category->id) }}"><i class="fas fa-edit"></i> Cập nhật</a>
                            <a style="padding: 5px 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 12px;" href="{{ route('admin.get.action.sub_category',['delete', $sub_category->id]) }}"><i class="fas fa-trash"></i> Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection
