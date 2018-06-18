@extends('layouts.main-layout')

@section('content')

    <div class="container portfolio">
        <div class="row">
            <div class="col-12">
                <div class="article text-center">

                    <div class="portfolio-item text-center">
                        @if($portfolio->portfolio_images->where('tag','header')->first() != null)
                            <img class="rounded" src="{{$portfolio->portfolio_images->where('tag','header')->first()->image->link}}" alt="Portfolio Image">
                        @endif

                        <h2 class="article-title mt-4">{{$portfolio->title}}</h2>

                        <p><b>Author</b> : {{$portfolio->author}}</p>

                        <p class="mb-5"><b>Categories</b>:
                            @foreach($portfolio->category_portfolios as $portfolio_category)
                                {{$portfolio_category->category->name}}@if (!$loop->last) , @else. @endif
                            @endforeach
                        </p>

                        <p>{!!$portfolio->full_text!!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection