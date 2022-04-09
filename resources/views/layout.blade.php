<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset("public/frontend/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("public/frontend/css/font-awesome.min.css")}}" rel="stylesheet">
    <link href="{{asset("public/frontend/css/prettyPhoto.css")}}" rel="stylesheet">
    <link href="{{asset("public/frontend/css/price-range.css")}}" rel="stylesheet">
    <link href="{{asset("public/frontend/css/animate.css")}}" rel="stylesheet">
	<link href="{{asset("public/frontend/css/main.css")}}" rel="stylesheet">
	<link href="{{asset("public/frontend/css/responsive.css")}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('images/ico/apple-touch-icon-144-precomposed.png')}})">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('images/ico/apple-touch-icon-57-precomposed.png')}}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	{{-- Star rating --}}
	<link href="{{ asset('vendor/kartik-v/bootstrap-star-rating/css/star-rating.css') }}" media="all" rel="stylesheet" type="text/css" />
	<script src="{{ asset('vendor/kartik-v/bootstrap-star-rating/js/star-rating.js') }}" type="text/javascript"></script>

</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 0977045560</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> phukyen@info.japan.vn</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img id="logo" src="{{asset('public/frontend/images/home/logo.png')}}" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canadian Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-heart"></i> Danh sách ưa thích</a></li>
								<li><a href="{{ route('show_cart') }}"><i class="fa fa-shopping-cart"></i> Giỏ Hàng</a></li>
								<li><a href="{{ route('checkout_form') }}"><i class="fa fa-credit-card"></i> Thanh Toán</a></li>
								@if(Session::has('username'))
								<li><a href="{{ route('user_profile',['user_id' => Session::get('user_id')]) }}"><i class="fa fa-user"></i> Xin chào {{ Session::get('username') }}</a></li>
								<li><a href="{{ route('user_logout') }}"><i class="fa fa-sign-out"></i> Đăng Xuất</a></li>
								@else
								<li><a href="{{ route('get_login') }}"><i class="fa fa-lock"></i> Đăng Nhập</a></li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
							<li><a href="{{route('home_page')}}" class="active">Trang Chủ</a></li>
								<li class="dropdown"><a href="#">Sản Phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="#">Sản Phẩm Mới Nhất</a></li>
										<li><a href="#">Sản Phẩm Bán Chạy</a></li> 
										<li><a href="#">Giỏ Hàng</a></li> 
										<li><a href="#">Thanh Toán</a></li> 
                                    </ul>
                                </li> 
								<li><a href="{{ route('show_news') }}">Tin Tức</a></li> 
								<li><a href="#" >Hỏi Đáp</a></li>
								<li><a href="#" >Liên Hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
						<form action="{{ route('search_by_keywords') }}" method="POST">
							{{ csrf_field() }}
							<div class="search_box pull-right">
								<input required type="text" name="keywords" placeholder="Tìm kiếm" />
								<button id="search_icon" type="submit"></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	@yield('sidebar')

	@yield('content')
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="companyinfo">
							<h2><span>PhuKyen Shop</span></h2>
							<p>Shop phụ kiện điện thoại dành cho những tín đồ SM</p>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('public/frontend/images/home/iframe one.gif')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Rẻ Nhất</p>
								<h2>Vịnh Bắc Bộ</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('public/frontend/images/home/iframe two.gif')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Sales</p>
								<h2>sập sàn nhà</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('public/frontend/images/home/iframe three.gif')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Hậu Mãi</p>
								<h2>chu đáo</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('public/frontend/images/home/iframe four.gif')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Trả Góp</p>
								<h2>không giới hạn</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="{{asset('public/frontend/images/home/map.png')}}" alt="" />
							<p> 52 chùa Bộc, phường Láng Hạ, New York city </p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Dịch vụ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Trợ giúp online</a></li>
								<li><a href="#">Liên hệ chúng tôi</a></li>
								<li><a href="#">Hỏi đáp</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Chính sách</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Điều khoản sử dụng</a></li>
								<li><a href="#">Chính sách hoàn trả</a></li>
								<li><a href="#">Chính sách bảo mật</a></li>
								<li><a href="#">Hệ thống thanh toán</a></li>
								<li><a href="#">Khuyến mãi</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Về chúng tôi</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Thông tin công ty</a></li>
								<li><a href="#">Thông tin tuyển dụng</a></li>
								<li><a href="#">Hệ thống cửa hàng</a></li>
								<li><a href="#">Chương trình đối tác</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Nhận ngay thông tin mới nhất</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Điền email vào đây" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Cập nhật những thông tin hót hòn họt về đồ chơi, phụ kiện dành cho những tín đồ SM</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2020 PhuKyen Shop. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="#">Nguyen Ngoc Son</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>

</body>
</html>