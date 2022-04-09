<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\LogInRequest;
use DB;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller

{  

    public function getLogin(){
        return view('admin_login');  
    }

    //Chuc nang dang nhap
    public function postLogin(LogInRequest $request){
        $admin = Admin::where('email', $request->email)->first();
        $password = $request->password;
        if(isset($admin)){
            if(Hash::check($password, $admin->password)){
                Session::put('admin_name', $admin->name);
                Session::put('admin_id', $admin->admin_id);
                return redirect()->to('admin/dashboard');
            }
            else{
                return redirect()->back()->with('error', 'Sai mật khẩu. Xin vui lòng thử lại');
            }
        }
        else{
            return redirect()->back()
                ->with('error','Tài khoản không tồn tại. Xin vui lòng thử lại.')
                ->withInput();
        }
          
    }

    //Chuc nang dang xuat
    public function logout(){
       Session::forget(['admin_name','admin_id']);
       return redirect()->route('getLogin');
    }

    //Chuc nang doi mat khau
    public function changePassword(Request $request){
        $new_password = $request->new_password;
        $confirm_password = $request->confirm_password;    
        if($new_password == $confirm_password){
            $admin = Admin::find($request->admin_id);
            $admin->password = Hash::make($new_password);
            $result = $admin->save();
            if($result){
                return response()->json(['success' => 'Thay đổi password thành công']);
            }
        }
        else{
            return redirect()->back();
        }
    }
    
}
