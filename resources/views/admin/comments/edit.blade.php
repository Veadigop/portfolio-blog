@extends('layouts.admin-layout')


@section('content')
    <h2>Edit Comment {{$comment->id}}</h2>

    <form class="form-horizontal col-md-6 mb-5" action="{{url('admin/comment/update')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="text">Comment Text</label>
            <textarea type="text" id="text" name ="text" class="form-control">{{$comment->text}}</textarea>
            <input type="hidden" name="comment_id" value="{{$comment->id}}">
        </div>

        <button type="submit" class="btn btn-primary">Edit Comment</button>
    </form>

    
@endsection