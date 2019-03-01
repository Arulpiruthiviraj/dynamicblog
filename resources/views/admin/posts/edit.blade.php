@extends('layouts.app')
@section('content')
    @include('admin.includes.validate')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class=" text-center">Edit:  {{$Posts->title}}</h3>
        </div>
        <div class="panel-body">
            <form  method="post" action="{{route('post.update',['id'=>$Posts->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$Posts->title}}">
                </div>
                <div class="form-group">
                    <label for="Select category">Category</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option selected>Choose a category </option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                    @if($Posts->category->id==$category->id)
                                  selected
                                    @endif
                            >{{$category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label  for="tags">Select tags	</label>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label><input class="form-check-input"  name="tags[]"  type="checkbox" value="{{$tag->id}}" id="tag_id"
                                          @foreach($Posts->tags as $t)
                                                  @if($tag->id==$t->id)
                                                  checked
                                                  @endif
                                           @endforeach
                                        >{{$tag->tag}}
                            </label>
                        </div>
                    @endforeach
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
                        <button class="btn btn-success" type="submit">Update Post</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop