@extends('layouts.admin-layout')

@section('content')

    <div class="row mb-4">
        <div class="col-12">
            <div id="flashs" class="alert alert-danger"></div>
        </div>
        <div class="col-6"><h3>User {{$user->name}}</h3></div>
        <div class="col-6 text-right">
            <a class="add-new" href="/admin/users/create"><i class="fa fa-plus" aria-hidden="true"></i>Add New User</a>
            <a class="user del" data-user_id="{{$user->id}}" data-user_name="{{$user->name}}"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete This User</a>
        </div>
    </div>

    <div class="row">

        <div class="col-12 mb-4">
            <h5>User Name</h5>
            {{$user->name}}
        </div>

        <div class="col-12 mb-4">
            <h5>User Email</h5>
            {{$user->email}}
        </div>

        <div class="col-12 mb-4">
            <h5>User Role</h5>
            {{$user->role->name}}
        </div>

        <div class="col-12 mb-4">
            <a href="/admin/user/{{$user->id}}/edit/" type="submit" class="btn btn-primary">User Edit</a>
        </div>

    </div>
    
@endsection

