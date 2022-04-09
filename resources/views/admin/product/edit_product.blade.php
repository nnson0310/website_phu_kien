@extends('admin_layout')

@section('main_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa Sản Phẩm
                </header>
                @if (Session::has('success'))
                    <div style="font-size: 30px" class="alert alert-info">{{ Session::get('success') }}</div>
                @endif
                <div class="panel-body">
                    @foreach ($all_product as $product)
                    <div class="position-center">                       
                        <form role="form" method="post" action={{ route('update_product', ['product_id' => $product->product_id, 'product_image' => $product->product_image]) }} enctype="multipart/form-data" >
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleProduct">Tên Sản Phẩm</label>
                                <input type="text" name="product_name" class="form-control" id="product_name" value="{{ $product->product_name }}" >
                                @if ($errors->has('product_name'))
                                <span class="text-primary"> {{ $errors->first('product_name') }} </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="product_category">Danh Mục Sản Phẩm</label>                             
                                <select name="product_category" class="form-control input-sm m-bot15">
                                    @foreach($all_category as $category)
                                    <option 
                                        <?php 
                                            if($product->cat_id == $category->cat_id){
                                                echo "selected";
                                            }
                                        ?> 
                                        value="{{$category->cat_id}}">
                                        {{$category->cat_name}}
                                    </option>
                                    @endforeach
                                </select>                              
                            </div>
                            <div class="form-group">
                                <label for="product_brand">Thương Hiệu Sản Phẩm</label>
                                <select name="product_brand" class="form-control input-sm m-bot15">
                                    @foreach ($all_brand as $brand)
                                        <option
                                            <?php 
                                            if($product->brand_id == $brand->brand_id){
                                                echo "selected";
                                            }
                                            ?> 
                                        value="{{$brand->brand_id}}">
                                        {{$brand->brand_name}}
                                        </option>
                                    @endforeach 
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleProduct">Giá Sản Phẩm</label>
                                <input type="text" name="product_price" class="form-control" id="product_price" value="{{$product->product_price}}">
                                @if ($errors->has('product_price'))
                                <span class="text-primary"> {{ $errors->first('product_price') }} </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="product_quantity">Số Lượng Tồn Kho</label>
                                <input type="text" name="product_quantity" class="form-control" id="product_quantity" value="{{$product->product_quantity}}">
                                @if ($errors->has('product_quantity'))
                                <span class="text-primary"> {{ $errors->first('product_quantity') }} </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleProduct">Ảnh Sản Phẩm</label>
                                <input accept="image/*" type="file" name="product_image" class="form-control" id="product_image">
                                @php
                                    $images = json_decode($product->product_image, true);
                                @endphp
                                @if (is_array($images) && !empty($images))
                                @foreach ($images as $image)
                                    <img style="width: 100px; height: 100px; margin-top: 10px; margin-right: 50px" src="{{ asset('public/backend/uploads/product/'.$image) }}" />
                                @endforeach        
                                @endif             
                                @if ($errors->has('product_image'))
                                <span class="text-primary"> {{ $errors->first('product_image') }} </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="product_video">Link Video Sản Phẩm (Nhúng)</label>
                                <input type="text" name="product_video" class="form-control" id="product_video" value="{{ $product->product_video }}">
                            </div>
                            <div class="form-group">
                                <label for="product_description">Mô Tả Sản Phẩm</label>
                                <textarea name="product_desc" id="ckeditor1" style="resize: none" rows="8" class="form-control" id="product_desc">{!! $product->product_desc !!}</textarea>
                                @if ($errors->has('product_desc'))
                                <span class="text-primary"> {{ $errors->first('product_desc') }} </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="product_content">Nội Dung Sản Phẩm</label>
                                <textarea name="product_content" id="ckeditor2" style="resize: none" rows="8" class="form-control" id="product_content">{!! $product->product_content !!}</textarea>
                                @if ($errors->has('product_content'))
                                <span class="text-primary"> {{ $errors->first('product_content') }} </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="product_status">Trạng Thái Sản Phẩm</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    <option <?php if($product->product_status == 0){ echo 'selected';} ?> value="0">Ẩn</option>
                                    <option <?php if($product->product_status == 1){ echo 'selected';} ?> value="1">Hiển thị</option>
                                </select>
                            </div>

                            <button name="submit" type="submit" class="btn btn-info">Cập nhật</button>
                        </form>

                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
<script type="text/javascript">
        CKEDITOR.replace( 'ckeditor1' );
        CKEDITOR.replace( 'ckeditor2' );
</script>
@endsection
