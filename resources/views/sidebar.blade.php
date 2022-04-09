@extends('layout')

@section('sidebar')

	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>PhuKyen </span> SHOP</h1>
									<h2>Shop phụ kiện điện thoại uy tín nhất <strong>Vịnh Bắc Bộ</strong></h2>
									<p>Hoàn 2 tỷ USD nếu phát hiện hàng giả hàng nhái hàng kém chất lượng. </p>
									<button type="button" class="btn btn-default get">Mua Ngay</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('public/frontend/images/home/gay_selfie.jpg')}}" class="girl img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>PhuKyen </span> SHOP</h1>
									<h2>Shop phụ kiện điện thoại đỉnh nhất <strong>Văn Lang</strong></h2>
									<p>Ưu đãi bốn mùa xuân hạ thu đông. Discount tận đáy hố ga. Sales SML.  </p>
									<button type="button" class="btn btn-default get">Mua Ngay</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('public/frontend/images/home/loa_bluetooth.jpg')}}" class="girl img-responsive" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>PhuKyen </span> SHOP</h1>
									<h2>Shop phụ kiện điện thoại rẻ nhất <strong>Vũ Trụ</strong></h2>
									<p>Giá rẻ nhất vũ trụ. Tìm được nơi nào bán rẻ hơn tặng ngay sản phẩm.</p>
									<button type="button" class="btn btn-default get">Mua Ngay</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('public/frontend/images/home/op_lung.jpg')}}" class="girl img-responsive" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh Mục Sản Phẩm</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->	
							@foreach ($category as $items)						
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="{{ route('show_cat_product',['cat_id' => $items->cat_id]) }}">{{$items->cat_name}}</a></h4>	
									</div>
								</div>	
							@endforeach						
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Thương Hiệu</h2>
							@foreach ($brand as $items)
									<div class="brands-name">
										<ul class="nav nav-pills nav-stacked">
											<li><a href="{{ route('show_brand_product',['brand_id' => $items->brand_id]) }}"> <span class="pull-right"><i class="fa fa-eye" aria-hidden="true"></i></span>{{$items->brand_name}}</a></li>
										</ul>
									</div>
							@endforeach
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Khoảng Giá</h2>
							<div class="well text-center">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="{{ route('search.price', ['range' => 1]) }}" >Dưới 1 triệu</a></li>
									<li><a href="{{ route('search.price', ['range' => 2]) }}" >Từ 1 triệu đến 5 triệu</a></li>
									<li><a href="{{ route('search.price', ['range' => 3]) }}" >Từ 5 triệu đến 10 triệu</a></li>
									<li><a href="{{ route('search.price', ['range' => 4]) }}" >Trên 10 triệu</a></li>
								</ul>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="{{asset('public/frontend/images/home/sub_banner.png')}}" alt="sub_banner" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					@yield('main_content')
				</div>
			</div>
		</div>
	</section>

@endsection
	

	