<?php

namespace App;
use App\Post;
use App\Tag;
use App\Category;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Post extends Model
{
	use softDeletes;
	
	Protected $fillable=['title','featured','content','category_id','slug'];
	Protected $dates=['deleted_at'];
    Public function category()
    {
    	return $this->belongsTo('App\Category');
    }
    Public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    Public function getFeatured($featured)
    {
    	return asset($featured);
    }
}
