<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdersDetails extends Model
{    
     use SoftDeletes;

     //define table and primary key
     protected $table = 'tbl_orders_details';
     protected $primaryKey = 'id';

     protected $fillable = [
          'quantity', 'unit_price'
     ];

}
