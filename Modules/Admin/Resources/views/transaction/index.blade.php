@extends('admin::layouts.master')
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
        <li><a href="{{ route('admin.get.list.category') }}" title="danh mục">Đơn hàng</a></li>
        <li class="active">Danh sách</li>
    </ol>
</div>
<h2>Quản lí đơn hàng</h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
            <tr>
                <th>#</th>
                <th>Tên KH</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Tổng tiền</th>
                <th>Trạng Thái</th>
                <th>Time</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($transactions))
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>#{{ $transaction->id }}</td>
                        <td>{{ isset($transaction->user->name) ?  $transaction->user->name : 'N\A'}}</td>
                        <td>{{ $transaction->tr_address }}</td>
                        <td>{{ $transaction->tr_phone }}</td>
                        <td>{{ number_format($transaction->tr_total,0,',','.') }} ₫</td>
                        <td>
                            <a href="{{ route('admin.get.action.transaction',['status', $transaction->id]) }}" class="label {{ $transaction->getStatus($transaction->tr_status)['class'] }}">{{ $transaction->getStatus($transaction->tr_status)['name'] }}</a>
                        </td>
                        <td>
                            {{ $transaction->created_at }}
                        </td>
                        <td>
                            <a class="btn_customer_action" style="padding: 5px 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 12px;" href="{{ route('admin.get.action.transaction',['delete', $transaction->id]) }}"><i class="fas fa-trash"></i> Xóa</a>
                            <a class="btn_customer_action js_order_item" data-id="{{ $transaction->id }}" style="padding: 5px 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 12px;" href="{{ route('admin.get.view.order',[$transaction->id]) }}"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
<div class="modal fade" id="myModalOrder" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Chi tiết mã đơn hàng #<strong class="transaction_id"></strong></h4>
            </div>
            <div class="modal-body" id="md-content">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(function(){
            $(".js_order_item").click(function(event){
                event.preventDefault();
                let $this = $(this);
                let url = $this.attr('href');
                $("#md-content").html('');
                $('.transaction_id').text('').text($this.attr('data-id'));

                $("#myModalOrder").modal('show');

                $.ajax({
                    url: url,
                }).done(function(result){
                    console.log(result);
                    if(result)
                    {
                        $("#md-content").append(result);
                    }
                });
            });
        })
    </script>
@endsection
