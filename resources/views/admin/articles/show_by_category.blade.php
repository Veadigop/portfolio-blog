@extends('layouts.admin-layout')

@section('content')

    <div class="row mb-4">
        <div class="col-12">
            <div id="flashs" class="alert alert-danger"></div>
        </div>
        <div class="col-6"><h3>All Articles by Category {{$category->name}}</h3></div>
        <div class="col-6 text-right"><a class="add-new" href="/admin/articles/create"><i class="fa fa-plus" aria-hidden="true"></i>Add New Article</a></div>
    </div>

    <table class="table table-bordered table-striped text-center">
        <thead>
        <tr>
            <th>Article title</th>
            <th>Article image</th>
            <th>Article autor</th>
            <th>Article short description</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        @forelse($articles as  $article)
            <tr id="{{$article->id}}">
                <td><h5><a href="/admin/article/{{$article->id}}">{{$article->title}}</a></h5></td>
                <td>
                    @if($article->article_images->where('article_id', $article->id)->where('tag','header')->first() != null)
                        <img src="{{$article->article_images->where('article_id', $article->id)->where('tag','header')->first()->image->link}}" width="50px" height="50px">
                    @endif
                </td>
                <td>{{$article->author}}</td>
                <td>{{$article->short_description}}</td>
                <td>
                    <a  href="/admin/articles/{{$article->id}}/edit/"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <span class="article del" data-article_id="{{$article->id}}" data-article_name="{{$article->title}}"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                </td>
            </tr>
        @empty
            <tr>
                <td>No Articles</td>
            </tr>
        @endforelse
        </tbody>

    </table>

    <div class="row mb-5 mt-5 text-center">
        <div class="col-md-12 mb-5"> {{ $articles->links('pagination.custom-pagination') }}</div>
    </div>

@endsection


