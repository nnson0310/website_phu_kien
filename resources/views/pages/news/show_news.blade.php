@extends('layout')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Bài viết gần đây</h2>
                    <div class="panel-group category-products" id="accordian"><!--recent news-->
                        <div class="panel panel-default">
                            @foreach ($recent_news as $items)
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            {{ $items->title }}
                                        </a>
                                    </h4>
                                </div>
                            @endforeach  
                        </div>                                         
                    </div><!--/recent news-->
                
                    <div class="brands_products"><!--tags-->
                        <h2>Tags</h2>
                        @foreach ($recent_tags as $items)
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href=""> <span class="pull-right"><i class="fa fa-eye"></i></span>{{ $items->name }}</a></li>
                                </ul>
                            </div>
                        @endforeach
                    </div><!--/tags-->
                    
                </div>
            </div>
            <div class="col-sm-9">
                <div class="blog-post-area">
                    <h2 class="title text-center">Tin mới nhất</h2>

                    {{-- List News --}}
                    @foreach ($news as $items)
                    <div style="border-bottom: 1px solid #ebebeb; padding-bottom: 20px;" class="single-blog-post">
                        <h3>{{ $items->title }}</h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-user"></i> Admin</li>
                                <li><i class="fa fa-clock-o"></i>{{ Helper::getTime($items->created_at) }}</li>
                                <li><i class="fa fa-calendar"></i>{{ Helper::getDate($items->created_at) }}</li>
                            </ul>
                           {{--  <span>
                                <h5>Tags: </h5>
                                <ul>
                                    @foreach ($news->tags as $items)
                                        <li>Hot</li>
                                    @endforeach
                                </ul>
                            </span> --}}
                        </div>
                        <div>
                        <img style="width: 50%; height: 50%" class="img-responsive" src="{{ asset('public/backend/uploads/news/'.$items->images) }}" alt="">
                        </div>
                        <p>{!! Str::limit($items->content, 500) !!}</p>
                        <a class="btn btn-primary" href="{{ route('show_news_details', ['news_id' => $items->id]) }}">Đọc thêm</a>
                    </div>
                    <br />
                    @endforeach

                    {{-- End List --}}

                    {{-- Paginate --}}
                    <div class="pagination-area">
                        <ul class="pagination">
                            {!! $news->render() !!}
                        </ul>
                    </div>

                    {{-- End Paginate --}}
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection