<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product;

class Brand extends Model
{   
    use SoftDeletes;

    //define table and primary key
    protected $table = 'tbl_brand';
    protected $primaryKey = 'brand_id';

    protected $fillable = [
        'brand_name', 'brand_desc', 'brand_status'
    ];

    //define relationship with product
    public function product(){
        return $this->hasMany(Product::class, 'product_id');
    }
}
