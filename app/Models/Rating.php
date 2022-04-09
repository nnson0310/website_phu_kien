<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Rating extends Model
{
    //
    protected $table = 'ratings';
    
    protected $fillable = [
        'rating', 'username', 'email', 'content', 'user_id', 'rateable_type', 'rateable_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
