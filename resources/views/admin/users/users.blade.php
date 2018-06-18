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
        @forelse($users as $user)
               <tr>
                   <td class="user-id={{$user->id}}">{{$user->name}}</td>
                   <td>{{$user->email}}</td>
                   <td>{{$user->role}}</td>
               </tr>
            @empty
            <tr>
                <td>No user</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div class="row mb-5 mt-5 text-center">
        <div class="col-md-12 mb-5"> {{ $users->links() }}</div>
    </div>
@endsection

