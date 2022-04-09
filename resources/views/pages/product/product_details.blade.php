@extends('sidebar')

@section('main_content')
            <!--product-details-->
                <div class="product-details">
                    <div class="col-sm-5">
                        <div class="view-product">
                            @php
                                $images = json_decode($product->product_image, true);
                            @endphp
                            @if (is_array($images) && !empty($images))
                                <img class="thumbnails" src="{{ asset('public/backend/uploads/thumbnails/'.$images[0]) }}" alt="" />
                            @endif
                            <h3>Phóng to</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">
                            
                            <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                    @if (is_array($images) && !empty($images))
                                    <?php 
                                        for($i = 0; $i < 3; $i++){
                                    ?>
                                        <a href="#"><img style="width: 85px; height: 84px" src="{{ asset('public/backend/uploads/thumbnails/'.$images[$i]) }}" alt=""></a>
                                    <?php
                                        }
                                    ?>
                                    </div>
                                    <div class="item">
                                    <?php
                                        for($i = 3; $i < 6; $i++){
                                    ?>
                                        <a href="#"><img style="width: 85px; height: 84px" src="{{ asset('public/backend/uploads/thumbnails/'.$images[$i]) }}" alt=""></a>
                                    <?php
                                        }
                                    ?>
                                    </div>
                                    @endif                              
                                </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <form method="POST" action="{{ route('save_cart') }}">
                            {{ @csrf_field() }}
                            <div class="product-information"><!--/product-information-->
                                <img src="{{asset('public/frontend/images/product-details/new.jpg')}}" class="newarrival" alt="" />
                                <h2>{{$product->product_name}}</h2>
                                <p>Mã sản phẩm: 00{{ $product->product_id }}</p>
                                <img src="{{asset('public/frontend/images/product-details/rating.png')}}" alt="" />
                                <div>
                                    <div><h3>Giá: {{ Helper::formatPrice($product->product_price) }}</h3></div>
                                    <input name="product_id" value="{{ $product->product_id }}" type="hidden" />
                                    <div>
                                        <h3>Số lượng: <input style="width: 100px" min="1" type="number" name="product_quantity" value="1" /></h3>
                                    </div>
                                    <div><button type="submit" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Thêm vào giỏ hàng
                                    </button>
                                    </div>
                                </div>
                                <p><b>Tình trạng:</b>
                                    @if ($product->product_quantity >= 1)
                                    <span style="color: #288ad6; font-size: 20px; font-weight: bold; text-transform: capitalize">Còn hàng</span>
                                    @else 
                                        <span style="color: #288ad6; font-size: 20px; font-weight: bold; text-transform: capitalize">Hết hàng</span>
                                    @endif
                                </p>
                                <p><b>Thương Hiệu: </b>{{ $true_brand->brand_name }}</p>
                                <a href=""><img src="{{asset('public/frontend/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
                            </div><!--/product-information-->
                        </form>
                    </div>
                </div>
    <!--/product-details-->
    
    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active" ><a href="#details" data-toggle="tab">Chi tiết sản phẩm</a></li>
                <li><a href="#companyprofile" data-toggle="tab">Thông tin công ty</a></li>
                <li><a href="#reviews" data-toggle="tab">Đánh giá sản phẩm</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="details" >
                <div class="col-sm-12">
                        <div class="about_product text-justify">
                            <p>{!! $product->product_content  !!}</p>
                        </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="companyprofile" >
                <div class="col-sm-12">
                    <div class="about_product text-justify">
                        <p>{!! $true_brand->brand_desc !!}</p>
                    </div>
                </div>                              
            </div>
        
            <div class="tab-pane fade" id="reviews" >
                <div class="col-sm-12">
                    @foreach ($ratings as $rating)
                        <ul>
                            <li><i class="fa fa-user"></i> {{ $rating->user->username }}</li>
                            <li><i class="fa fa-clock-o"></i> {{ Helper::getTime($rating->created_at) }}</li>
                            <li><i class="fa fa-calendar-o"></i> {{ Helper::getDate($rating->created_at) }}</li>
                            <li>
                                <?php
                                    for($i = 0; $i < $product->averageRating(); $i++ ){
                                        echo '<i class="fa fa-star"></i>';
                                    }
                                ?>           
                            </li>
                        </ul>
                        <p>Đánh giá: {{ $rating->content }}</p>
                        <hr/>
                    @endforeach

                    @if (Session::has('message'))
						<section class="alert alert-success">{{ Session::get('message') }}</section>
					@endif

                    <p><b>Viết đánh giá của bạn</b></p>
                    <form id='user_rate' action="{{ route('product.reviews') }}" method="POST" >
                        {{ @csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ Session::get('user_id') }}" >
                        <input type="hidden" name="product_id" value="{{ $product->product_id }}" >
                        <span>
                            <input value="{{ Session::get('username') }}" name="username" type="text" placeholder="Tên bạn" required/>
                            <input name="email" type="email" placeholder="Địa chỉ email" required/>
                        </span>
                        <textarea placeholder="Viết đánh giá của bạn" name="content" required></textarea>
                        <label for="star-rate" class="control-label"><b>Rate sao: </b> </label>
                        <input name="rating" id="star-rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" data-size="sm" >
                        <button type="submit" name="submit" class="btn btn-default pull-right">Đánh giá</button>
                    </form>
                </div>
            </div>
            
        </div>
    </div><!--/category-tab-->
    
    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">Sản Phẩm Liên Quan</h2>
        
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    @foreach ($related_product as $items)
                        @if ($items->product_id != $product->product_id)
                        <a href="{{ route('product_details', ['product_id' => $items->product_id, 'brand_id' => $items->brand_id, 'cat_id' => $items->cat_id]) }}">
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <form action="{{ route('save_cart_direct') }}" method="POST">
                                            {{ @csrf_field() }}
                                            <div class="productinfo text-center">
                                                <img src="{{ asset('public/backend/uploads/thumbnails/'.$items->product_image) }}" alt="" />
                                                <h2>{{ $items->product_name }}</h2>
                                                <input type="hidden" name="product_id" value="{{ $items->product_id }}">
                                                <p style="font-weight: bold; font-size: 20px">Giá: {{ number_format($items->product_price,0,",",".") }}</p>
                                                <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endif
                    @endforeach
                </div>
            </div>
             <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>			
        </div>
    </div><!--/recommended_items-->

    <script type="text/javascript">
       $(document).ready(function () {
            $('.nav-tabs a[href="#{{ old('tab') }}"]').tab('show');
        });
    </script>

    {{-- <script type="text/javascript">
        $(document).ready(function(){
            $('#user_rate').on('submit', function(){
                var user_id = $('input[name="user_id"]').val();
                var product_id = $('input[name="product_id"]').val();
                var username = $('input[name="username"]').val();
                var email = $('input[name="email"]').val();
                var content = $('textarea[name="content"]').val();
                var rating = $('input[name="rating"]').val();

                $.ajaxSetup({ 
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: 'POST',
                    url: "{{ route('product.reviews') }}",
                    dataType: 'json',
                    data: {
                        'rating': rating,
                        'user_id': user_id,
                        'product_id': product_id,
                        'username': username,
                        'email': email,
                        'content': content
                    },
                    success: function(response){
                        alert(response.success);
                    },
                    error: function(response){
                        alert('AJAX Failed!!!');
                        console.log(response);
                    }
                });

            });

        });

    </script> --}}

@endsection