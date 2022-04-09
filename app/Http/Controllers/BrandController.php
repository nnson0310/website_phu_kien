<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{
    //Add brand
    public function addBrand(){
        return view('admin.brand.add_brand');
    }

    //Edit brand
    public function listBrand(Request $request){
        $all_brand = Brand::get();
        if($request->isMethod('post')){
            $hint = $request->hint;
            if(isset($hint)){
                if($hint == 0){
                    $brand = Brand::orderBy('brand_name', 'ASC')->paginate(5);         
                }
                else{
                    $brand = Brand::orderBy('brand_id', 'DESC')->paginate(5);
                }
            }
        }
        else{
            $brand = Brand::paginate(5);
        }
        $count_all = $all_brand->count();
        $count = $brand->count();
        return view('admin.brand.list_brand', compact('brand', 'count', 'count_all'));
        
    }


    //Save brand
    public function saveBrand(BrandRequest $request){
        $query = Brand::where('brand_name', $request->brand_name)->exists();
        if($query == true){
            return redirect()->back()->with('alert','Thương Hiệu Đã Tồn Tại. Vui Lòng Nhập Thương Hiệu Khác.');
        }
        else{
            $data = $request->all();
            $brand = Brand::create($data);
            if($brand){
                return redirect()->route('add_brand')
                ->with('success', 'Đã thêm thương hiệu thành công');
            }
        }
    }

    //Change brand status from hide to unhide
    public function unhideBrand($brand_id){
        $brand = Brand::find($brand_id);
        $brand->brand_status = 1;
        $query = $brand->save();
        if($query){
            return redirect()->route('list_brand')
            ->with('message', 'Cập nhật trạng thái thương hiệu thành công');
        }
    }

    //Change brand status from unhide to hide
    public function hideBrand($brand_id){
        $brand = Brand::find($brand_id);
        $brand->brand_status = 0;
        $query = $brand->save();
        if($query){
            return redirect()->route('list_brand')
            ->with('message', 'Cập nhật trạng thái thương hiệu thành công');
        }
    }

    //delete brand from database
    public function deleteBrand($brand_id){
        Brand::where('brand_id', $brand_id)->delete();
        Product::where('brand_id', $brand_id)->delete();
        return redirect()->route('list_brand')->with('message', 'Đã xoá thương hiệu thành công');  
    }

    //edit brand
    public function editBrand($brand_id){
        $all_brand = Brand::where('brand_id',$brand_id)->get();
        return view('admin.brand.edit_brand',compact('all_brand'));
    }

    //update Brand
    public function updateBrand(BrandRequest $request, $brand_id){
        $brand = Brand::find($brand_id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_desc = $request->brand_desc;
        $brand->brand_status = $request->brand_status;
        $result = $brand->save();
        if(isset($result)){
            return redirect()->back()->with('success','Đã cập nhật thương hiệu thành công');
        } 
    }


    public function recycleBrand(){
        $all_brand = Brand::onlyTrashed()->get();
        $brand = Brand::onlyTrashed()->paginate(3);
        $count_all = $all_brand->count();
        $count = $brand->count();
        return view('admin.brand.recycle_brand', compact('brand', 'count', 'count_all'));
    }

    public function restoreBrand($brand_id){
        try {
            //code...
            $brand = Brand::withTrashed()->find($brand_id)->restore();
            if($brand){
                $product = Product::withTrashed()->find($brand_id)->restore();
            }
        } catch (\Exception $e) {
            //throw $e;
            return redirect()->back()->withError($e->getMessage());
        } finally{
            if($brand){
                return redirect()->back()->with(['message' => 'Khôi phục thương hiệu thành công']);
            }
        }
        
    }


    ////////////Front End
    public function showBrandProduct($brand_id){
        $category = Category::where('cat_status','1')->orderBy('cat_id','desc')->get();
        $brand = Brand::where('brand_status','1')->orderBy('brand_id','desc')->get();
        $product = Product::with('brand')->where('brand_id',$brand_id)->get();
        $query = Brand::find($brand_id);
        $true_brand = $query->brand_name;
        return view('pages.brand.brand_product', compact('category', 'brand', 'product','true_brand'));
    }

}
