<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Http\Requests;
use App\Models\User;
use App\Models\News;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Comments;
use App\Models\NewsTags;
use App\Models\Tags;
use App\Models\Rating;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UserRequest;
use File;
use Illuminate\Foundation\Events\Dispatchable;
use App\Events\NewsViews;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

session_start();

class UserController extends Controller
{   
    public function getLogin(){
        return view('pages.login.login');
    }

    public function getRegister(){
        return view('pages.login.register');
    }

    //register or create new account
    public function postRegister(UserRequest $request){
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;

        $result = $user->save();
        if($result){
            return redirect()->route('register_success');
        }
    }

    public function registerSuccess(){
        return view('pages.login.register_success');
    }

    public function postLogin(Request $request){
        $username = $request->username;
        $password = $request->password;

        $user = User::where('username',$username)->first();
        if($user){
            if(Hash::check($password,$user->password)){
                Session::put('username', $username);
                Session::put('user_id', $user->user_id);
                return redirect()->route('home_page');
            }
        }
        else{
            return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu chưa chính xác. Xin vui lòng thử lại');
        } 
    }

    public function logout(){
        Session::flush();
        return redirect()->route('home_page');
    }

    //////News
    public function showNews(){
        $news = News::where('status', 1)->orderBy('id', 'DESC')->paginate(3);
        $recent_news = News::where('status', 1)->orderBy('id', 'DESC')->limit(5)->get();
        $recent_tags = Tags::where('status', 1)->orderBy('id', 'DESC')->limit(5)->get();
        return view('pages.news.show_news', compact('news', 'recent_news', 'recent_tags'));
    }

    public function showNewsDetails($news_id){
        $news = News::find($news_id);
        $comments = Comments::with('user')->where('news_id', $news_id)->orderBy('id', 'DESC')->get();
        NewsViews::dispatch($news);
        $latest_news = News::where('status', 1)->orderBy('id', 'DESC')->take(3)->get();
        $tags = Tags::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('pages.news.details', compact('news', 'latest_news', 'tags', 'comments'));
    }

    public function addComments(Request $request){
        $comments = new Comments;
        $comments->user_id = Session::get('user_id');
        $comments->news_id = $request->news_id;
        $comments->content = $request->content;

        $result = $comments->save();
        if($result){
            return redirect()->back()->with('success', 'Đăng bình luận thành công');
        }


    }

    ////////////User
    public function userProfile($user_id){
        $category = Category::where('cat_status','1')->orderBy('cat_id','desc')->get();
        $brand = Brand::where('brand_status','1')->orderBy('brand_id','desc')->get();
        $user = User::find($user_id);
        return view('pages.user.profile', compact('category', 'brand', 'user'));
    }

    public function updateProfile(Request $request){
        $user_id = $request->user_id;
        
        $user = User::find($user_id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        if($request->hasFile('avatar')){
            $get_image = $request->file('avatar');
            $fileExtension = $get_image->getClientOriginalExtension();
            $fileName = $get_image->getClientOriginalName();
            $fileRealName = current(explode('.',$fileName));
            $images = $fileRealName.rand(0,99).'.'.$fileExtension;
            $get_image->move('public/frontend/images/user/', $images);

            //
            $user->avatar = $images;
            $user->save();
            return redirect()->back()->with('success', 'Cập nhật tài khoản thành công');
        }
        else{
            $user->save();
            return redirect()->back()->with('success', 'Cập nhật tài khoản thành công');
        }
    }

    ////Product Reviews
    public function productReviews(Request $request){
        $product_id = $request->product_id;
        $product = Product::find($product_id);

        //Check if user have already rated or not
        $user_id = $request->user_id;
        $user_rates = Rating::where('rateable_id', $product_id)->get();
        $rated_or_not = false;
        foreach($user_rates as $user_rate){
            if($user_rate->user_id == $user_id){
                $rated_or_not = true;
            }
        }

        if($rated_or_not == true){
            return redirect()->back()
            ->withInput(['tab' => 'reviews'])
            ->with('message', 'Rất tiếc, bạn đã đánh giá sản phẩm này rồi.');
        }
        else{
            $rating = new \willvincent\Rateable\Rating;
            $rating->rating = $request->rating;
            $rating->username = $request->username;
            $rating->email = $request->email;
            $rating->content = $request->content;
            $rating->user_id = $request->user_id;
            $product->ratings()->save($rating);
            return redirect()->back()
            ->withInput(['tab' => 'reviews'])
            ->with('message', 'Đánh giá thành công. Cám ơn bạn đã dành thời gian quan tâm đến sản phẩm.');
        }
        
        /* dd($product->ratings);
        return response()->json(['success' => 'Đánh giá sản phẩm thành công']);
        */
    }

}
