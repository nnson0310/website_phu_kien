<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\News;

class Tags extends Model
{   
    use SoftDeletes;

    //define table and primary key
    protected $table = 'tbl_tags';

    protected $fillable = [
        'name', 'status'
    ];

    //define relationship with news;
    public function news(){
        return $this->belongsToMany(News::class, 'tbl_news_tags', 'tags_id', 'news_id');
    }

}
