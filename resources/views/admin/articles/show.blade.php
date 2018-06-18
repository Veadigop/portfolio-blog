@extends('layouts.admin-layout')

@section('content')

    <div class="row mb-4">
        <div class="col-12">
            <div id="flashs" class="alert alert-danger"></div>
        </div>
        <div class="col-6"><h3>Article {{$article->title}}</h3></div>
        <div class="col-6 text-right">
            <a class="add-new" href="/admin/articles/create"><i class="fa fa-plus" aria-hidden="true"></i>Add New Article</a>
            <a class="article del" data-article_id="{{$article->id}}" data-article_name="{{$article->title}}"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete This Article</a>
        </div>

    </div>

    <div class="row">

        <div class="col-12 mb-4">
            <h5>Article Image</h5>
            @if($article->article_images->where('article_id', $article->id)->where('tag','header')->first() != null)
                <img src="{{$article->article_images->where('article_id', $article->id)->where('tag','header')->first()->image->link}}" width="300px" height="300px">
            @endif
        </div>

        <div class="col-12 mb-4">
            <h5>Article Title</h5>
            {{$article->title}}
        </div>

        <div class="col-12 mb-4">
            <h5>Article Author</h5>
            {{$article->author}}
        </div>

        <div class="col-12 mb-4">
            <h5>Article Description</h5>
            {{$article->short_description}}
        </div>

        <div class="col-10 mb-4">
            <h5>Article Text</h5>
            {!! $article->full_text !!}
        </div>

        <div class="col-12 mb-4">
            <a href="/admin/articles/{{$article->id}}/edit/" type="submit" class="btn btn-primary">Article Edit</a>
        </div>

    </div>

@endsection