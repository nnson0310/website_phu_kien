@extends('layout')

@section('content')

    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Đăng Nhập</h2>
                        @if (Session::has('error'))
                            <div style="font-size: 20px" class="alert alert-info">{{ Session::get('error') }}</div>
                        @endif
                        <form action="{{ route('post_login') }}" method="POST">
                            {{ @csrf_field() }}
                            <input onfocus="this.value=''" name="username" type="text" placeholder="Tên Đăng Nhập" required />
                            <input onfocus="this.value=''" name="password" type="password" placeholder="Mật Khẩu" required />
                            <span>
                                <input type="checkbox" class="checkbox">Ghi Nhớ
                                <a id="new_account" href="{{ route('get_register') }}"> Chưa có tài khoản? Đăng ký ngay. </a>
                            </span>
                            <button type="submit" class="btn btn-default" value="login" name="login" >Đăng Nhập</button>
                        </form>  
                    </div><!--/login form-->
                    <div id="google-login">
                        <a href="{{ route('google.login') }}">
                            <i class="fa fa-google-plus-square" aria-hidden="true"></i> Đăng nhập bằng Google
                        </a>
                    </div>
                </div>
                <div class="col-sm-7">
                    <img id="login_banner" src="{{ asset('public/frontend/images/cart/login_banner.png') }}" >
                </div>
            </div>
        </div>
    </section><!--/form-->

@endsection