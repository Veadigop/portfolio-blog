@extends('layouts.admin-layout')

@section('content')

    <div class="row mb-4">
        <div class="col-12">
            <div id="flashs" class="alert alert-danger"></div>
        </div>
        <div class="col-6"><h3>All Portfolio Items</h3></div>
        <div class="col-6 text-right"><a class="add-new" href="/admin/portfolios/create"><i class="fa fa-plus" aria-hidden="true"></i>Add New Portfolio Item</a></div>
    </div>

    <table class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>Portfolio item itle</th>
                <th>Portfolio item image</th>
                <th>Portfolio item autor</th>
                <th>Portfolio item description</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($portfolios as  $portfolio)
                <tr id="{{$portfolio->id}}">
                    <td><h5><a href="/admin/portfolio/{{$portfolio->id}}">{{$portfolio->title}}</a></h5></td>
                    <td>
                        @if($portfolio->portfolio_images->where('portfolio_id', $portfolio->id)->where('tag','header')->first() != null)
                            <img src="{{$portfolio->portfolio_images->where('portfolio_id', $portfolio->id)->where('tag','header')->first()->image->link}}" width="50px" height="50px">
                        @endif
                    </td>
                    <td>{{$portfolio->author}}</td>
                    <td>{{$portfolio->description}}</td>
                    <td>
                        <a  href="/admin/portfolios/{{$portfolio->id}}/edit/"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <span class="portfolio del" data-portfolio_id="{{$portfolio->id}}" data-portfolio_name="{{$portfolio->title}}"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>No Portfolio Items</td>
                </tr>
            @endforelse
        </tbody>

    </table>

    <div class="row mb-5 mt-5 text-center">
        <div class="col-md-12 mb-5"> {{ $portfolios->links('pagination.custom-pagination') }}</div>
    </div>

@endsection


