@extends('layouts.app')
@section('content')
@include('admin.includes.validate')
<div class="panel panel-default">
	<div class="panel-heading">
		<h1 class="text-center">Update Category {{$category->name}}</h1>
	</div>
	<div class="panel-body">
		<form  method="post" action="{{route('category.update',['id'=>$category->id])}}" >
			@csrf
		<div class="form-group">
			<label for="name">Name: </label>
			<input type="text" name="name" class="form-control" value="{{$category->name}}">	
		</div>

		<div class="form-group">
			<div class="text-center">
				<button class="btn btn-success" type="submit"> UPDATE</button>
			</div>
		</div>

		</form>	
	</div>
</div>
@stop