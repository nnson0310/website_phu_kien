@extends('layout')

@section('content')

    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>Đăng Ký</h2>
                        <form action="{{ route('post_register') }}" method="POST">
                            {{ @csrf_field() }}
                            @if ($errors->has('username'))
                                <h5 class="text-danger">{{$errors->first('username')}}</h5>
                            @endif
                            <input onfocus="this.value=''" type="text" name="username" placeholder="Tên Đăng Nhập"/>
                            @if ($errors->has('email'))
                                <h5 class="text-danger">{{$errors->first('email')}}</h5>
                            @endif
                            <input onfocus="this.value=''" type="email" name="email" placeholder="Địa Chỉ Email"/>
                            @if ($errors->has('password'))
                                <h5 class="text-danger">{{$errors->first('password')}}</h5>
                            @endif
                            <input onfocus="this.value=''" type="password" name="password" placeholder="Mật Khẩu"/>
                            @if ($errors->has('phone'))
                                <h5 class="text-danger">{{$errors->first('phone')}}</h5>
                            @endif
                            <input onfocus="this.value=''" type="text" name="phone" placeholder="Số Điện Thoại" />
                            <button type="submit" class="btn btn-default" name="register" value="register" >Đăng Ký</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
                <div class="col-sm-7">
                    <img id="login_banner" src="{{ asset('public/frontend/images/cart/login_banner.png') }}" >
                </div>
            </div>
        </div>
    </section><!--/form-->

@endsection