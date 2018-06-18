@extends('layouts.admin-layout')

@section('content')
    <div class="row">

    <h2 class="col-md-12">Edit category</h2>

    <form class="form-horizontal col-md-6 mb-5" action="{{url('admin/category/update')}}" method="POST">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Name</label>
            <div class="help-block">
                <strong>{{$errors->first('name')}}</strong>
            </div>
            <input type="text" name="name" id="name" class="form-control" value="{{$category->name}}">
            <input type="hidden" name="category_id" id="category_id" class="form-control" value="{{$category->id}}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    </div>
@endsection

