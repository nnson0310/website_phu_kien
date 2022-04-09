@extends('admin_layout')

@section('main_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh Sách Khách Hàng
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <form action="#" method="POST">
                    {{ @csrf_field() }}
                    <select name="hint" class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Tên từ A-Z</option>
                        <option value="1">Mới nhất</option>
                    </select>
                    <button type="submit" class="btn btn-sm btn-default">Sắp xếp theo</button>
                    </form>
                </div>
                <div class="col-sm-4">
                    @if (Session::has('success'))
                        <h3 class="text-danger">{{ Session::get('success') }}</h3>
                    @endif
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
                            <th>STT</th>
                            <th>Tên khách hàng</th>
                            <th>Avatar</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Tổng số đơn hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $key => $items)
                            <tr>
                                <td><label class="i-checks m-b-none"><input class="checkbox" type="checkbox" name="post[]"><i></i></label></td>
                                <td>{{ $items->user_id }}</td>
                                <td>{{ $items->username }}</td>
                                <td>
                                    <?php
                                        if($items->avatar){
                                    ?>
                                    <img width="60px" height="60px" src="{{ asset('public/frontend/images/user/'.$items->avatar) }}" /></td>
                                    <?php
                                        }
                                        else{
                                    ?>
                                    <img width="60px" height="60px" src="{{ asset('public/frontend/images/user/no-image.png') }}" /></td>
                                    <?php

                                        }
                                    ?>
                                </td>
                                <td>{{ $items->phone }}</td>
                                <td>{{ $items->email }}</td>
                                <td>
                                    <?php
                                        if(!$all_orders){
                                            $count = 0;
                                        }
                                        else{
                                            $count = 0;
                                            foreach ($all_orders as $order) {
                                                if($items->user_id == $order->user_id){
                                                    $count += 1;
                                                }
                                            }
                                        }
                                        if($count == 0){
                                            echo "Không có đơn hàng nào";
                                        }
                                        else{
                                            echo $count;
                                        }
                                    ?>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-3 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">Hiển thị {{ $customers->count() }} trên tổng số {{ $all_customers->count() }} tin tức</small>
                    </div>
                    <div class="col-sm-5 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            {{ $customers->links() }}
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

    <script type="text/javascript">
        function deleteNews(id){
            $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if(confirm('Bạn có chắc chắn muốn xóa tin tức này?')){
                $.ajax({
                    type:'DELETE',
                    url:'delete/'+id,
                    success:function(response){
                        alert(response.success);
                        $('#news_'+id).remove();
                    },
                    error:function(response){
                        console.log('AJAX failed!');
                    }
                })
            }
        }
    </script>
@endsection
