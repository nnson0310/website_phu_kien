<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use App\Models\OrdersDetails;
use App\Models\User;
use App\Models\Product;
use Carbon\Carbon;
use App\Charts\DailyRecord;
use Exception;

class AdminController extends Controller
{
    //

    public function dashboard(){

        //Sales record of seven days nearby
        $chart = new DailyRecord;
        $chart->labels(['6 days ago', '5 days ago', '4 days ago', '3 days ago', '2 days ago', 'Yesterday', 'Today']);

        //make a collection to store sales record
        $collection = collect([]); //could be an array

        for($subday = 6; $subday >= 0; $subday--){
            $total = 0;
            $orders = Orders::whereDate('created_at', Carbon::now()->subDays($subday))->get();
            if($orders){
                foreach($orders as $items){
                    $total += intval($items->orders_total);
                }
            }
            else{
                $total = 0;
            }
            $collection->push($total);
        }


        $chart->dataset('Thống kê doanh thu bảy ngày gần nhất (đơn vị: triệu VNĐ)', 'bar', $collection)->options(['backgroundColor' => '#8bbc21']);
        return view('admin.dashboard', compact('chart'));
    }

    //Orders

    public function showAllOrders(){
        $all_orders = Orders::paginate(3);
        $orders = Orders::get();
        $count = $all_orders->count();
        $count_all = $orders->count();
        if(isset($all_orders)){
            return view('admin.orders.list_all_orders', compact('all_orders', 'count', 'count_all'));
        }
    }

    public function showOrders($status){
        $all_orders = Orders::where('orders_status',$status)->paginate(3);
        $orders = Orders::where('orders_status',$status)->get();
        $count = $all_orders->count();
        $count_all = $orders->count();
        return view('admin.orders.list_status_orders', compact('all_orders', 'count', 'count_all'));
    }

    public function showDetails($orders_id){
        $date_time = Carbon::now();
        $orders = Orders::find($orders_id);
        $user = $orders->user->username;
        return view('admin.orders.details', compact('orders', 'date_time', 'user'));
    }

    public function changeOrdersStatus(Request $request, $orders_id){
        $orders = Orders::find($orders_id);
        $orders->orders_status = $request->status;
        $result = $orders->save();
        if($result){
            return redirect()->back();
        }
    }

    public function removeProduct(Request $request){
        $product_id = $request->product_id;
        $orders_id = $request->orders_id;
        $product_left = OrdersDetails::where('orders_id', $orders_id)->count();
        if(!$product_left){
            return redirect()->route('show_all_orders');
        }
        else if($product_left == 1){
            OrdersDetails::where('product_id', $product_id)->delete();
            Orders::where('orders_id', $orders_id)->delete();
            /* $message = '<script type="text/javascript">alert("Đơn hàng #DH00'.$orders_id.'vừa bị xóa hoàn toàn. Để khôi phục xin đặt lại đơn hàng mới");</script>'; */
            return redirect()->route('show_all_orders')->with('alert', 'Đơn hàng #DH00'.$orders_id.'vừa bị xóa hoàn toàn. Để khôi phục xin đặt lại đơn hàng mới');
        }
        else{
            OrdersDetails::where('product_id', $product_id)->delete();
            return redirect()->back()->with('alert', 'Xóa sản phẩm khỏi đơn hàng thành công');
        }
    }

    //recycle orders
    public function recycleOrders(){
        $all_orders = Orders::onlyTrashed()->get();
        $orders = Orders::onlyTrashed()->paginate(3);
        $count = $orders->count();
        $count_all = $all_orders->count();

        return view('admin.orders.recycle_orders', compact('orders', 'count', 'count_all'));
    }

    //restore orders
    public function restoreOrders($orders_id){
        try {
            //code...
            $orders = Orders::withTrashed()->find($orders_id)->restore();
        } catch (\Exception $e) {
            //throw $e;
            return redirect()->back()->withError($e->getMessage());
        } finally{
            if($orders){
                return redirect()->back()->with(['message' => 'Đã khôi phục đơn hàng thành công.']);
            }
        }
    }

    ////////Customers
    public function listCustomers(){
        $all_customers = User::all();
        $customers = User::paginate(5);
        $all_orders = Orders::all();
        return view('admin.customers.list', compact('customers', 'all_customers', 'all_orders'));
        
    }

}
