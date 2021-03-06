@extends('layouts.admin-layout')


@section('content')
    <h2>Edit Article {{$article->title}}</h2>

    <form class="form-horizontal col-md-6 mb-5" action="{{url('admin/article/update')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        @if($article->article_images->where('article_id', $article->id)->where('tag','header')->first() != null)
            <img src="{{$article->article_images->where('article_id', $article->id)->where('tag','header')->first()->image->link}}" width="150px" height="150px">
        @endif

        <div class="form-group">
            <label for="image">Upload New Image</label>
            <input id="img" type="file" multiple name="image" class="form-control" value="Upload">
        </div>

        <div class="form-group">
            <label for="category_id">Categories</label>
            <select multiple name="category_id[]" id="category_id" class="form-control mb-3" >
                @foreach($categories as $category)
                    @if( in_array($category->name, $category_article_names))
                    <option selected value="{{$category->id}}">{{$category->name}}</option>
                    @else
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endif
                @endforeach
            </select>
            <input type="checkbox" id="checkbox" >Select All
        </div>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{$article->title}}">
            <input type="hidden" name="article_id" id="article_id" class="form-control" value="{{$article->id}}">
        </div>

        <div class="form-group">
            <label for="short_description">Short Description</label>
            <input type="text" id="short_description" name="short_description" class="form-control" value="{{$article->short_description}}">
        </div>

        <div class="form-group">
            <label for="full_text">Article Text</label>
            <textarea type="text" id="full_text" name ="full_text"class="form-control">{{$article->full_text}}</textarea>
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" id="author" name="author"  class="form-control" value="{{$article->author}}">
        </div>

        <button type="submit" class="btn btn-primary">Edit Article</button>
    </form>

    
@endsection