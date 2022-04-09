@extends('sidebar')

@section('main_content')
    <!--features_items-->
    <div class="features_items">
        <h2 class="title text-center">Sản Phẩm mới</h2>
        @foreach ($product as $items)
            <a href="{{ route('product_details',['product_id' => $items->product_id, 'brand_id' => $items->brand_id, 'cat_id' => $items->cat_id]) }}">
                <div class="col-sm-4">
                    <div class="product-image-wrapper">    
                        <form method="POST" action="{{ route('save_cart_direct') }}">
                            {{ @csrf_field() }}          
                            <div class="single-products">                      
                                <div class="productinfo text-center">
                                    @php
                                        $images = json_decode($items->product_image);
                                    @endphp
                                    @if (is_array($images) && !empty($images))
                                        <img style="width: 150px; height: 150px" src="{{ asset('public/backend/uploads/thumbnails/'.$images[0]) }}" alt="" />
                                    @endif
                                    <h2>{{ Helper::formatPrice($items->product_price) }} VNĐ</h2>
                                    <p>{{$items->product_name}}</p>
                                    <input type="hidden" name="product_id" value="{{ $items->product_id }}" >
                                    <button type="submit" name="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"> Thêm vào giỏ hàng</i></button>
                                </div>
                            </div>  
                        </form>  
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="#"><i class="fa fa-plus-square"></i>Thêm Vào WishList</a></li>
                                <li><a href="#"><i class="fa fa-plus-square"></i>So sánh giá</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <!--features_items-->
    
    <!--category-tab-->
    <div class="category-tab">
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                @foreach ($brand as $key => $items)
                    <li class="<?php if($key == 0){ echo "active"; } ?>" ><a href="#{{ $items->brand_id }}" data-toggle="tab">{{ $items->brand_name }}</a></li> 
                @endforeach
            </ul>
        </div>

        
            <div class="tab-content">
                @foreach ($brand as $key => $items)
                <div class="tab-pane fade <?php if($key == 0){ echo "active in"; } ?>" id="{{ $items->brand_id }}">
                    @foreach ($brand_prd as $prd)
                        @if ($prd->brand_id == $items->brand_id)
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            @php
                                                $images = json_decode($prd->product_image, true);
                                            @endphp
                                            @if (is_array($images) && !empty($images))
                                                <img style="padding: 10px" src="{{ 'public/backend/uploads/thumbnails/'.$images[0] }}" alt="" />
                                            @endif
                                            <h2>{{ $prd->product_name }}</h2>
                                            <p>{{ Helper::formatPrice($prd->product_price) }} VNĐ</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                @endforeach   
            </div>
    </div>
    <!--/category-tab-->

    <!--recommended_items-->
    <div class="recommended_items">
        <h2 class="title text-center">Sản Phẩm Hot</h2>

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    @foreach ($hot_product1 as $items)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        @php
                                            $images = json_decode($items->product_image, true);
                                        @endphp
                                        @if (is_array($images) && !empty($images))
                                            <img style="width: 70%; height: 70%" src="{{ 'public/backend/uploads/thumbnails/'.$images[0] }}" alt="" />
                                        @endif
                                        <h2>{{ Helper::formatPrice($items->product_price) }} VNĐ</h2>
                                        <p>{{ $items->product_name }}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="item">
                    @foreach ($hot_product2 as $items)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        @php
                                            $images = json_decode($items->product_image, true);
                                        @endphp
                                        @if (is_array($images) && !empty($images))
                                            <img style="width: 70%; height: 70%" src="{{ 'public/backend/uploads/thumbnails/'.$images[0] }}" alt="" />
                                        @endif
                                        <h2>{{ Helper::formatPrice($items->product_price) }} VNĐ</h2>
                                        <p>{{ $items->product_name }}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>   
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
    </div>
    <!--/recommended_items-->

@endsection
