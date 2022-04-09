@extends('admin_layout')

@section('main_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Thương Hiệu
                </header>
                @if (Session::has('success'))
                    <div style="font-size: 30px" class="alert alert-info">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('alert'))
                    <div style="font-size: 30px" class="alert alert-info">{{ Session::get('alert') }}</div>
                @endif
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" method="post" action={{ route('save_brand') }}>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleBrand">Tên Thương Hiệu</label>
                                <input type="text" name="brand_name" class="form-control" id="brand_name">
                                @if ($errors->has('brand_name'))
                                <span class="text-primary"> {{ $errors->first('brand_name') }} </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="brand_description">Mô Tả Thương Hiệu</label>
                                <textarea name="brand_desc" id="ckeditor" style="resize: none" rows="8" class="form-control" id="brand_desc"></textarea>
                                @if ($errors->has('brand_desc'))
                                <span class="text-primary"> {{ $errors->first('brand_desc') }} </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="brand_status">Trạng Thái Thương Hiệu</label>
                                <select name="brand_status" class="form-control input-sm m-bot15">
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
        CKEDITOR.replace( 'ckeditor' );
</script>
@endsection
