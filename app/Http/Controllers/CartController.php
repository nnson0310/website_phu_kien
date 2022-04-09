<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Cart;

class CartController extends Controller
{
    ////////////////Front_end
    public function saveCart(Request $request){
        $product_id = $request->product_id;
        $product = Product::find($product_id);
        

        ///get cart info
        $data['id'] = $product->product_id;
        $data['qty'] = $request->product_quantity;
        $data['name'] = $product->product_name;
        $data['price'] = $product->product_price;
        $data['weight'] = rand(0,100);
        $data['options']['image'] = $product->product_image;
        Cart::add($data);

        ///
        return redirect()->route('show_cart');
        
    }

    public function saveCartDirect(Request $request){
        $product_id = $request->product_id;
        $product = Product::find($product_id);
        

        ///get cart info
        $data['id'] = $product->product_id;
        $data['qty'] = 1;
        $data['name'] = $product->product_name;
        $data['price'] = $product->product_price;
        $data['weight'] = rand(0,100);
        $data['options']['image'] = $product->product_image;
        Cart::add($data);

        ///
        return redirect()->route('show_cart');
        
    }

    public function showCart(){
        $category = Category::where('cat_status','1')->orderBy('cat_id','desc')->get();
        $brand = Brand::where('brand_status','1')->orderBy('brand_id','desc')->get();

        return view('pages.cart.show_cart', compact('category','brand'));
    }

    public function deleteCart($rowId){
        Cart::remove($rowId);
        if(Cart::count() == 0){
            return redirect()->to('show_cart')->with('message','Giỏ Hàng Của Bạn Đang Trống');
        }
        return redirect()->to('show_cart');
    }

    public function deleteAllCart(){
        Cart::destroy();
        if(Cart::count() == 0){
            return redirect()->to('show_cart')->with('message','Giỏ Hàng Của Bạn Đang Trống');
        }
        return redirect()->to('show_cart');
    }

    public function updateCart(Request $request){
        $rowId = $request->rowId;
        $quantity = $request->quantity;
        if($quantity < 1 || $quantity > 100){
            return redirect()->back()->with('fail', 'Số lượng sản phẩm không được nhỏ hơn 1 hoặc lớn hơn 100.');
        }
        else{
            Cart::update($rowId,$quantity);
            return redirect()->back();
        } 
    }

}
