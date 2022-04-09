<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Http\Requests;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\Redirect;
use File;

class HomeController extends Controller
{
    //
    public function index(){
        $category = Category::where('cat_status','1')->orderBy('cat_id','desc')->get();
        $brand = Brand::where('brand_status','1')->orderBy('brand_id','desc')->get();
        $product = Product::where('product_status','1')->orderBy('product_id','desc')->limit(5)->get();
        $brand_prd = Product::where('product_status','1')->orderBy('product_id','desc')->get();

        //hot product
        $hot_product1 = Product::orderBy('product_price', 'ASC')->limit(3)->get();
        $hot_product2 = Product::orderBy('product_price', 'DESC')->limit(3)->get();
        return view('pages.home', compact('category', 'brand', 'product', 'brand_prd', 'hot_product1', 'hot_product2'));
    }

    public function searchByKeywords(Request $request){
        $category = Category::where('cat_status','1')->orderBy('cat_id','desc')->get();
        $brand = Brand::where('brand_status','1')->orderBy('brand_id','desc')->get();
        $keywords = $request->keywords;
        $search_result = Product::where('product_name','like','%'.$keywords.'%')->get();
        return view('pages.search.keywords', compact('category', 'brand', 'keywords', 'search_result'));
    }

    public function searchByPrice($range){
        if($range == 1){
            $search_result = Product::where('product_price', '<', 1000000)->orderBy('product_id', 'DESC')->get();
        }
        else if($range == 2){
            $search_result = Product::whereBetween('product_price', [1000000, 5000000])->orderBy('product_id', 'DESC')->get();
        }
        else if($range == 3){
            $search_result = Product::whereBetween('product_price', [5000000, 10000000])->orderBy('product_id', 'DESC')->get();
        }
        else{
            $search_result = Product::where('product_price', '>', 10000000)->orderBy('product_id', 'DESC')->get();
        }
        $category = Category::where('cat_status','1')->orderBy('cat_id','desc')->get();
        $brand = Brand::where('brand_status','1')->orderBy('brand_id','desc')->get();
        return view('pages.search.price_range', compact('search_result', 'category', 'brand', 'range'));
    }

    /////Page not found
    public function notFound(){
        return view('errors.404');
    }
}
