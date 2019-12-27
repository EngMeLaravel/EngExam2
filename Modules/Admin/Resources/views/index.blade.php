@extends('admin::layouts.master')
@section('content')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <h1 class="page-header">Tổng quan</h1>
    <div class="row placeholders">
        <div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4 style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); margin-top: 0; color: whitesmoke; font-weight: bold">140 Thành viên</h4>
        </div>
        <div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4 style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); margin-top: 0; color: whitesmoke; font-weight: bold">100 Sản phẩm</h4>
        </div>
        <div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4 style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); margin-top: 0; color: whitesmoke; font-weight: bold">100 Bài viết</h4>
        </div>
        <div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4 style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); margin-top: 0; color: whitesmoke; font-weight: bold">30 Đánh giá</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
        <div class="col-sm-8">
            <h2>Danh sách đơn hàng mới</h2>
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
                </tr>
                </thead>
                <tbody>
                @if (isset($transactionNews))
                    @foreach ($transactionNews as $transaction)
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
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <h2 class="sub-header">Danh sách liên hệ mới nhất</h2>
            <div class="table-responsive">
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
                                    @if($contact->c_status == 1)
                                        <span class="label label-success">Đã xử lí</span>
                                    @else
                                        <span class="label label-default">Chưa xử lí</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-6">
            <h2 class="sub-header">Danh sách đánh giá mới nhất</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                <tr>
                    <th>#</th>
                    <th>Tên TV</th>
                    <th>Sản phẩm</th>
                    <th>Nội dung</th>
                    <th>Rating</th>
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
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
@endsection
