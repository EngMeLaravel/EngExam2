@extends('admin::layouts.master')
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
    <li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
    <li><a href="{{ route('admin.get.list.sub_category') }}" title="danh mục">Danh mục con</a></li>
        <li class="active">Thêm mới</li>
    </ol>
</div>
<div class="">
    @include('admin::sub_category.form')
</div>
@endsection
