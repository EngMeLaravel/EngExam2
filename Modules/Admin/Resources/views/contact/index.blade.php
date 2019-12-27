@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
            <li><a href="{{ route('admin.get.list.category') }}" title="danh mục">Liên hệ</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>
    <div class="table-responsive">
        <h2>Quản lí liên hệ</h2>
        <table class="table table-striped">
            <thead>
            <tr>
            <tr>
                <th>#</th>
                <th>Tiêu đề</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Nội dung</th>
                <th>Trạng Thái</th>
                <th>Thao Tác</th>
            </tr>
            </thead>
            <tbody>
            @if (isset($contacts))
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->c_title }}</td>
                        <td>{{ $contact->c_name }}</td>
                        <td>{{ $contact->c_email }}</td>
                        <td>{{ $contact->c_content }}</td>
                        <td>
                            <a href="{{ route('admin.action.contact',['status', $contact->id]) }}" class="label {{ $contact->getStatus($contact->c_status)['class'] }}">{{ $contact->getStatus($contact->c_status)['name'] }}</a>
                        </td>
                        <td>
                            <a class="btn_customer_action" href="{{ route('admin.action.contact',['delete', $contact->id]) }}"><i class="fas fa-trash"></i> Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
