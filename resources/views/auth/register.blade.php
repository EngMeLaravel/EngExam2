@extends('layouts.app')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="/">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Đăng ký</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="customer-login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="customer-register my-account">
                        <form method="post" class="register" action="">
                            @csrf
                            <div class="form-fields">
                                <h2>Đăng ký</h2>
                                <p class="form-row form-row-wide">
                                    <label for="reg_email">Họ tên <span class="required">*</span></label>
                                    <input type="text" class="input-text" name="name" id="reg_email" value="">
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="reg_email">Email <span class="required">*</span></label>
                                    <input type="email" class="input-text" name="email" id="reg_email" value="">
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="reg_password">Password <span class="required">*</span></label>
                                    <input type="password" class="input-text" name="password" id="reg_password">
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="reg_password">Số điện thoại <span class="required">*</span></label>
                                    <input type="text" class="input-text" name="phone" id="reg_password">
                                </p>
                            </div>
                            <div class="form-action">
                                <div class="actions-log">
                                    <input type="submit" class="button" name="register" value="Đăng ký"">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
