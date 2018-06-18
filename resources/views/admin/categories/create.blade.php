@extends('layouts.admin-layout')

@section('content')
   <div class="row">

    <h2 class="col-md-12 mb-4">Add new category</h2>

    <form class="form-horizontal col-md-6 mb-5" action="{{url('admin/category/store')}}" method="POST">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Category Name</label>
            <div class="help-block">
                <strong>{{$errors->first('name')}}</strong>
            </div>
            <input type="text" name="name" id="name" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Add Category</button>

        </form>

   </div>
@endsection

