@extends('layouts.app')
@section('content')
@include('admin.includes.validate')
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class=" text-center">Create a New Post</h3>
	</div>
	<div class="panel-body">
		<form  method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
			@csrf
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" name="title" class="form-control">	
		</div>
		 <div class="form-group">
    <label for="Select category">Category</label>
    <select class="form-control" id="category_id" name="category_id">
    	 <option selected>Choose a category </option>
    	@foreach($categories as $category)
      <option value="{{$category->id}}">{{$category->name }}</option>
      @endforeach
    </select>
  </div>
		<div class="form-group">
			<label for="featured">Image</label>
			<input type="file" name="featured" class="form-control">	
		</div>
		<div class="form-group">
			<label for="content">Content</label>
			<textarea id="content" name="content" class="form-control" cols="5" rows="5"> </textarea> 
		</div>
		
		<div class="form-group">
			<div class="text-center">
				<button class="btn btn-success" type="submit">Store Post</button>
			</div>
		</div>

		</form>	
	</div>
</div>
@stop