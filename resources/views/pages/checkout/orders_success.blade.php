@extends('sidebar')

@section('main_content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                <li><a href="{{ route('home_page') }}">Trang Chủ</a></li>
                <li class="active">Đặt hàng</li>
                </ol>
            </div>
            <div id="orders_success">
                <img src="{{ asset('public/frontend/images/cart/cart_empty.png') }}" alt="cart_empty" />
                <h3>Đặt hàng thành công. Đơn hàng của bạn đang được xử lý.</h3>
                <button onclick="location.href='http://localhost/shopbanhang/'" class="btn btn-sm"> Tiếp tục mua sắm </button>
            </div>
    </section> <!--/#cart_items-->

@endsection