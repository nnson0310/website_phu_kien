@extends('admin_layout')

@section('main_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh Sách Đơn Hàng
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Tên từ A-Z</option>
                        <option value="1">Mới nhất</option>
                    </select>
                    <button class="btn btn-sm btn-default">Sắp xếp theo</button>
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button">Tìm kiếm</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input id="selectAll" type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>Mã đơn hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Tổng tiền</th>
                            <th>Ngày đặt</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($count_all == 0)
                            <script type="text/javascript">alert('Không có đơn hàng nào để hiển thị')</script>
                        @else
                        @foreach ($all_orders as $key => $items)
                            <tr>
                                <td><label class="i-checks m-b-none"><input class="checkbox" type="checkbox" name="post[]"><i></i></label></td>
                                <td><a href="{{ route('show_details', ['orders_id' => $items->orders_id]) }}">#DH00{{ $items->orders_id }}</a></td>
                                <td>{{ $items->customer_name }}</td>
                                <td>{{ $items->address }}</td>
                                <td>{{ $items->phone }}</td>
                                <td>
                                    <?php 
                                        $total_price = $items->orders_total;
                                        $price = explode(".", $total_price);
                                        echo $price[0];
                                    ?> VNĐ
                                </td>
                                <td>{{ Helper::getDate($items->created_at) }}</td>
                                <td>
                                    <?php
                                        switch($items->orders_status){
                                            case 1:
                                                echo '<p class="text-primary">Đang chờ xử lý</p>';
                                                break;
                                            case 2:
                                                echo '<p class="text-warning">Đang giao</p>';
                                                break;
                                            case 3:
                                                echo '<p class="text-success">Đã giao</p>';
                                                break;
                                            default:
                                                echo '<p class="text-danger">Đã hủy</p>';
                                        }
                                    ?>
                                </td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-3 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">Hiển thị {{ $count }} trên tổng số {{ $count_all }} đơn hàng</small>
                    </div>
                    <div class="col-sm-5 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            {{ $all_orders->links() }}
                        </ul>
                    </div>
                    <div class="col-sm-4 text-center">
                        <span style="font-size: 20px; color: red; padding-right: 20px" class="fa fa-thumbs-down">Ẩn</span>
                        <span style="font-size: 20px; color: blue" class="fa fa-thumbs-up">Hiển thị</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script type="text/javascript">
        
        //on click "Select All", set all checkbox "checked"
        $(document).ready(function(){
            $("#selectAll").on('change', function(){
                $(".checkbox").prop("checked", $(this).prop("checked"));
            });

        //if one checkbox is not checked, disable "Select All" 
            $(".checkbox").on('change', function(){
                if($(this).prop("checked") == false){
                    $("#selectAll").prop("checked", false);
                }

                //if all checkbox are checked, make "Select All" become available
                if($(".checkbox:checked").length == $(".checkbox").length){
                    $("#selectAll").prop("checked", true);
                }
            });
        });
    </script>

@endsection
