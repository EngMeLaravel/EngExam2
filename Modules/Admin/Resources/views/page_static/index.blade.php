@extends('admin::layouts.master')
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
        <li><a href="{{ route('admin.get.list.page_static') }}" title="Bài viết">Trang tĩnh</a></li>
        <li class="active">Bài viết</li>
    </ol>
</div>
<h2>Quản lí <a href="{{ route('admin.get.create.page_static') }}" class="pull-right"><i class="fas fa-plus-circle"></i></a></h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
            <tr>
                <th>#</th>
                <th>Tên trang</th>
                <th>Nội dung</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($pages))
                @foreach ($pages as $page)
                    <tr>
                        <td>{{ $page->id }}</td>
                        <td>{{ $page->ps_name }}</td>
                        <td>
                            {!! $page->ps_content !!}
                        </td>
                        <td>
                            <a style="padding: 5px 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 12px;" href="{{ route('admin.get.edit.page_static',$page->id) }}"><i class="fas fa-edit"></i> Cập nhật</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection
