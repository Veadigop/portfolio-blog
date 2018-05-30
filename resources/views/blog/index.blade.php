@extends('layouts.main-layout')

@section('content')

@foreach($articles as $post)
    <div class="article">
        <h2 class="article-title">{{$post->title}}</h2>
        {{$post->short_description}}
        {{$post->author}}
        <div class="readmore-button"><a href="{{ url('/blog/'.$post->id)}}">Read More</a></div>
    </div>
@endforeach

<div class="container mb-5">
    <div class="row mb-5 mt-5 text-center">
        <div class="col-md-12 mb-5"> {{ $articles->links('pagination.custom-pagination') }}</div>
    </div>
</div>

@endsection

