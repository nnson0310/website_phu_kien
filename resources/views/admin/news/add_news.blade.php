@extends('admin_layout')

@section('main_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Tạo bài viết mới
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        @if (Session::has('success'))
                            <h3 style="margin: 10px 0px; text-align: center" class="text-danger">{{ Session::get('success') }}</h3>
                        @endif
                        <form role="form" method="post" action="{{ route('store_news') }}" enctype="multipart/form-data" >
                            {{ csrf_field() }}
                           {!! Session::get('message')  !!}
                            <div class="form-group">
                                <label for="title">Tiêu đề bài viết</label>
                                <input type="text" name="title" class="form-control" id="title">
                                @if ($errors->has('title'))
                                <span class="text-primary"> {{ $errors->first('title') }} </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="images">Ảnh đại diện</label>
                                <div class="upload-image">
                                    <img src="{{ asset('public/backend/images/news.png') }}" alt="">
                                    <input accept="image/*" type="file" name="images" class="form-control">
                                </div>
                                {{-- @if ($errors->has('images'))
                                <span class="text-primary"> {{ $errors->first('images') }} </span>
                                @endif --}}
                                @if (Session::has('alert'))
                                <span class="text-primary"> {{ Session::get('alert') }} </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label style="margin-bottom: 10px;" for="tags">Tags</label> <br>
                                @foreach ($tags as $tag)
                                    @if ($tag->status == 1)
                                        <div class="pretty p-default p-curve">
                                            <input type="checkbox" name="tags_id[]" value="{{ $tag->id }}" />
                                            <div class="state">
                                                <label>{{ $tag->name }}</label>
                                            </div>
                                        </div>      
                                    @endif
                                @endforeach
                            </div>
                            @if ($errors->has('tags_id'))
                                <span class="text-primary"> {{ $errors->first('tags_id') }} </span>
                            @endif
                            <div style="margin-top: 10px" class="form-group">
                                <label for="content">Nội dung bài viết</label>
                                <textarea name="content" id="ckeditor1" style="resize: none" rows="8" class="form-control" id="content"></textarea>
                                @if ($errors->has('content'))
                                <span class="text-primary"> {{ $errors->first('content') }} </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái bài viết</label>
                                <select name="status" class="form-control input-sm m-bot15">
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
    $(document).ready(function(){
        CKEDITOR.replace('ckeditor1',{
            filebrowserUploadUrl: "{{ route('upload_photo', ['_token' => csrf_token() ]) }}",
            filebrowserUploadMethod: 'form',
        });
    });  
</script>
@endsection
