@extends('admin_layout')

@section('main_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Sản Phẩm
                </header>
                @if (Session::has('success'))
                    <div style="font-size: 30px" class="alert alert-info">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('alert'))
                <div style="font-size: 30px" class="alert alert-info">{{ Session::get('alert') }}</div>
                @endif
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" method="post" action="{{ route('save_product') }}" enctype="multipart/form-data" >
                            {{ csrf_field() }}
                           {!! Session::get('message')  !!}
                            <div class="form-group">
                                <label for="product_name">Tên Sản Phẩm</label>
                                <input type="text" name="product_name" class="form-control" id="product_name">
                                @if ($errors->has('product_name'))
                                <span class="text-primary"> {{ $errors->first('product_name') }} </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="product_category">Danh Mục Sản Phẩm</label>                             
                                <select name="product_category" class="form-control input-sm m-bot15">
                                    @foreach($category as $key => $items)
                                    <option value="{{$items->cat_id}}">{{$items->cat_name}}</option>
                                    @endforeach
                                </select>                              
                            </div>
                            <div class="form-group">
                                <label for="product_brand">Thương Hiệu Sản Phẩm</label>
                                <select name="product_brand" class="form-control input-sm m-bot15">
                                    @foreach ($brand as $key => $items)
                                        <option value="{{$items->brand_id}}">{{$items->brand_name}}</option>
                                    @endforeach 
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_price">Giá Sản Phẩm</label>
                                <input type="text" name="product_price" class="form-control" id="product_price">
                                @if ($errors->has('product_price'))
                                <span class="text-primary"> {{ $errors->first('product_price') }} </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="product_quantity">Số Lượng Tồn Kho</label>
                                <input type="text" name="product_quantity" class="form-control" id="product_quantity">
                                @if ($errors->has('product_quantity'))
                                <span class="text-primary"> {{ $errors->first('product_quantity') }} </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="product_image">Ảnh Sản Phẩm</label>
                                <div class="upload-image">
                                    <img src="{{ asset('public/backend/images/product.png') }}" alt="">
                                    <input accept="image/*" type="file" name="product_image[]" class="form-control" id="product_image" multiple>
                                </div>
                                @if ($errors->has('product_image'))
                                <span class="text-primary"> {{ $errors->first('product_image') }} </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="product_video">Link Video Sản Phẩm (Nhúng)</label>
                                <input type="text" name="product_video" class="form-control" id="product_video">
                            </div>
                            <div class="form-group">
                                <label for="product_description">Mô Tả Sản Phẩm</label>
                                <textarea name="product_desc" id="ckeditor1" style="resize: none" rows="8" class="form-control" id="product_desc"></textarea>
                                @if ($errors->has('product_desc'))
                                <span class="text-primary"> {{ $errors->first('product_desc') }} </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="product_content">Nội Dung Sản Phẩm</label>
                                <textarea name="product_content" id="ckeditor2" style="resize: none" rows="8" class="form-control" id="product_content"></textarea>
                                @if ($errors->has('product_content'))
                                <span class="text-primary"> {{ $errors->first('product_content') }} </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="product_status">Trạng Thái Sản Phẩm</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>

                            <button name="submit" type="submit" class="btn btn-info">Thêm</button>
                        </form>
                    </div>

                </div>
            </section>
        </div>
    </div>
<script type="text/javascript">
        CKEDITOR.replace( 'ckeditor1' );
        CKEDITOR.replace( 'ckeditor2' );
</script>
@endsection
