@extends('layouts.app')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="{{ route('home') }}">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Lấy lại mật khẩu</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-contact-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">

                        <div class="card-body">

                            <form method="POST" action="">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-12 col-form-label text-md-right">Vui lòng nhập địa chỉ email để lấy lại mật khẩu</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control" name="email" value="" required autocomplete="email" autofocus>

                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Xác nhận
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
