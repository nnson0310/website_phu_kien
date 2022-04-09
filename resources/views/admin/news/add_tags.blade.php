@extends('admin_layout')

@section('main_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Tạo tags mới
                </header>
                @if (Session::has('success'))
                    <div style="font-size: 30px" class="alert alert-info">{{ Session::get('success') }}</div>
                @endif
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" method="post" action="{{ route('create_tags') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="tags_name">Tên tags mới</label>
                                <input type="text" name="tags_name" class="form-control" id="tags_name">
                                @if ($errors->has('tags_name'))
                                <span class="text-primary"> {{ $errors->first('tags_name') }} </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="tags_status">Trạng thái tags</label>
                                <select name="tags_status" class="form-control input-sm m-bot15">
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
@endsection
