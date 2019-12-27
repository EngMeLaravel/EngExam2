@extends('admin::layouts.master')
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
        <li><a href="{{ route('admin.get.list.user') }}" title="danh mục">Thành viên</a></li>
        <li class="active">Danh sách</li>
    </ol>
</div>
<h2>Quản lí thành viên</h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
            <tr>
                <th>#</th>
                <th>Tên Thành Viên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($users))
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            <img src="{{ pare_url_file($user->avatar) }}" alt="" class="img img-responsive" style="width: 120px;height: 120px;">
                        </td>
                        <td>
{{--                             <a style="padding: 5px 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 12px;" href="{{ route('admin.get.edit.user',$user->id) }}"><i class="fas fa-edit"></i> Cập nhật</a>--}}
{{--                             <a style="padding: 5px 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 12px;" href="{{ route('admin.get.action.user',['delete', $user->id]) }}"><i class="fas fa-trash"></i> Xóa</a>--}}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection
