<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrdersDetails;
use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model
{   
    use SoftDeletes;

    //define table and primary key
    protected $table = 'tbl_orders';
    protected $primaryKey = 'orders_id';

    protected $fillable = [
        'customer_name', 'email', 'phone', 'address', 'note', 'payment_method', 'orders_subtotal', 'taxes', 'orders_total', 'orders_status'
    ];

    //define relationship with user
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    //define relationship with product
    public function product(){
        return $this->belongsToMany(Product::class, 'tbl_orders_details', 'orders_id', 'product_id')->withPivot('quantity', 'unit_price');
    }
}
