<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product;

class Category extends Model
{   
    use SoftDeletes;

    //define table and primary key
    protected $table = 'tbl_category';
    protected $primaryKey = 'cat_id';

    protected $fillable = [
        'cat_name', 'cat_desc', 'cat_status'
    ];

    //define relationship with product
    public function product(){
        return $this->hasMany(Product::class, 'product_id');
    }
}
