@extends('admin_layout')

@section('main_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa Danh Mục Sản Phẩm
                </header>
                @if (Session::has('success'))
                    <div style="font-size: 30px" class="alert alert-info">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('alert'))
                    <div style="font-size: 30px" class="alert alert-info">{{ Session::get('alert') }}</div>
                @endif
                <div class="panel-body">
                    @foreach ($all_category as $items)
                    <div class="position-center">                       
                        <form role="form" method="post" action={{ route('update_category', ['cat_id' => $items->cat_id]) }}>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleCategory">Tên Danh Mục</label>
                                <input type="text" name="cat_name" class="form-control" id="category_name" value="{{ $items->cat_name }}" >
                                @if ($errors->has('cat_name'))
                                <span class="text-primary"> {{ $errors->first('cat_name') }} </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="category_description">Mô Tả Danh Mục</label>
                                <textarea name="cat_desc" id="ckeditor" style="resize: none" rows="8" class="form-control" id="category_desc">{!! $items->cat_desc !!}</textarea>
                                @if ($errors->has('cat_desc'))
                                <span class="text-primary"> {{ $errors->first('cat_desc') }} </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="category_status">Trạng Thái Danh Mục</label>
                                <select name="cat_status" class="form-control input-sm m-bot15">
                                    <option <?php if($items->cat_status == 0){ echo 'selected';} ?> value="0">Ẩn</option>
                                    <option <?php if($items->cat_status == 1){ echo 'selected';} ?> value="1">Hiển thị</option>
                                </select>
                            </div>

                            <button name="submit" type="submit" class="btn btn-info">Cập Nhật</button>
                        </form>

                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
<script type="text/javascript">
        CKEDITOR.replace( 'ckeditor' );
</script>
@endsection
