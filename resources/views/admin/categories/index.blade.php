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
				@foreach($categories as $category)
				<tr>
				<td>{{$category->name}}</td>
				<td><a href="{{route('category.edit',['id'=>$category->id])}}" class="btn btn-sm btn-info">EDIT</a></td>

				<td><a href="{{route('category.delete',['id'=>$category->id])}}" class="btn btn-sm btn-danger">DELETE</a></td>	
				</tr>
				@endforeach
			</tbody>
       </table>
  </div>
</div>

@stop