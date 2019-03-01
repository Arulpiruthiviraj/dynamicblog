@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <th> Image </th>
                <th> Title </th>
                <th>  Restore</th>
                <th>  Destroy</th>
                </thead>
                <tbody>
                @if($Posts->count()>0)
                @foreach($Posts as $Post)
                    <tr>
                        <td><img class="img-responsive menu-thumbnails" src="/{{$Post->featured}} " alt="{{$Post->title}}" width="70px" height="50px">  </td>
                        <td>{{$Post->title}}</td>
                        <td><a href="{{route('post.restore',['id'=>$Post->id])}}" class="btn btn-sm btn-danger">Restore</a></td>
                        <td><a href="{{route('post.kill',['id'=>$Post->id])}}" class="btn btn-sm btn-success">Destroy</a></td>
                    </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">
                            <p>No Trashed Post</p>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

@stop