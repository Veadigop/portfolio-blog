@extends('layouts.main-layout')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mb-5">Portfolio</h1>
            </div>
        </div>
    </div>

    <div class="container portfolio">
        <div class="row">
            <div class="col-12">

                @forelse($portfolios as $portfolio)

                    <div class="portfolio-item text-center">
                        @if($portfolio->portfolio_images->where('tag','header')->first() != null)
                            <img class="rounded" src="{{$portfolio->portfolio_images->where('tag','header')->first()->image->link}}" alt="Portfolio Item Image">
                        @endif

                        <h2 class="portfolio-title mt-4">{{$portfolio->title}}</h2>
                            <p><b>Author</b>: {{$portfolio->author}}</p>
                            <p>{{$portfolio->description}}</p>

                            <p><b>Categories</b>: 
                        @foreach($portfolio->category_portfolios as $portfolio_category)
                        {{$portfolio_category->category->name}}@if (!$loop->last) , @else. @endif
                        @endforeach
                        </p>

                        <div class="read-more-button mt-5"><a a class="button" href="{{ url('/portfolio/'.$portfolio->id)}}">Read More</a></div>
                    </div>

                @empty
                    <p>Nothing Here</p>

                @endforelse

                <div class="container mb-5">
                    <div class="row mb-5 mt-5 text-center">
                        <div class="col-md-12 mb-5"> {{ $portfolios->links('pagination.custom-pagination') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection