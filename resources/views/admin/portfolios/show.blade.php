@extends('layouts.admin-layout')

@section('content')

    <div class="row mb-4">
        <div class="col-12">
            <div id="flashs" class="alert alert-danger"></div>
        </div>
        <div class="col-6"><h3>Article {{$portfolio->title}}</h3></div>
        <div class="col-6 text-right">
            <a class="add-new" href="/admin/portfolios/create"><i class="fa fa-plus" aria-hidden="true"></i>Add New Portfolio Item</a>
            <a class="portfolio del" data-article_id="{{$portfolio->id}}" data-article_name="{{$portfolio->title}}"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete This Portfolio Item</a>
        </div>

    </div>

    <div class="row">

        <div class="col-12 mb-4">
            <h5>Portfolio Item Image</h5>
            @if($portfolio->portfolio_images->where('portfolio_id', $portfolio->id)->where('tag','header')->first() != null)
                <img src="{{$portfolio->portfolio_images->where('portfolio_id', $portfolio->id)->where('tag','header')->first()->image->link}}" width="300px" height="300px">
            @endif
        </div>

        <div class="col-12 mb-4">
            <h5>Portfolio item Title</h5>
            {{$portfolio->title}}
        </div>

        <div class="col-12 mb-4">
            <h5>Portfolio item Author</h5>
            {{$portfolio->author}}
        </div>

        <div class="col-12 mb-4">
            <h5>Portfolio item Description</h5>
            {{$portfolio->description}}
        </div>

        <div class="col-10 mb-4">
            <h5>Portfolio item Text</h5>
            {!! $portfolio->full_text !!}
        </div>

        <div class="col-12 mb-4">
            <a href="/admin/portfolios/{{$portfolio->id}}/edit/" type="submit" class="btn btn-primary">Portfolio Item Edit</a>
        </div>

    </div>

@endsection