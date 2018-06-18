@extends('layouts.admin-layout')

@section('content')
   <div class="row">

    <h2 class="col-md-12 mb-4">Add new user</h2>

    <form class="form-horizontal col-md-6 mb-5" action="{{url('admin/user/store')}}" method="POST">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Name</label>
            <div class="help-block">
                <strong>{{$errors->first('name')}}</strong>
            </div>
            <input type="text" name="name" id="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <div class="help-block">
                <strong>{{$errors->first('email')}}</strong>
            </div>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="name">Password</label>
            <div class="help-block">
                <strong>{{$errors->first('password')}}</strong>
            </div>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <div class="help-block">
                <strong>{{$errors->first('role')}}</strong>
            </div>
            <select name="role_id" id="role" class="form-control mb-3">
                @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add User</button>

        </form>

   </div>
@endsection

