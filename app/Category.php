<?php

namespace App;
use App\Post;
use App\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    Public function posts()
    {
    	return $this->hasMany('Post');
    }
}