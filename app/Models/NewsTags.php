<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsTags extends Model
{
    //
    protected $table = 'tbl_news_tags';

    protected $fillable = [
        'news_id', 'tags_id'
    ];
}
