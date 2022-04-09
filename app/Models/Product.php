<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Orders;
use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Embed;

class Product extends Model
{   
    use Rateable, SoftDeletes;

    //define table and primary key
    protected $table = 'tbl_product';
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_name', 'product_desc', 'product_content', 'product_image', 'product_price', 'product_quantity', 'product_status', 'product_video'
    ];

    //define relationship with category
    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }

    //define relationship with brand
    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    //define relationship with orders
    public function orders(){
        return $this->belongsToMany(Orders::class, 'tbl_orders_details', 'product_id', 'orders_id')->withPivot('quantity', 'unit_price');
    }

    //define accessor 
    public function getVideoHtmlAttribute(){
        $embed = Embed::make($this->product_video)->parseUrl();
        if(!$embed){
            return '';
        }
        else{
            $embed->setAttribute(['width' => 200, 'height' => '150']);
            return $embed->getHtml();
        }
    }

}
