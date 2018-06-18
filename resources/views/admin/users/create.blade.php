@extends('layouts.admin-layout')

@section('content')
   <div class="row">

        <h2 class="col-md-12">Add new user</h2>

        @if(Session::has('user_add'))
            <div class="col-md-12 p-3 mb-5">
                <div class="alert alert-success"><?=Session::get('user_add')?></div>
            </div>
        @endif

        <form class="form-horizontal col-md-6 mb-5"  action="{{url('/admin/user/add')}}" method="POST">
            {{ csrf_field() }}
            <label for="name">Name</label>
            <div class="help-block">
                <strong>{{$errors->first('name')}}</strong>
            </div>
            <input type="text" name="name" id="name" class="form-control">

            <label for="email">Email</label>
            <div class="help-block">
                <strong>{{$errors->first('email')}}</strong>
            </div>
            <input type="email" name="email" id="email" class="form-control">

            <label for="name">Password</label>
            <div class="help-block">
                <strong>{{$errors->first('password')}}</strong>
            </div>
            <input type="password" name="password" class="form-control">

            <label for="role">Role</label>
            <div class="help-block">
                <strong>{{$errors->first('role')}}</strong>
            </div>
            <select name="role" id="role" class="form-control mb-3">
                <option value="Administrator">Administrator</option>
                <option value="Editor">Editor</option>
                <option value="User">User</option>
            </select>

            <button type="submit" class="btn">Add</button>
        </form>

   </div>
@endsection

