@extends('layouts.app')
@section('content')
    @include('admin.includes.validate')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class=" text-center">Create a New Tag</h5>
        </div>
        <div class="panel-body">
            <form  method="post" action="{{route('tag.store')}}" >
                @csrf
                <div class="form-group">
                    <label for="tag">Add Tag</label>
                    <input type="text" name="tag" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Store Tag</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop