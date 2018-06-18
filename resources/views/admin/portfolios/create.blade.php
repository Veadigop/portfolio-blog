@extends('layouts.admin-layout')

@section('content')

    <h2 class="col-md-12">Add New Portfolio Item</h2>

    <form class="form-horizontal col-md-6 mb-5" action="{{url('admin/portfolio/store')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="title">Image</label>
            <input id="img" type="file" multiple name="image" class="form-control">
        </div>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="title">Short Description</label>
            <input type="text" name="description" class="form-control">
        </div>

        <div class="form-group">
            <label for="category_id">Categories</label>
            <select multiple name="category_id[]" id="category_id"  class="form-control mb-3">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <input type="checkbox" id="checkbox" >Select All
        </div>

        <div class="form-group">
            <label for="title">Portfolio Item Text</label>
            <textarea type="text" name ="full_text"class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="title">Author</label>
            <input type="text" name="author" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Add Portfolio Item</button>
    </form>
<script>  $('.js-example-basic-multiple').select2(); </script>
@endsection