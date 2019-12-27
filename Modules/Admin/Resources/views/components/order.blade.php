@if($orders)
    <table class="table">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($orders))
            <? $i = 1; ?>
            @foreach($orders as $key => $order)
                <tr>
                    <td>{{ $i }}</td>
                    <td><a href="{{ route('get.detail.product',[str_slug($order->product->pro_name), $order->or_product_id]) }}" target="_blank">{{ isset($order->product->pro_name) ? $order->product->pro_name : '' }}</a></td>
                    <td>
                        <img src="{{ isset($order->product->pro_avatar) ? pare_url_file($order->product->pro_avatar) : '' }}" alt="" style="width: 120px;">
                    </td>
                    <td>{{ number_format($order->or_price,0,',','.') }} ₫</td>
                    <td>{{ $order->or_qty }}</td>
                    <td>{{ number_format($order->or_qty * $order->or_price,0,',','.') }} ₫</td>
                    <td>
                        <a href=""><i class="fa fa-trash"></i> Delete</a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endif
