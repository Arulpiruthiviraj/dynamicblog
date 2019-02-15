<?php

namespace App;
use App\Post;
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
    	return $this->belongsTo('Category');
    }
    Public function getFeatured($featured)
    {
    	return asset($featured);
    }
}
