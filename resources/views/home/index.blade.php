
@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-12 mb-5">
                <h2 class="mb-0 mt-1 text-center">Latest articles</h2>
            </div>

            <div class="owl-carousel owl-theme owl-loaded articles">

                @foreach($latest_articles as $article)
                    <div class="col-3 mb-3 articles-home">
                            <div class="card">
                                @if($article->article_images->where('article_id', $article->id)->where('tag','header')->first() != null)
                                    <img class="card-img-top" src="{{$article->article_images->where('article_id', $article->id)->where('tag','header')->first()->image->link}}">
                                @endif

                                <div class="card-body">
                                    <h5 class="card-title mb-3"><a href="blog/{{$article->id}}">{{$article->title}}</a></h5>
                                    <p class="card-text small">{{$article->short_description}}</p>
                                    <a href="blog/{{$article->id}}">Read more</a>
                                </div>

                                <div class="card-footer small">Posted on {{$article->created_at}}</div>
                            </div>
                    </div>
                @endforeach

            </div>

        </div>


        <div class="row mt-5">

                <div class="col-12 mb-5">
                    <h2 class="mb-0 mt-1 text-center">Latest Portfolio</h2>
                </div>

            <div class="owl-carousel owl-theme owl-loaded portfolios">

                    @foreach($latest_portfolios as $portfolio)

                            <div class="col-3 mb-3 portfolio-home">
                                <div class="card">
                                    @if($portfolio->portfolio_images->where('portfolio_id', $portfolio->id)->where('tag','header')->first() != null)
                                        <img class="card-img-top" src="{{$portfolio->portfolio_images->where('portfolio_id', $portfolio->id)->where('tag','header')->first()->image->link}}">
                                    @endif

                                <div class="card-body">
                                    <h5 class="card-title mb-3"><a href="portfolio/{{$portfolio->id}}">{{$portfolio->title}}</a></h5>
                                    <p class="card-text small">{{$portfolio->description}}</p>
                                    <a href="portfolio/{{$portfolio->id}}">Read more</a>
                                </div>

                                <div class="card-footer small text-muted">Posted on {{$portfolio->created_at}}</div>
                            </div>
                            </div>

                    @endforeach

            </div>
        </div>

    </div>


@endsection