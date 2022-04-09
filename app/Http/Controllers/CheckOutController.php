<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Models\Category;
use App\Models\Brand;
use App\Models\User;
use App\Models\Orders;
use App\Models\OrdersDetails;
use Illuminate\Support\Facades\Redirect;
use Cart;

class CheckOutController extends Controller
{
    public function checkOutLogin(){
        if(Session::has('username') && Session::has('user_id')){
            return redirect()->route('checkout_form');
        }
        else{
            return redirect()->route('get_login');
        }
    }

    public function checkOutForm(){
        $category = Category::orderBy('cat_id','desc')->get();
        $brand = Brand::orderBy('brand_id','desc')->get();
        return view('pages.checkout.checkout_form', compact('category', 'brand'));
    }

    public function addOrders(Request $request){
        $count = Cart::count();
        if($count > 0){
            //insert data to orders table
            $orders = new Orders;
            $orders->user_id = $request->user_id;
            $orders->customer_name = $request->customer_name;
            $orders->email = $request->email;
            $orders->address = $request->address;
            $orders->phone = $request->phone;
            $orders->note = $request->shipping_note;
            $orders->payment_method = $request->payment_method;
            $orders->orders_subtotal = Cart::subtotal();
            $orders->taxes = Cart::tax();
            $orders->orders_total = Cart::total();
            $orders->orders_status = "1";
            $result = $orders->save();

            //insert data to orders_details table
            $cart = Cart::content();
            foreach($cart as $items){
                $orders_details = new OrdersDetails;
                $orders_details->orders_id = $orders->orders_id;
                $orders_details->product_id = $items->id;
                $orders_details->quantity = $items->qty;
                $orders_details->unit_price = $items->price;
                $orders_details->save();
            }
        
            if($result){
                Cart::destroy();
                return redirect()->route('orders_success');
            }
        }
        else{
            return redirect()->back()->with('empty_cart', 'Giỏ hàng của bạn đang trống. Xin mời đặt hàng trước khi thanh toán.');
        }

    }

    public function ordersSuccess(){
        $category = Category::orderBy('cat_id','desc')->get();
        $brand = Brand::orderBy('brand_id','desc')->get();
        return view('pages.checkout.orders_success', compact('category', 'brand'));
    }


}
