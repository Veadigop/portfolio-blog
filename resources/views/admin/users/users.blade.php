@extends('layouts.admin-layout')

@section('content')
    <h2>Users</h2>
    <table>
        <thead>
        <tr>
            <th>User</th>
            <th>User Email</th>
            <th>User Role</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
               <tr>
                   <td>{{$user->name}}</td>
                   <td>{{$user->email}}</td>
                   <td>{{$user->role}}</td>
               </tr>
        @endforeach
        </tbody>
    </table>
@endsection

