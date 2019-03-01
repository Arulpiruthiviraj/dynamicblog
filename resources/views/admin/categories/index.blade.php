@extends('layouts.app')
@section('content')
<div class="panel panel-default">
	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<th> Category </th>
				<th> Editing </th>
				<th>  Deleting</th>
			</thead>
			<tbody>
			@if($categories->count()>0)
				@foreach($categories as $category)
				<tr>
				<td>{{$category->name}}</td>
				<td><a href="{{route('category.edit',['id'=>$category->id])}}" class="btn btn-sm btn-info">EDIT</a></td>

				<td><a href="{{route('category.delete',['id'=>$category->id])}}" class="btn btn-sm btn-danger">DELETE</a></td>	
				</tr>
				@endforeach
			@else
				<tr>
					<td colspan="5" class="text-center">
						<p>No Category</p>
					</td>
				</tr>
			@endif
			</tbody>
       </table>
  </div>
</div>

@stop