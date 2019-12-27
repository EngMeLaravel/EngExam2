@extends('admin::layouts.master')
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
        <li><a href="{{ route('admin.get.list.category') }}" title="danh mục">Danh mục</a></li>
        <li class="active">Danh mục</li>
    </ol>
</div>
<div class="table-responsive">
<h2>Quản lí danh mục <a href="{{ route('admin.get.create.category') }}" class="pull-right"><i class="fas fa-plus-circle"></i></a></h2>
    <table class="table table-striped">
        <thead>
            <tr>
            <tr>
                <th>#</th>
                <th>Tên danh mục</th>
                <th>Title Seo</th>
                <th>Trang chủ</th>
                <th>Trạng Thái</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($categories))
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->c_name }}</td>
                        <td>{{ $category->c_title_seo }}</td>
                        <td>
                            <a href="{{ route('admin.get.action.category',['home',$category->id]) }}" class="label {{ $category->getHome($category->c_home)['class'] }}">{{ $category->getHome($category->c_home)['name'] }}</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.get.action.category',['active',$category->id]) }}" class="label {{ $category->getStatus($category->c_active)['class'] }}">{{ $category->getStatus($category->c_active)['name'] }}</a>
                        </td>
                        <td>
                            <a style="padding: 5px 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 12px;" href="{{ route('admin.get.edit.category',$category->id) }}"><i class="fas fa-edit"></i> Cập nhật</a>
                            <a style="padding: 5px 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 12px;" href="{{ route('admin.get.action.category',['delete', $category->id]) }}"><i class="fas fa-trash"></i> Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection
