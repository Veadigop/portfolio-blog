@extends('layouts.admin-layout')

@section('content')

    <div class="row mb-4">
        <div class="col-12">
            <div id="flashs" class="alert alert-danger"></div>
        </div>
        <div class="col-6"><h3>All Users</h3></div>
        <div class="col-6 text-right"><a class="add-new" href="/admin/users/create"><i class="fa fa-plus" aria-hidden="true"></i>Add New User</a></div>
    </div>

    <table class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>User</th>
                <th>User Email</th>
                <th>User Role</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($users as $user)
               <tr id="{{$user->id}}">
                   <td class="user-id={{$user->id}}"><a href="/admin/user/{{$user->id}}">{{$user->name}}</a></td>
                   <td>{{$user->email}}</td>
                   <td>{{$user->role->name}}</td>
                   <td class="text-center">
                       <a  href="/admin/user/{{$user->id}}/edit/"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                       <span class="user del" data-user_id="{{$user->id}}" data-user_name="{{$user->name}}"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
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
        <div class="col-md-12 mb-5"> {{ $users->links('pagination.custom-pagination') }}</div>
    </div>

@endsection
