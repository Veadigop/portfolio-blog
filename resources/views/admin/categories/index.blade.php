@extends('layouts.admin-layout')

@section('content')

    <div class="row mb-4">
        <div class="col-12">
            <div id="flashs" class="alert alert-danger"></div>
        </div>
        <div class="col-6"><h3>All Categories</h3></div>
        <div class="col-6 text-right"><a class="add-new" href="/admin/categories/create"><i class="fa fa-plus" aria-hidden="true"></i>Add New Category</a></div>
    </div>

    <table class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>Category id</th>
                <th>Category name</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($categories as $category)
               <tr id="{{$category->id}}">
                   <td>{{$category->id}}</td>
                   <td class="category-id={{$category->id}}"><a href="/admin/category/{{$category->id}}/articles">{{$category->name}}</a></td>
                   <td class="text-center">
                       <a  href="/admin/categories/{{$category->id}}/edit/"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                       <span class="category del" data-category_id="{{$category->id}}" data-category_name="{{$category->name}}"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                   </td>
               </tr>
                @empty
                <tr>
                    <td>No user</td>
                </tr>
            @endforelse
        </tbody>

    </table>

    <div class="row mb-5 mt-5 text-center">
        <div class="col-md-12 mb-5"> {{ $categories->links('pagination.custom-pagination') }}</div>
    </div>

@endsection
