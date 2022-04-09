@extends('sidebar')

@section('main_content')

        <section id="cart_items">
            <div class="container">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                    <li><a href="{{ route('home_page') }}">Trang Chủ</a></li>
                    <li class="active">Giỏ Hàng</li>
                    </ol>
                </div>

                @if (Session::has('fail'))
                    <h3>{{ Session::get('fail') }}</h3>
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
                                                $images = json_decode($cart->options->image);
                                            @endphp
                                            @if (is_array($images) && !empty($images))
                                                <img width="60px" height="60px" src="{{ asset('public/backend/uploads/product/'.$images[0]) }}" alt="">
                                            @endif
                                        </td>
                                        <td class="cart_description">
                                            <h4>{{ $cart->name }}</h4>
                                        </td>
                                        <td class="cart_price">
                                            <p style="margin-top: 15px;">{{ Helper::formatPrice($cart->price) }} VNĐ</p>
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
                                            <p style="margin-top: 10px" class="cart_total_price">{{ number_format($cart->qty * $cart->price,0,",",".") }} VNĐ</p>
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

        <section id="do_action">
            <div class="container">
                <div class="row">        
                    <div class="col-sm-7">
                        <div class="total_area">
                            <ul>
                                <li>Tổng tiền: <span>{{ Cart::subtotal(0,",",".") }} VNĐ</span></li>
                                <li>Thuế: <span>{{ Cart::tax(0,",",".") }} VNĐ</span></li>
                                <li>Phí ship: <span>Miễn Phí</span></li>
                                <li>Thành Tiền: <span>{{ Cart::total(0,",",".") }} VNĐ</span></li>
                            </ul>
                                <a class="btn btn-default update" href="{{ route('delete_all_cart') }}">Xoá giỏ hàng</a>
                                <a class="btn btn-default check_out" href="{{ route('checkout_login') }}">Thanh Toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--/#do_action-->

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
