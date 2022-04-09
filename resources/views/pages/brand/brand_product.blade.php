@extends('sidebar')

@section('main_content')
    <!--features_items-->
    <div class="features_items">
        <h2 class="title text-center">Sản Phẩm Theo Thương Hiệu: {{ $true_brand }}</h2>
            @foreach ($product as $items)
                    <a href="{{route('product_details', ['product_id' => $items->product_id, 'brand_id' => $items->brand_id, 'cat_id' => $items->cat_id ])}}">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">    
                                <form method="POST" action="{{ route('save_cart_direct') }}">
                                    {{ @csrf_field() }}           
                                    <div class="single-products">                      
                                        <div class="productinfo text-center">
                                            @php
                                                $images = json_decode($items->product_image)
                                            @endphp
                                            @if(is_array($images) && !empty($images))
                                                <img style="width: 150px; height: 150px" src="{{asset('public/backend/uploads/product/'.$images[0])}}" alt="" />
                                            @endif
                                            <h2>{{ Helper::formatPrice($items->product_price) }} VNĐ</h2>
                                            <p>{{$items->product_name}}</p>
                                            <input type="hidden" name="product_id" value="{{ $items->product_id }}" >
                                            <button type="submit" name="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
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

@endsection
