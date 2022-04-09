@extends('admin_layout')

@section('main_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh Sách Danh Mục
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <form action="{{ route('list_category') }}" method="POST" >
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
                                    <input name="selectAll" id="selectAll" type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>Tên Danh Mục</th>
                            <th>Mô tả</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $key => $items)
                            <tr>
                                <td><label class="i-checks m-b-none"><input value="{{ $items->cat_id }}" class="checkbox" type="checkbox" name="cat_id[]"><i></i></label></td>
                                <td>{{$items->cat_name}}</td>
                                <td>{!!$items->cat_desc!!}</td>
                                <td>
                                    <?php
                                        if($items->cat_status == 0){
                                    ?>
                                        <a href="{{ route('unhide_category',['cat_id' => $items->cat_id]) }}"><span style="font-size: 25px; color: red" class="fa fa-thumbs-down"></span></a>
                                    <?php
                                        }
                                        else{
                                    ?>
                                        <a href="{{ route('hide_category',['cat_id' => $items->cat_id]) }}"><span style="font-size: 25px; color: blue" class="fa fa-thumbs-up"></span></a>
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a href="{{ route('edit_category', ['cat_id'=>$items->cat_id]) }}"><i class="fa fa-pencil-square-o text-success"></i></a>
                                    <a onClick="return confirm('Bạn có chắc chắn muốn xoá danh mục này?')" href="{{ route('delete_category', ['cat_id'=>$items->cat_id]) }}"><i class="fa fa-trash text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-3 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">Hiển thị {{ $count }} trên tổng số {{ $count_all }} danh mục</small>
                    </div>
                    <div class="col-sm-5 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            {{ $category->links() }}
                        </ul>
                    </div>
                    <div class="col-sm-4 text-center">
                        <a href="javascript:void(0)" onClick="hideAll()"><span style="font-size: 20px; color: red; padding-right: 20px" class="fa fa-thumbs-down">Ẩn</span></a>
                        <a href="#"><span style="font-size: 20px; color: blue" class="fa fa-thumbs-up">Hiển thị</span></a>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script type="text/javascript">
       function hideAll(){
           if(confirm("Bạn có chắc chắn muốn ẩn toàn bộ danh mục ở trang này không?")){
                   var cat_id = [];
                   $(".checkbox:checked").each(function(){
                        cat_id.push($(this).val());
                   });

                   var requestData = JSON.stringify(cat_id);

                   //call ajax
                   $.ajax({
                       url: 'hide_all',
                       type: 'GET',
                       data: requestData,
                       dataType: 'json',
                       cache: false,
                       success: function(res){ 
                           alert(res.success);
                       },
                       error: function(res){
                           console.log("AJAX Failed!!!");
                       }
                   });

           }
        }
    </script>

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
