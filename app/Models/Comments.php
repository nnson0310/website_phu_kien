<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\News;

class Comments extends Model
{
    //
    protected $table = 'tbl_comments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'news_id', 'parent_id', 'content'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function news(){
        return $this->belongsTo(News::class, 'news_id');
    }
}
