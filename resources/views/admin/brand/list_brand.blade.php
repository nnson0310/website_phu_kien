@extends('admin_layout')

@section('main_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh Sách Thương Hiệu
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <form action="{{ route('list_brand') }}" method="POST">
                    {{ @csrf_field() }}
                    <select name="hint" class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Tên từ A-Z</option>
                        <option value="1">Mới nhất</option>
                    </select>
                    <button type="submit" class="btn btn-sm btn-default">Sắp xếp theo</button>
                    </form>
                </div>
                <div class="col-sm-4">
                    @if (Session::has('message'))
                        <h3 class="text-danger">{{ Session::get('message') }}</h3>
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
                            <th>Tên Thương Hiệu</th>
                            <th>Mô tả</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brand as $key => $items)
                            <tr>
                                <td><label class="i-checks m-b-none"><input class="checkbox" type="checkbox" name="post[]"><i></i></label></td>
                                <td>{{ $items->brand_name }}</td>
                                <td>{!! Helper::limitStr($items->brand_desc) !!}</td>
                                <td>
                                    <?php
                                        if($items->brand_status == 0){
                                    ?>
                                        <a href="{{ route('unhide_brand',['brand_id' => $items->brand_id]) }}"><span style="font-size: 25px; color: red" class="fa fa-thumbs-down"></span></a>
                                    <?php
                                        }
                                        else{
                                    ?>
                                        <a href="{{ route('hide_brand',['brand_id' => $items->brand_id]) }}"><span style="font-size: 25px; color: blue" class="fa fa-thumbs-up"></span></a>
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a href="{{ route('edit_brand', ['brand_id'=>$items->brand_id]) }}"><i class="fa fa-pencil-square-o text-success"></i></a>
                                    <a onClick="return confirm('Bạn có chắc chắn muốn xoá thương hiệu này?')" href="{{ route('delete_brand', ['brand_id'=>$items->brand_id]) }}"><i class="fa fa-trash text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-3 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">Hiển thị {{ $count }} trên tổng số {{ $count_all }} thương hiệu</small>
                    </div>
                    <div class="col-sm-5 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            {{ $brand->links() }}
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
