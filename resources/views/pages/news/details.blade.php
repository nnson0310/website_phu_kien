@extends('layout')

@section('content')

<section>
  
    <section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
                        <h2>Bài viết gần đây</h2>
                        <div class="panel-group category-products" id="accordian"><!-- latest news -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    @foreach ($latest_news as $items)
                                        <h4 class="panel-title">
                                            <a href="{{ route('show_news_details', ['news_id' => $items->id]) }}">                                              
                                                <span class="badge pull-right"><i class="fa fa-eye"></i></span>
                                                {{ $items->title }}
                                            </a>
                                        </h4>
                                        <br />
                                    @endforeach                    
                                </div>
                            </div>                                         
                        </div><!--/latest news-->
					
                        <div class="brands_products"><!--tags-->
                            <h2>Tags</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach ($tags as $items)
                                    <li><a href=""> <span class="pull-right"><i class="fa fa-eye"></i></span>{{ $items->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div><!--/tags-->
					</div>
				</div>
                
				<div class="col-sm-9">
					<div class="blog-post-area">
						<div class="single-blog-post">
							<h2 style="text-align: center; margin-bottom: 20px; text-transform: capitalize">{{ $news->title }}</h2>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> Admin</li>
									<li><i class="fa fa-clock-o"></i> {{ Helper::getTime($news->created_at) }}</li>
									<li><i class="fa fa-calendar"></i> {{ Helper::getDate($news->created_at) }}</li>
								</ul>
							</div>
							<a href="">
								<img src="{{ asset('public/backend/uploads/news/'.$news->images) }}" alt="">
							</a>
							<p>{!! $news->content !!}</p>
						</div>
					</div><!--/blog-post-area-->

					<div class="rating-area">
						<ul class="ratings">
							<li class="rate-this">Số lượt xem:</li>
							<li class="color">{{ $news->count_views }}</li>
						</ul>
						<ul class="tag">
							<li><i class="fa fa-tags"></i></li>
                            @foreach ($news->tags as $key => $tags)
                                @if ($key == (count($news->tags) - 1))
                                <li><a class="color" href="#">{{ $tags->name }}</a></li>
                                @else
                                <li><a class="color" href="#">{{ $tags->name }}<span>/</span></a></li>
                                @endif
                            @endforeach
						</ul>
					</div><!--/rating-area-->

					<div class="socials-share">
						<a href=""><img src="images/blog/socials.png" alt=""></a>
					</div><!--/socials-share-->

					<div class="media commnets">
						<a class="pull-left" href="#">
							<img class="media-object" src="images/blog/man-one.jpg" alt="">
						</a>
						<div class="media-body">
							<div class="blog-socials">
								<ul>
									<li><a href="https://facebook.com"><i class="fa fa-facebook"></i></a></li>
									<li><a href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								</ul>
								<a class="btn btn-primary" href="{{ route('show_news') }}">Tin tức khác</a>
							</div>
						</div>
					</div><!--Comments-->
					<div class="response-area">
						<h2>{{ $comments->count() }} Bình luận</h2>
						<ul class="media-list">
							@foreach ($comments as $items)
								<li class="media">
									<a class="pull-left" href="#">
										<img class="media-object" src="{{ asset('public/frontend/images/blog/LOL.png') }}" alt="">
									</a>
									<div class="media-body">
										<ul class="sinlge-post-meta">
											<li><i class="fa fa-user"></i>{{ $items->user->username }}</li>
											<li><i class="fa fa-clock-o"></i> {{ Helper::getTime($items->created_at) }}</li>
											<li><i class="fa fa-calendar"></i> {{ Helper::getDate($items->created_at) }}</li>
										</ul>
										<p>{{ $items->content }}</p>
										<button class="btn btn-primary"><i class="fa fa-reply"> Trả lời</i></button>
									</div>
								</li>
							@endforeach
							<form action="" method="POST">
								{{ @csrf_field() }}
								<div class="form-group">
									<label style="display: none" class="label" for="reply">Trả lời</label>
									<textarea rows="3" style="display: none" onfocus="this.value=''" class="content" class="form-control" placeholder="Nhập câu trả lời của bạn ở đây" ></textarea>
									<button style="display: none" type="submit" class="btn btn-primary submit">Đăng</button>
								</div>
							</form>
							{{-- <li class="media second-media">
								<a class="pull-left" href="#">
									<img class="media-object" src="images/blog/man-three.jpg" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i>Janis Gallagher</li>
										<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
										<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
								</div>
							</li> --}}
						</ul>					
					</div><!--/Response-area-->
					@if (Session::has('success'))
						<section class="alert alert-success">{{ Session::get('success') }}</section>
					@endif
					<div class="replay-box">
						<div class="row">
							<form action="{{ route('add_comments') }}" method="POST">
								{{ @csrf_field() }}
								<div class="col-sm-8">
									<h2>Để lại bình luận</h2>
									<div class="text-area">
										<div class="blank-arrow">
											<label>Nội dung bình luận</label>
										</div>
										<span>*</span>
										<textarea onfocus="this.value=''" name="content" rows="6" required></textarea>
										<input type="hidden" value="{{ $news->id }}" name="news_id">
										<button type="submit" class="btn btn-primary">Đăng</button>
									</div>
								</div>
							</form>
						</div>
					</div><!--/Repaly Box-->
				</div>	
			</div>
		</div>
	</section>

<script type="text/javascript">
	$(document).ready(function(){
		var button = document.querySelector('.reply');
		var input = document.querySelector('.input');
		var label = document.querySelector('.label');
		var submit = document.querySelector('.submit');

		button.onclick = ()=>{
			if(input.style.display == 'block' && !input.value){
				label.style.display = 'none';
				input.style.display = 'none';
				submit.style.display = 'none';
			}
			else{
				label.style.display = 'block';
				input.style.display = 'block';
				submit.style.display = 'block';
			}
		}
	});
</script>	
@endsection