@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
            <li><a href="{{ route('admin.get.list.user') }}" title="danh mục">Đánh giá</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>
    <h2>Quản lí đánh giá</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
            <tr>
                <th>#</th>
                <th>Tên Thành Viên</th>
                <th>Sản phẩm</th>
                <th>Nội dung</th>
                <th>Rating</th>
                <th>Thao Tác</th>
            </tr>
            </thead>
            <tbody>
            @if (isset($ratings))
                @foreach ($ratings as $rating)
                    <tr>
                        <td>{{ $rating->id }}</td>
                        <td>{{ isset($rating->user->name) ? $rating->user->name : '[N\A]'}}</td>
                        <td><a href="">{{ isset($rating->product->pro_name) ? $rating->product->pro_name : '[N\A]'}}</a></td>
                        <td>{{ $rating->ra_content }}</td>
                        <td>{{ $rating->ra_number }}</td>
                        <td>
                             <a style="padding: 5px 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 12px;" href=""><i class="fas fa-trash"></i> Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
