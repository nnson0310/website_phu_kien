@extends('admin_layout')

@section('main_content')

    <div style="background-color: #fff" class="row">
        <div class="col-lg-12">
            <div style="padding: 30px">
                <section class="content-header">
                    <h2>
                        Thông tin chi tiết đơn hàng #DH00{{ $orders->orders_id }}
                    </h2>
                </section>
                <section class="content">
                    <div style=" margin: -15px; ">                     
                        <section class="invoice">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h3 class="page-header">
                                        <i class="fa fa-globe"></i> Hóa đơn bán hàng
                                        <small class="pull-right">Ngày tạo hóa đơn này: {{ $date_time }}</small>
                                    </h3>
                                </div>                           
                            </div>                
                            <div class="row invoice-info">
                                <div class="col-sm-8 invoice-col">
                                    <table class="table table-bordred table-striped">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Người nhận</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Họ tên: </th>
                                                <td>{{ $orders->customer_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email: </th>
                                                <td>{{ $orders->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Số điện thoại: </th>
                                                <td>{{ $orders->phone }}</td>
                                            </tr>
                                            <tr>
                                                <th>Địa chỉ giao hàng: </th>
                                                <td>{{ $orders->address }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                              
                                <div class="col-sm-4 invoice-col">
                                    <table class="table table-bordred table-striped">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Hóa đơn số #DH00{{ $orders->orders_id }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Mã đơn hàng: </th>
                                                <td>#DH00{{ $orders->orders_id }}</td>
                                            </tr>
                                            <tr>
                                                <th>Ngày đặt: </th>
                                                <td>{{ Helper::getDate($orders->created_at) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tài khoản đặt hàng: </th>
                                                <td>{{ $user }}</td>
                                            </tr>
                                            <tr>
                                                <th>Trạng thái: </th>
                                                <td>
                                                    <span class="label label-info">
                                                        <?php
                                                            switch($orders->orders_status){
                                                                case 1:
                                                                    echo "Đang xử lí";
                                                                    break;
                                                                case 2:
                                                                    echo "Đang giao";
                                                                    break;
                                                                case 3:
                                                                    echo "Đã giao";
                                                                    break;
                                                                default:                                                              
                                                                    echo "Đã hủy";
                                                            }
                                                        ?>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                              
                            </div>
                             

                       
                            <div class="row">
                                <div class="col-xs-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Hình ảnh</th>
                                                <th>Sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Đơn giá</th>
                                                <th>Giảm giá</th>
                                                <th>Thành Tiền</th>
                                                <th>Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders->product as $key => $product)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    @php
                                                    $images = json_decode($product->product_image);
                                                    @endphp
                                                    @if (is_array($images) && !empty($images))
                                                    <img src="{{ asset('public/backend/uploads/product/'.$images[0]) }}" alt="" style=" width: 90px; height: auto; ">
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $product->product_name }}
                                                </td>
                                                <td>{{ $product->pivot->quantity }}</td>
                                                <td>{{ Helper::formatPrice($product->pivot->unit_price) }} VNĐ</td>
                                                <td>0%</td>
                                                <td>{{ Helper::formatPrice($product->pivot->quantity * $product->pivot->unit_price) }} VNĐ</td>
                                                <form action="{{ route('remove_product') }}" method="POST">
                                                {{ @csrf_field() }}
                                                <input name="product_id" type="hidden" value="{{ $product->pivot->product_id }}" >
                                                <input name="orders_id" type="hidden" value="{{ $product->pivot->orders_id }}" >
                                                <td><button type="submit" class="btn btn-danger btn-sm" onclick="confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng')" >Xóa</button></td>
                                                </form>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                               
                            </div>
                         

                            <div class="row">
                                
                                <div class="col-xs-6">
                                    <table class="table table-bordred table-striped">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th><span class="">Ghi chú giao hàng: </span></th>
                                                <td>{{ $orders->note }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <form action="{{ route('change_orders_status', ['orders_id' => $orders->orders_id]) }}" method="POST">
                                            {{ @csrf_field() }}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 10px" for="status">Trạng thái</label>
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="1" <?php if($orders->orders_status == 1){echo 'selected';} ?> > Đang chờ xử lý</option>
                                                        <option value="2" <?php if($orders->orders_status == 2){echo 'selected';} ?> > Đang giao</option>
                                                        <option value="3" <?php if($orders->orders_status == 3){echo 'selected';} ?> > Đã giao</option>
                                                        <option value="4" <?php if($orders->orders_status == 4){echo 'selected';} ?> > Đã hủy</option>
                                                    </select>
                                                    <small class="text-danger"></small>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label style="margin-top: 10px;" for="">&nbsp;</label> <br>
                                                    <button type="submit" class="btn btn-info">Cập nhật trạng thái</button>
                                                </div>                                          
                                            </div>
                                        </form>
                                    </div>
                                    <br />
                                    <img class="checkout_icon" src="{{ asset('/public/backend/images/icon/visa.png') }}" alt="Visa">
                                    <img class="checkout_icon" src="{{ asset('/public/backend/images/icon/mastercard.png') }}" alt="Mastercard">
                                    <img class="checkout_icon" src="{{ asset('/public/backend/images/icon/american express.png') }}" alt="American Express">
                                    <img class="checkout_icon" src="{{ asset('/public/backend/images/icon/paypal.png') }}" alt="Paypal">
                                </div>
                                <div class="col-xs-6">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>Tạm tính:</th>
                                                    <td> 
                                                        <?php 
                                                            $subtotal = explode(".", $orders->orders_subtotal);   
                                                            echo $subtotal[0];                                               
                                                        ?> VNĐ
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Thuế:</th>
                                                    <td>
                                                        <?php 
                                                            $taxes = explode(".", $orders->taxes);   
                                                            echo $taxes[0];                                               
                                                        ?> VNĐ
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Phí vận chuyển:</th>
                                                    <td>Miễn phí</td>
                                                </tr>
                                                <tr>
                                                    <th>Thành tiền:</th>
                                                    <th> 
                                                        <?php 
                                                            $total = explode(".", $orders->orders_total);
                                                            echo $total[0];
                                                        ?> VNĐ
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            
                            </div>
                            

                            
                            <div class="row no-print">
                                <div class="col-xs-12">
                                    <br>
                                    <a href="" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> In đơn hàng</a>
                                    &nbsp;
                                    <a href="" target="_blank" class="btn btn-default" style="margin-left: 5px;">
                                        <i class="fa fa-download"></i> Xuất hóa đơn
                                    </a>
                                    <a href="{{ route('show_all_orders') }}" class="btn btn-primary pull-right" style="margin-right: 5px;">
                                        Trở về
                                    </a>
                                    <a href="#"
                                        class="btn btn-warning pull-right" style="margin-right: 5px;">
                                        Sửa đơn hàng này
                                    </a>
                                </div>
                            </div>
                        </section>
                        
                        <div class="clearfix"></div>
                    </div>

                </section>
                
            </div>
             
        </div>
    </div>
    <!-- <script type="text/javascript">
        $(document).ready(function(){
            $('.deleteRecord').on('click', function(e){
                e.preventDefault();
                var product_id = $(this).data("id");
                var token = $(this).data("token");

                $.ajax({
                    url: "remove_product/" + product_id,
                    type: 'GET',
                    dataType: "JSON",
                    data: {
                        "product_id": product_id,
                        "_token": token,
                        "_method": 'GET'
                    },
                    success: function(){
                        console.log('Delete Successfully');
                    }
                });

            });
        });
    </script> -->

@endsection
