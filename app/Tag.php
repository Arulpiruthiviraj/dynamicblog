<?php

namespace App;
use App\Post;
use App\Category;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    Public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
}
