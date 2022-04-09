@extends('admin_layout')

@section('main_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh Sách Sản Phẩm
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <form action="{{ route('list_product') }}" method="POST">
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
                            <th>Tên Sản Phẩm</th>
                            <th>Giá</th>
                            <th>Tồn Kho</th>
                            <th>Ảnh Sản Phẩm</th>
                            <th>Video sản phẩm</th>
                            <th>Danh Mục</th>
                            <th>Thương Hiệu</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $items)
                            <tr>
                                <td><label class="i-checks m-b-none"><input class="checkbox" type="checkbox" name="post[]"><i></i></label></td>
                                <td>{{ $items->product_name }}</td>
                                <td>{{ Helper::formatPrice($items->product_price) }} VNĐ</td>
                                <td>{{ $items->product_quantity }}</td>
                                @php
                                    $images = json_decode($items->product_image, true);
                                @endphp
                                @if(is_array($images) && !empty($images))
                                {{-- @foreach ($images as $image) --}}
                                    <td><img width="60px" height="60px" src="{{ asset('public/backend/uploads/thumbnails/'.$images[0]) }}" /></td>
                                {{-- @endforeach --}}
                                @endif
                                <td>{!! $items->video_html !!}</td>
                                <td>{{ $items->category->cat_name }}</td>
                                <td>{{ $items->brand->brand_name }}</td>
                                <td>
                                    <?php
                                        if($items->product_status == 0){
                                    ?>
                                        <a href="{{ route('unhide_product',['product_id' => $items->product_id]) }}"><span style="font-size: 25px; color: red" class="fa fa-thumbs-down"></span></a>
                                    <?php
                                        }
                                        else{
                                    ?>
                                        <a href="{{ route('hide_product',['product_id' => $items->product_id]) }}"><span style="font-size: 25px; color: blue" class="fa fa-thumbs-up"></span></a>
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a href="{{ route('edit_product', ['product_id'=>$items->product_id]) }}"><i class="fa fa-pencil-square-o text-success"></i></a>
                                    <a onClick="return confirm('Bạn có chắc chắn muốn xoá sản phẩm này?')" href="{{ route('delete_product', ['product_id' => $items->product_id, 'product_image' => $items->product_image ]) }}"><i class="fa fa-trash text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-3 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">Hiển thị {{ $count }} trên tổng số {{ $count_all }} sản phẩm</small>
                    </div>
                    <div class="col-sm-5 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            {{ $product->links() }}
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

    <script>
        $(document).ready(function(){
            $("#selectAll").on("change", function(){
                $(".checkbox").prop("checked", $(this).prop("checked"));
            });

            $(".checkbox").on("change", function(){
                if($(this).prop("checked") == false){
                    $("#selectAll").prop("checked", false);
                }

                if($(".checkbox:checked").length == $(".checkbox").length){
                    $("#selectAll").prop("checked", true);
                }
            })
        });
    </script>

@endsection
