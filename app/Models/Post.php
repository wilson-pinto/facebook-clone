<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function likes()
    {
        return $this->hasMany('App\Models\UserLikeMapping', 'post_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'post_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function isLiked($userId)
    {
        if (isset($this->likes)) {
            return $this->likes->where('user_id', $userId)->first();
        }
        return null;
    }
}
