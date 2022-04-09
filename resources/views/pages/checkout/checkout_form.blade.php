@extends('sidebar')

@section('main_content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                <li><a href="#">Trang Chủ</a></li>
                <li class="active">Thanh Toán</li>
                </ol>
            </div>

            <div class="register-req">
                <p>Xin hãy đăng nhập hoặc đăng ký để thanh toán và theo dõi lịch sử đơn hàng.</p>
            </div><!--/register-req-->

            @if (Session::has('empty_cart'))
                <h3>{{ Session::get('empty_cart') }}</h3>
            @endif

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Ảnh</td>
                            <td class="description">Tên Sản Phẩm</td>
                            <td class="price">Giá</td>
                            <td class="quantity">Số Lượng</td>
                            <td class="total">Tổng Tiền</td>
                            <td></td>
                        </tr>
                    </thead>
                    
                    <tbody>
                        {{-- Cart Content --}}
                        <?php
                            $cart_info = Cart::content();
                        ?>
                            @foreach ($cart_info as $cart)
                                <tr>                              
                                    <td class="cart_product">
                                        @php
                                            $images = json_decode($cart->options->image)
                                        @endphp
                                        @if(is_array($images) && !empty($images))
                                        <img width="60px" height="60px" src="{{ asset('public/backend/uploads/product/'.$images[0]) }}" alt="">
                                        @endif
                                    </td>
                                    <td class="cart_description">
                                        <h4>{{ $cart->name }}</h4>
                                    </td>
                                    <td class="cart_price">
                                        <p>{{ Helper::formatPrice($cart->price) }} VNĐ</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            <form method="POST" action="{{ route('update_cart') }}">
                                                {{{ @csrf_field() }}}
                                            <input value="-" id="minus" type="button" class="btn btn-primary cart_quantity_down">
                                            <input id="qty" class="cart_quantity_input" type="text" name="quantity" value="{{ $cart->qty }}" autocomplete=off size="2">
                                            <input value="+" id="plus" type="button" class="btn btn-primary cart_quantity_up">
                                            <input name="rowId" type="hidden" value="{{ $cart->rowId }}" >
                                            <button style="margin-left: 10px" type="submit" class="btn btn-success">
                                                <i class="fa fa-refresh" aria-hidden="true"></i>
                                            </button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">{{ number_format($cart->qty * $cart->price,0,",",".") }} VNĐ</p>
                                    </td>
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete" href="{{ route('delete_cart',['rowId' => $cart->rowId]) }}"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            @if (Session::has('message'))
                                <h3 class="text-center text-danger"><img width="280px" height="200px" style="padding-right: 20px" src="{{ asset('public/frontend/images/cart/empty_cart.jpg') }}" >{{ Session::get('message') }}</h3>
                            @endif
                        {{-- Cart Content --}}
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <div class="shopper-informations">
        <div class="row">
            <div class="col-sm-12 clearfix">
                <div class="bill-to">
                    <p> -- Điền thông tin nhận hàng -- </p>
                    <div class="form-one">
                        <form action="{{ route('add_orders') }}" method="POST">
                            {{ @csrf_field() }}
                            <input type="text" name="customer_name" placeholder="Tên người nhận hàng" value="{{ Session::get('username') }}" required >
                            <input type="text" name="email" placeholder="Địa chỉ email" required >
                            <input type="hidden" name="user_id" value="{{ Session::get('user_id') }}">
                            <input type="text" name="address" placeholder="Địa chỉ giao hàng" required >
                            <input type="text" name="phone" placeholder="Số điện thoại" required >
                            <div class="order-message">
                                <p> -- Ghi Chú Khi Giao Hàng -- </p>
                                <textarea required name="shipping_note" placeholder="Ghi chú giao hàng: hàng dễ vỡ, giao trong giờ hành chính" rows="10"></textarea>
                            </div>
                            <div class="payment-options">
                                <p> -- Chọn phương thức thanh toán -- </p>
                                <select id="payment-method" name="payment_method">
                                    <option selected disabled hidden value=""></option>
                                    <option value="1">Chuyển khoản qua ATM</option>
                                    <option value="2">Thanh toán khi nhận hàng</option>
                                    <option value="3">Thẻ VISA/MASTERCARD</option>
                                </select>
                            </div>
                            <input id="checkout_button" class="btn btn-primary btn-sm" type="submit" name="submit" value="Xác nhận thanh toán" >	
                        </form>
                    </div>
                </div>
            </div>	
        </div>
    </div>

    <script type="text/javascript">
        $("#minus").on('click', function(){
             var count = $("#qty").val();
             if(count > 1){
                 var data = --count;
                 $("#qty").val(data);
             }
        });

        $("#plus").on('click', function(){
             var count = $("#qty").val();
             var data = ++count;
             $("#qty").val(data);
        });
     </script>

@endsection
