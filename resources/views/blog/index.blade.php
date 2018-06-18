@extends('layouts.main-layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mb-5">Blog</h1>
            </div>
        </div>
    </div>

    <div class="container blog">
        <div class="row">
            <div class="col-12">

                @forelse($articles as $article)

                    <div class="article text-center">
                        @if($article->article_images->where('tag','header')->first() != null)
                            <img class="rounded" src="{{$article->article_images->where('tag','header')->first()->image->link}}" alt="Article Image">
                        @endif

                        <h2 class="article-title mt-4">{{$article->title}}</h2>
                            <p><b>Author</b>: {{$article->author}}.</p>
                            <p>{{$article->short_description}}</p>

                            <p><b>Categories</b>:
                                @foreach($article->category_articles as $article_category)
                                    <a href="/category/{{$article_category->category->id}}/articles"> {{$article_category->category->name}}</a>
                                    @if (!$loop->last) , @else. @endif
                                @endforeach
                            </p>

                        <div class="read-more-button mt-5"><a class="button" href="{{ url('/blog/'.$article->id)}}">Read More</a></div>
                    </div>

                    @empty
                    <p>Nothing Here</p>

                @endforelse

                <div class="container mb-5">
                    <div class="row mb-5 mt-5 text-center">
                        <div class="col-md-12 mb-5"> {{ $articles->links('pagination.custom-pagination') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

