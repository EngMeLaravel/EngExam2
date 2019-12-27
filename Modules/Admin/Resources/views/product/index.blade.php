@extends('admin::layouts.master')
@section('content')
    <style>
        .rating .active {color: #ff9705!important;}
    </style>
<div class="page-header">
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
        <li><a href="{{ route('admin.get.list.product') }}" title="danh mục">Sản Phẩm</a></li>
        <li class="active">Sản Phẩm</li>
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
                            <option value="{{ $category->id }}" {{ \Request::get('cate') == $category->id ? "selected='selected'" : '' }} >{{ $category->c_name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
        </form>
    </div>
</div>
<h2>Quản lí sản phẩm <a href="{{ route('admin.get.create.product') }}" class="pull-right"><i class="fas fa-plus-circle"></i></a></h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
            <tr>
                <th>#</th>
                <th>Tên sản phẩm</th>
                <th>Loại sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Trạng Thái</th>
                <th>Nổi bật</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($products))
                @foreach ($products as $product)
                    <?
                    $average = 0;

                    if ($product->pro_total_rating)
                    {
                        $average = round($product->pro_total_number / $product->pro_total_rating, 2);
                    }

                    ?>
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            {{ $product->pro_name }}
                            <ul class="list-unstyled">
                                <li><span><i class="fas fa-dollar-sign"></i></span><span> {{ number_format($product->pro_price) }} VND</span></li>
                                <li><span><i class="fas fa-dollar-sign"></i></span><span> {{ $product->pro_sale }}%</span></li>
                                <li><span>Đánh giá: </span>
                                    <span class="rating">
                                        @for($i=1; $i<=5; $i++)
                                            <i class="fa fa-star {{ $i <= $average ? 'active' : '' }}" style="color: #999;"></i>
                                        @endfor
                                    </span>
                                    <span>{{ $average }}</span>
                                </li>
                                <li><span>Số lượng: {{ $product->pro_number }}</span></li>
                            </ul>
                        </td>
                        <td>{{ isset($product->category->c_name) ? $product->category->c_name : '[N\A]' }}</td>
                        <td>
                            <img src="{{ pare_url_file($product->pro_avatar) }}" alt="" class="img img-responsive" style="width: 120px;height: 120px;">
                        </td>
                        <td>
                            <a href="{{ route('admin.get.action.product',['active', $product->id]) }}" class="label {{ $product->getStatus($product->pro_active)['class'] }}">{{ $product->getStatus($product->c_active)['name'] }}</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.get.action.product',['hot', $product->id]) }}" class="label {{ $product->getHot($product->pro_hot)['class'] }}">{{ $product->getHot($product->c_active)['name'] }}</a>
                        </td>
                        <td>
                            <a style="padding: 5px 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 12px;" href="{{ route('admin.get.edit.product',$product->id) }}"><i class="fas fa-edit"></i> Cập nhật</a>
                            <a style="padding: 5px 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 12px;" href="{{ route('admin.get.action.product',['delete', $product->id]) }}"><i class="fas fa-trash"></i> Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection
