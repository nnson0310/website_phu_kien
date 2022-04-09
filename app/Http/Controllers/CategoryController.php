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
use App\Http\Requests\CategoryRequest;
use Log;

class CategoryController extends Controller
{   

    ////////Back-end

    //Add category
    public function addCategory(){
        return view('admin.category.add_category');
    }

    //Edit category
    public function listCategory(Request $request){
        $all_category = Category::get();
        if($request->isMethod('post')){
            $hint = $request->hint;
            if(isset($hint)){
                if($hint == 0){
                    $category = Category::orderBy('cat_name', 'ASC')->paginate(5);         
                }
                else{
                    $category = Category::orderBy('cat_id', 'DESC')->paginate(5);
                }
            }
        }
        else{
            $category = Category::paginate(5);
        }
        $count_all = $all_category->count();
        $count = $category->count();
        return view('admin.category.list_category', compact('category', 'count', 'count_all'));
        
    }


    //Save category
    public function saveCategory(CategoryRequest $request){
        $query = Category::where('cat_name', $request->cat_name)->exists();
        if($query == true){
            return redirect()->back()->with('alert','Tên Danh Mục Đã Tồn Tại. Vui Lòng Nhập Danh Mục Khác.');
        }
        else{
            $data = $request->all();
            $category = Category::create($data);
            if($category){
                return redirect()->route('add_category')->with('success', 'Đã thêm danh mục thành công');
            }
        }
         
    }

    //Change category status from hide to unhide
    public function unhideCategory($cat_id){
        $category = Category::find($cat_id);
        $category->cat_status = 1;
        $query = $category->save();
        if($query){
            return redirect()->route('list_category')
            ->with('message', 'Cập nhật trạng thái danh mục thành công');
        }
    }

    //Change category status from unhide to hide
    public function hideCategory($cat_id){
        $category = Category::find($cat_id);
        $category->cat_status = 0;
        $query = $category->save();
        if($query){
            return redirect()->route('list_category')
            ->with('message', 'Cập nhật trạng thái danh mục thành công');
        }
    }

    //delete category from database
    public function deleteCategory($cat_id){
        Category::where('cat_id',$cat_id)->delete();
        Product::where('cat_id',$cat_id)->delete();
        return redirect()->route('list_category')->with('message', 'Đã xoá danh mục thành công');
    }

    //edit category
    public function editCategory($cat_id){
        $all_category = Category::where('cat_id', $cat_id)->get();
        return view('admin.category.edit_category', compact('all_category'));
    }

    //update category
    public function updateCategory(CategoryRequest $request, $cat_id){
        $category = Category::find($cat_id);
        $category->cat_name = $request->cat_name;
        $category->cat_desc = $request->cat_desc;
        $category->cat_status = $request->cat_status;
        $result = $category->save();
        if($result){
            return redirect()->back()->with('success', 'Cập nhật danh mục thành công');
        }
    }


    //recycle category
    public function recycleCategory(){
        $all_category = Category::onlyTrashed()->get();
        $category = Category::onlyTrashed()->paginate(3);
        $count = $category->count();
        $count_all = $all_category->count();
        return view('admin.category.recycle_category', compact('category', 'count', 'count_all'));
    }

    //restore category
    public function restoreCategory($cat_id){
        try {
            //code...
            $category = Category::withTrashed()->find($cat_id)->restore();
            if($category){
                $product = Product::withTrashed()->find($cat_id)->restore();
            }
        } catch (\Exception $e) {
            //throw $e;
            return redirect()->back()->withError($e->getMessage());
        } finally{
            if($category){
                return redirect()->back()->with(['message' => 'Khôi phục danh mục thành công']);
            }
        }
    }

    //hide all category
    public function hideAll(Request $request){

        /* $cat_id = $request->all();
        foreach($cat_id as $id){
            DB::table('tbl_category')->find($id)->update(['cat_status' => 0]);
        } */
        return response()->json(['success' => 'Đã ẩn sản phẩm thành công']);
    }

    ////End back-end

    ////Front-end
    public function showCatProduct($cat_id){
        $category = Category::where('cat_status','1')->orderBy('cat_id','desc')->get();
        $brand = Brand::where('brand_status','1')->orderBy('brand_id','desc')->get();
        $product = Product::with('category')->where('cat_id', $cat_id)->get();
        $cat_prd = Category::find($cat_id);
        return view('pages.category.cat_product', compact('category', 'brand', 'product', 'cat_prd'));
    }
    
}
