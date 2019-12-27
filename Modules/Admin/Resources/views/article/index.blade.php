@extends('admin::layouts.master')
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
        <li><a href="{{ route('admin.get.list.article') }}" title="Bài viết">Bài Viết</a></li>
        <li class="active">Bài viết</li>
    </ol>
</div>
<div class="row">
    <div class="col-sm-12">
        <form class="form-inline" action="">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Tên bài viết" value="{{ \Request::get('name') }}">
            </div>
            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
        </form>
    </div>
</div>
<h2>Quản lí bài Viết <a href="{{ route('admin.get.create.article') }}" class="pull-right"><i class="fas fa-plus-circle"></i></a></h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
            <tr>
                <th>#</th>
                <th style="width: 15%;">Tên bài viết</th>
                <th style="width: 15%;">Hình ảnh</th>
                <th style="width: 35%;">Mô tả</th>
                <th>Nổi bật</th>
                <th>Trạng Thái</th>
                <th>Ngày viết</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($articles))
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->a_name }}</td>
                        <td>
                            <img src="{{ pare_url_file($article->a_avatar) }}" alt="" class="img img-responsive" style="width: 100%;">
                        </td>
                        <td>{{ $article->a_description }}</td>
                        <td>
                            <a href="{{ route('admin.get.action.article',['hot', $article->id]) }}" class="label {{ $article->getHot($article->a_hot)['class'] }}">{{ $article->getHot($article->a_hot)['name'] }}</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.get.action.article',['active', $article->id]) }}" class="label {{ $article->getStatus($article->a_active)['class'] }}">{{ $article->getStatus($article->a_active)['name'] }}</a>
                        </td>
                        <td>
                            {{ $article->created_at }}
                        </td>
                        <td>
                            <a style="padding: 5px 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 12px;" href="{{ route('admin.get.edit.article',$article->id) }}"><i class="fas fa-edit"></i> Cập nhật</a>
                            <a style="padding: 5px 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 12px;" href="{{ route('admin.get.action.article',['delete', $article->id]) }}"><i class="fas fa-trash"></i> Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection
